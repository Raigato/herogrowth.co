<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Theme Option
$seil_single_featured_image = cs_get_option('single_featured_image');

// Metabox
$seil_id    = ( isset( $post ) ) ? $post->ID : 0;
$seil_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $seil_id;
$seil_page_layout = get_post_meta( $seil_id, 'page_layout_options', true );

// Page Layout Options
if ($seil_page_layout) {
	$seil_sidebar_position = '';
	$seil_page_layout = $seil_page_layout['page_layout'];

if ($seil_page_layout !== 'default'){
	// Page Layout Class
	if ($seil_page_layout === 'left-sidebar') {
		$seil_layout_class = 'col-md-8 col-sm-12 col-xs-12 primary';
		$seil_fullwidth_class = 'seil-blog-detail style-two';
	} elseif ($seil_page_layout === 'right-sidebar') {
		$seil_layout_class = 'col-md-8 col-sm-12 col-xs-12';
		$seil_fullwidth_class = 'seil-blog-detail style-two';
	} else {
		$seil_layout_class = '';
		$seil_fullwidth_class = 'seil-blog-detail';
	}
} else {
	$seil_sidebar_position = cs_get_option('single_sidebar_position');
	// Sidebar Position
	if ($seil_sidebar_position === 'sidebar-hide') {
		$seil_layout_class = 'col-md-12';
		$seil_fullwidth_class = 'seil-blog-detail';
	} elseif ($seil_sidebar_position === 'sidebar-left') {
		$seil_layout_class = 'col-md-8 col-sm-12 col-xs-12 primary';
		$seil_fullwidth_class = 'seil-blog-detail style-two';
	} else {
		$seil_layout_class = 'col-md-8 col-sm-12 col-xs-12';
		$seil_fullwidth_class = 'seil-blog-detail style-two';
	} } } else {

	$seil_sidebar_position = cs_get_option('single_sidebar_position');
	// Sidebar Position
	if ($seil_sidebar_position === 'sidebar-hide') {
		$seil_layout_class = 'col-md-12';
		$seil_fullwidth_class = 'seil-blog-detail';
	} elseif ($seil_sidebar_position === 'sidebar-left') {
		$seil_layout_class = 'col-md-8 col-sm-12 col-xs-12 primary';
		$seil_fullwidth_class = 'seil-blog-detail style-two';
	} else {
		$seil_layout_class = 'col-md-8 col-sm-12 col-xs-12';
		$seil_fullwidth_class = 'seil-blog-detail style-two';
	}
}

// Theme Options
$seil_single_comment = cs_get_option('single_comment_form');

// Metabox
$seil_meta  = get_post_meta( $post->ID, 'post_type_metabox', true );
if($seil_meta){
	$quote_post_text = $seil_meta['quote_post_text'];
	$quote_post_author = $seil_meta['quote_post_author'];
	$quote_post_author_link = $seil_meta['quote_post_author_link'];
	$post_link = $seil_meta['post_link'];
	$post_link_title = $seil_meta['post_link_title'];
	$audio_post = $seil_meta['audio_post'];
	$video_post = $seil_meta['video_post'];
	$video_post_video_link = $seil_meta['video_post_video_link'];
	$gallery_post_format = $seil_meta['gallery_post_format'];
	$gallery_type = $seil_meta['gallery_type'];
} else {
	$quote_post_text = '';
	$quote_post_author = '';
	$quote_post_author_link = '';
	$post_link = '';
	$post_link_title = '';
	$audio_post = '';
	$video_post = '';
	$video_post_video_link = '';
	$gallery_post_format = '';
	$gallery_type = '';
}

?>
<div class="seil-main-wrap left-sidebar">
	<div class="main-wrap-inner">
		<div class="container">
			<div class="container-wrap">
			<div class="seil-unit-fix">
			<?php if(get_post_format() !== 'quote') { ?>
			<div class="post-title-wrap">
				<h3 class="post-title"><?php echo esc_attr(get_the_title()); ?></h3>
				<?php echo seil_post_metas(); ?>
			</div>
			<?php }
			if ($seil_single_featured_image) {

			if(get_post_format() === 'gallery')  {
				 if($gallery_type ==='normal') {
			?>
			<div class="seil-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="false" auto-width="true" auto-heigt="true">
				<?php
					$ids = explode( ',', $gallery_post_format );
					foreach ( $ids as $id ) {
					  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
					  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
					  $g_img = $attachment[0];
				      $post_img = $g_img;
					  echo '<div class="item"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></div>';
					}
				?>
			</div>
			<?php } else { ?>
			<div class="seil-image">
				<div class="seil-carousel carousel-style-two" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true">
				<?php
					$ids = explode( ',', $gallery_post_format );
					foreach ( $ids as $id ) {
					  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
					  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
					  $g_img = $attachment[0];
				      $post_img = $g_img;
					  echo '<div class="item"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></div>';
					}
				?>
				</div>
			</div>
			<?php } } elseif(get_post_format() === 'quote') { ?>
			<div class="post-item quote-post">
				<div class="post-info">
					<blockquote><h3 class="post-title"><span><?php echo esc_attr($quote_post_text); ?></span></h3></blockquote>
					<h5 class="quote-owner"><a href="<?php echo esc_url($quote_post_author_link);?>"><?php echo esc_attr($quote_post_author);?></a></h5>
				</div>
			</div>
			<?php } elseif(get_post_format() === 'video')  { ?>
			<div class="seil-iframe">
				<?php echo $video_post; ?>
			</div>
			<?php } elseif(get_post_format() === 'audio')  { ?>
			<div class="seil-iframe">
				<?php echo $audio_post; ?>
			</div>
			<?php } elseif(get_post_format() === 'aside')  {
				 the_post_thumbnail();
			} elseif(get_post_format() === 'link')  { ?>
			<div class="post-item link-post">
				<div class="post-info">
					<h3 class="post-title"><?php echo esc_attr($post_link_title); ?></h3>
					<h5 class="post-link"><a href="<?php echo esc_url($post_link); ?>" target="_blank"><?php echo esc_url($post_link); ?></a></h5>
				</div>
			</div>
			<?php } else {
				the_post_thumbnail();
				}  // Featured Image
			}	?>
			<!-- Single Top Section End -->
			<div class="<?php echo esc_attr($seil_fullwidth_class); ?>">
				<div class="<?php echo esc_attr($seil_layout_class); ?>">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'layouts/post/content', 'single' );

						if ( $seil_single_comment && (comments_open() || get_comments_number()) ) :
							comments_template();
						endif;

					endwhile;
				else :
					get_template_part( 'layouts/post/content', 'none' );				endif; ?>
				</div><!-- Blog Div -->
				<?php
		    seil_paging_nav();
		    wp_reset_postdata();  // avoid errors further down the page
				?>

				<?php
				if ($seil_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
				?>

			</div>
			</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();