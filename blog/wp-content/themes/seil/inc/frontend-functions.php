<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'seil_vt_excludeCat' ) ) {
  function seil_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'seil_vt_excludeCat');
}

/* Excerpt Length */
class SeilExcerpt {

  // Default length (by WordPress)
  public static $length = 16;

  // Output: seil_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 16) {
    SeilExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'SeilExcerpt::new_length');
    SeilExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(SeilExcerpt::$types[SeilExcerpt::$length]) )
      return SeilExcerpt::$types[SeilExcerpt::$length];
    else
      return SeilExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'seil_excerpt' ) ) {
  function seil_excerpt($length = 16) {
    SeilExcerpt::length($length);
  }
}

if ( ! function_exists( 'seil_new_excerpt_more' ) ) {
  function seil_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'seil_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'seil_vt_tag_cloud' ) ) {
  function seil_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'seil_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'seil_vt_password_form' ) ) {
  function seil_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'seil_vt_password_form');
}

/* WP Link Pages */
if ( ! function_exists( 'seil_wp_link_pages' ) ) {
  function seil_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'seil' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'seil_post_metas' ) ) {
  function seil_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <h5 class="post-meta">
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ' );
        if ( $category_list ) {
          echo '<span class="post-category">'. $category_list .' </span>';
        }
      }
    } // Category Hides
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <span class="post-date"><?php echo get_the_date('M d, Y'); ?></span>

    <?php } // Date Hides ?>

  </h5>
  <?php
  }
}

/* Author Info */
if ( ! function_exists( 'seil_author_info' ) ) {
  function seil_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="seil-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
      </a>
    </div>
    <div class="author-content">
      <div class="author-pro"><?php echo esc_attr('Written by', 'seil'); ?></div>
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a>
      <p><?php echo get_the_author_meta( 'description' ); ?></p>
      <div class="seil-social">
        <?php if (get_the_author_meta( 'twitter' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php endif ?>
        <?php if (get_the_author_meta( 'facebook' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
        <?php endif ?>
        <?php if (get_the_author_meta( 'google_plus' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'google_plus' ) ); ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <?php endif ?>
        <?php if (get_the_author_meta( 'linkedin' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <?php endif ?>
    </div>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'seil_comment_modification' ) ) {
  function seil_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="seil-comments-meta">
        <h4><?php printf( '%s', get_comment_author() ); ?></h4>
        <span class="comments-date">
          <?php echo get_comment_date('d M Y'); echo ' - '; ?>
          <span class="caps"><?php echo get_comment_time(); ?></span>
        </span>
        <div class="comments-reply">
        <?php
          comment_reply_link( array_merge( $args, array(
          'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','seil') .'</span>',
          'before' => '',
          'class'  => '',
          'depth' => $depth,
          'max_depth' => $args['max_depth']
          ) ) );
        ?>
        </div>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'seil' ); ?></em>
      <?php endif; ?>
      <div class="comment-area">
        <?php comment_text(); ?>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'seil_title_area' ) ) {
  function seil_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
  if(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title ) {
      echo esc_attr($custom_title);
    } elseif ( is_home() ) {
      bloginfo('');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'seil' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      printf( esc_html__( 'Category: ', 'seil' ));
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'seil'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'seil' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'seil' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'seil' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'seil' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_woocommerce_shop() ) {
        echo esc_attr($custom_title);
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'seil' );
      }
    } elseif( is_404() ) {
      esc_html_e('404', 'seil');
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'seil_paging_nav' ) ) {
  function seil_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( 'OLDER POSTS', 'seil' );
      $newer_post = $newer_post ? $newer_post : esc_html__( 'NEWER POSTS', 'seil' );
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => $newer_post,
        'next_text' => $older_post,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type' => 'list'
      ));
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

/**
 * Newer And Older Post
 */
if ( ! function_exists( 'seil_single_paging_nav' ) ) {
  function seil_single_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      posts_nav_link(' ','<div class="seil-more-posts"><span><i class="fa fa-angle-left" aria-hidden="true"></i> NEWER</span>','<span>OLDER <i class="fa fa-angle-right" aria-hidden="true"></i></span></div>');
    }
  }
}

/**
 * Remove Empty P
 */
add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
  $content = force_balance_tags($content);
  return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

/**
 * Load More
 */

function seil_my_load_more_scripts() {
  global $wp_query;
  wp_enqueue_script('jquery');
  wp_register_script( 'my_loadmore', SEIL_SCRIPTS . '/myloadmore.js', array('jquery') );
  wp_localize_script( 'my_loadmore', 'seil_loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    'posts' => serialize( $wp_query->query_vars ),
    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    'max_page' => $wp_query->max_num_pages
  ) );
  wp_enqueue_script( 'my_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'seil_my_load_more_scripts' );

function seil_loadmore_ajax_handler(){
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';
  query_posts( $args );
  if( have_posts() ) :
    while( have_posts() ): the_post();
      get_template_part( 'layouts/post/content', get_post_format() );
    endwhile;
  endif;
  die;
}
add_action('wp_ajax_loadmore', 'seil_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'seil_loadmore_ajax_handler');