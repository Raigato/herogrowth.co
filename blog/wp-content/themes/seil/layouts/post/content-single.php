<?php
/**
 * Single Post.
 */

// Single Theme Option
$seil_single_featured_image = cs_get_option('single_featured_image');
$seil_single_author_info = cs_get_option('single_author_info');
$seil_single_share_option = cs_get_option('single_share_option');

// Theme Option
$older_post = cs_get_option('older_post');
$newer_post = cs_get_option('newer_post');
$older_post = $older_post ? $older_post : esc_html__( 'Older', 'seil' );
$newer_post = $newer_post ? $newer_post : esc_html__( 'Newer', 'seil' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('seil-blog-post'); ?>>

		<!-- Content -->
		<?php
		the_content();
		echo seil_wp_link_pages();
		?>
		<!-- Content -->

	<!-- Tags and Share -->
	<div class="bp-bottom-meta">
		<div class="bp-share">
			<?php
			if($seil_single_share_option) {
				if ( function_exists( 'seil_wp_share_option' ) ) {
					echo seil_wp_share_option();
				}
			}
			?>
		</div>
		<?php
		$tag_list = get_the_tags();
	  if($tag_list) { ?>
		<div class="bp-tags">
			<?php echo the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
		</div>
		<?php } ?>
	</div>
	<!-- Tags and Share -->
	<!-- Pagination -->
	 <div class="seil-more-posts">
		 <?php $next_post = get_adjacent_post(false, '', false);
		   if(!empty($next_post)) {
		   echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"><i class="fa fa-angle-left" aria-hidden="true"></i>'.$newer_post.'</a>'; } ?>
	   <?php $prev_post = get_adjacent_post(false, '', true);
		   if(!empty($prev_post)) {
		   echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">'.$older_post.'<i class="fa fa-angle-right" aria-hidden="true"></i></a>'; } ?>
	 </div>
	<!-- Author Info -->
	<?php
	if($seil_single_author_info) {
		echo seil_author_info();
	}
	?>
	<!-- Author Info -->
</div><!-- #post-## -->