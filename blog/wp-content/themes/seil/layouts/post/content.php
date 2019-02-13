<?php
/**
 * Template part for displaying posts.
 */

// Theme Options
$seil_read_more = cs_get_option('read_more_text');
$seil_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$blog_excerpt = cs_get_option('theme_blog_excerpt');

// Metabox
global $post;
$seil_id    = ( isset( $post ) ) ? $post->ID : 0;
$seil_meta  = get_post_meta( $seil_id, 'post_type_metabox', true );
if($seil_meta){
	$quote_post_text = $seil_meta['quote_post_text'];
	$quote_post_author = $seil_meta['quote_post_author'];
	$quote_post_author_link = $seil_meta['quote_post_author_link'];
	$post_link = $seil_meta['post_link'];
	$post_link_title = $seil_meta['post_link_title'];
	$audio_post = $seil_meta['audio_post'];
	$audio_post_audio_link = $seil_meta['audio_post_audio_link'];
	$aside_feature_image = $seil_meta['aside_feature_image'];
	$seil_feature_image = $seil_meta['common_feature_image'];
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
	$audio_post_audio_link = '';
	$aside_feature_image = '';
	$seil_feature_image = '';
	$video_post = '';
	$video_post_video_link = '';
	$gallery_post_format = '';
	$gallery_type = '';
}

$seil_read_more = ( $seil_read_more ) ? $seil_read_more : esc_html__( 'Continue Reading', 'seil' );

?>

<div class="masonry-item">
<?php if(is_sticky()){
	$sticky_class = ' sticky';
} else {
	$sticky_class = '';
} ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('seil-blog-post '.$sticky_class.''); ?> >
<?php
if(get_post_format() === 'link')  { ?>

	<div class="post-item link-post">
		<?php
		if ( function_exists( 'seil_post_share_option' ) ) {
			echo seil_post_share_option();
		} ?>
		<div class="post-info">
		<?php if ($post_link_title || $post_link) { ?>
			<h3 class="post-title"><?php echo esc_attr($post_link_title); ?></h3>
			<h5 class="post-link"><a href="<?php echo esc_url($post_link); ?>" target="_blank"><?php echo esc_url($post_link); ?></a></h5>
			<?php } else { ?>
			<p>
			<?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
			} else {
				$blog_excerpt = '16';
			}
			the_content();
			seil_wp_link_pages(); ?>
			</p>
			<?php } ?>
		</div>
	</div>

<?php } elseif(get_post_format() === 'aside') {
$seil_aside_image = wp_get_attachment_url( $aside_feature_image, 'fullsize', true );
if ($seil_aside_image) {
	$aside_class = 'post-style-two';
} else {
	$aside_class = 'post-spacer-two';
}
?>
	<div class="post-item <?php echo esc_attr($aside_class); ?>">
	<?php
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	}
	if ($seil_aside_image) { ?>
		<div class="seil-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($seil_aside_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a></div>
	<?php } else { } ?>
		<div class="post-info">
			<h3 class="post-title"><a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr(get_the_title()); ?></a></h3>
			<h5 class="post-meta"><span class="post-category"><?php the_category(', '); ?></span> <span class="post-date"><?php echo get_the_date(); ?></span></h5>
			<p>
			<?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '16';
				}
				seil_excerpt($blog_excerpt);
				seil_wp_link_pages();
			?>
			</p>
			<div class="read-more">
				<div class="pull-left"><a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php echo esc_attr($seil_read_more); ?></a></div>
				<div class="post-likes"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></div>
			</div>
		</div>
	</div>

<?php } elseif(get_post_format() === 'quote') { ?>

	<div class="post-item quote-post">
	<?php
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	}
	?>
		<div class="post-info">
		<?php if ($quote_post_text || $quote_post_author) { ?>
			<h3 class="post-title"><a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr($quote_post_text); ?></a></h3>
			<h5 class="quote-owner"><a href="<?php echo esc_url($quote_post_author_link);?>"><?php echo esc_attr($quote_post_author);?></a></h5>
			<?php } else { ?>
			<p>
			<?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
			} else {
				$blog_excerpt = '16';
			}
			the_content();
			seil_wp_link_pages(); ?>
			</p>
			<?php } ?>
		</div>
	</div>

