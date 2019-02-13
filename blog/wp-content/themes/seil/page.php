<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
// Metabox
$seil_id    = ( isset( $post ) ) ? $post->ID : 0;
$seil_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $seil_id;
$seil_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $seil_id;
$seil_page_layout = get_post_meta( $seil_id, 'page_layout_options', true );
$seil_page_layout_title = get_post_meta( $seil_id, 'page_layout_options_page', true );

if ($seil_page_layout_title) {
$seil_title_switch = $seil_page_layout_title['seil_page_title_switch'];
} else {
	$seil_title_switch = '';
}

// Page Layout Options
if ($seil_page_layout) {

	$seil_page_layout = $seil_page_layout['page_layout'];

	if($seil_page_layout === 'left-sidebar' || $seil_page_layout === 'right-sidebar') {
		$seil_column_class = 'col-md-8 col-sm-12 col-xs-12';
		$seil_layout_class = 'container';
	} else {
		$seil_column_class = 'col-md-12';
		$seil_layout_class = 'container';
	}

	// Page Layout Class
	if ($seil_page_layout === 'left-sidebar') {
		$seil_sidebar_class = 'seil-left-sidebar';
	} elseif ($seil_page_layout === 'right-sidebar') {
		$seil_sidebar_class = 'seil-right-sidebar';
	} else {
		$seil_sidebar_class = 'seil-full-width';
	}
} else {
	$seil_column_class = 'col-md-12';
	$seil_layout_class = 'container';
	$seil_sidebar_class = 'seil-full-width';
}
get_header(); ?>

<div class="seil-main-wrap">
	<div class="main-wrap-inner">
		<div class="container">
			<div class="container-wrap">
			<?php if(!isset($seil_title_switch)){} else { ?>
			<div class="seil-page-title"><?php echo seil_title_area(); ?></div>
			<?php } ?>
			<div class="seil-page-wrap">
			<div class="<?php echo esc_attr($seil_layout_class .' '. $seil_sidebar_class); ?> seil-content-area">
				<div class="row">

					<?php
					// Left Sidebar
					if($seil_page_layout === 'left-sidebar') {
			   		get_sidebar();
					}
					?>

					<div class="seil-content-side <?php echo esc_attr($seil_column_class); ?>">

						<?php
						while ( have_posts() ) : the_post();

							the_content();

							// If comments are open or we have at least one comment, load up the comment template.
							$seil_theme_page_comments = cs_get_option('theme_page_comments');
							if ( $seil_theme_page_comments && (comments_open() || get_comments_number()) ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div><!-- Content Area -->

					<?php
					// Right Sidebar
					if($seil_page_layout === 'right-sidebar') {
						get_sidebar();
					}
					?>

				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