<?php } elseif(get_post_format() === 'gallery')  {
	 if($gallery_type ==='normal') { ?>

	<div class="post-item">
	<?php if($gallery_post_format) { ?>
	<div class="seil-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="false">
	<?php
		$ids = explode( ',', $gallery_post_format );
		foreach ( $ids as $id ) {
		  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
		  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		  $g_img = $attachment[0];
	      $post_img = $g_img;
		  echo '<div class="item"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></div>';
		}	?>
	</div>
	<?php } elseif($seil_feature_image) {
	$seil_feature_thump = wp_get_attachment_url( $seil_feature_image, 'fullsize', true ); ?>
	<div class="seil-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($seil_feature_thump); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a></div>
	<?php } else { ?>
	<div class="seil-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a></div>
	<?php }
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	} ?>

<?php } else { ?>

	<div class="post-item">
	<?php if($gallery_post_format) { ?>
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
		}	?>
		</div>
	</div>
	<?php } elseif($seil_feature_image) {
	$seil_feature_thump = wp_get_attachment_url( $seil_feature_image, 'fullsize', true ); ?>
	<div class="seil-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($seil_feature_thump); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a></div>
	<?php } else { ?>
	<div class="seil-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a></div>
	<?php }
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	} ?>

<?php } } elseif(get_post_format() === 'video') { ?>

	<div class="post-item">
	<?php
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	}
	?>
	<div class="seil-image">
	<?php if(has_post_thumbnail()) { ?>
	<a href="<?php echo esc_url($video_post_video_link); ?>" class="seil-popup-video">
	<?php
	if ($seil_feature_image) {
	$seil_feature_thump = wp_get_attachment_url( $seil_feature_image, 'fullsize', true ); ?>
	<img src="<?php echo esc_url($seil_feature_thump); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
	<?php } else { the_post_thumbnail(); } ?></a>
	<a href="<?php echo esc_url($video_post_video_link); ?>" class="seil-popup-video seil-video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
	<?php } else{
	echo $video_post;
	} ?>
	</div>

<?php } elseif(get_post_format() === 'audio') { ?>

	<div class="post-item">
	<?php
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	}
	?>
	<div class="seil-image">
	<?php if(has_post_thumbnail()) { ?>
	<a href="<?php echo esc_url($audio_post_audio_link); ?>" class="seil-popup-video">
	<?php
	if ($seil_feature_image) {
	$seil_feature_thump = wp_get_attachment_url( $seil_feature_image, 'fullsize', true ); ?>
	<img src="<?php echo esc_url($seil_feature_thump); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
	<?php } else { the_post_thumbnail(); } ?></a>
	<a href="<?php echo esc_url($audio_post_audio_link); ?>" class="seil-popup-video seil-video-btn"><i class="fa fa-music" aria-hidden="true"></i></a>
	<?php } else{
	echo $audio_post;
	} ?>
	</div>

	<?php } else {

	if (has_post_thumbnail()) {
	 $standard_class_name = 'post-item';
	} else {
	 $standard_class_name = 'post-item post-spacer-two';
	}?>

	<div class="<?php echo esc_attr($standard_class_name); ?>">
	<?php
	if ( function_exists( 'seil_post_share_option' ) ) {
		echo seil_post_share_option();
	}
	?>
	<div class="seil-image"><a href="<?php echo esc_url( get_permalink() ); ?>">
	<?php
	if ($seil_feature_image) {
	$seil_feature_thump = wp_get_attachment_url( $seil_feature_image, 'fullsize', true ); ?>
	<img src="<?php echo esc_url($seil_feature_thump); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
	<?php } else { the_post_thumbnail(); } ?></a></div>

<?php }
if((get_post_format() !== 'link')&&(get_post_format() !== 'quote')&&(get_post_format() !== 'aside')) { ?>

	<div class="post-info">
		<h3 class="post-title"><a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr(get_the_title()); ?></a></h3>
		<h5 class="post-meta"><span class="post-category"><?php the_category(', '); ?></span> <span class="post-date"><?php echo get_the_date(); ?></span></h5>
		<p>
		<?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
			} else {
				$blog_excerpt = '16';
			}
			seil_excerpt($blog_excerpt);
			seil_wp_link_pages();
		?>
		</p>
		<div class="read-more">
			<div class="pull-left"><a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php echo esc_attr($seil_read_more); ?></a></div>
			<div class="post-likes"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></div>
		</div>
	</div>
	</div>

<?php } ?>
</div><!-- Post-Itom -->
</div><!-- Masonry Item -->