<?php
/*
 * The template for portfolio category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

if (is_post_type('portfolio')) {
	$seil_portfolio_style = cs_get_option('portfolio_style');
	$seil_portfolio_column = cs_get_option('portfolio_column');
	$seil_portfolio_no_space = cs_get_option('portfolio_no_space');
	$seil_portfolio_pagination = cs_get_option('portfolio_pagination');

	$seil_portfolio_style = $seil_portfolio_style ? $seil_portfolio_style : 'one';
	$seil_portfolio_column = $seil_portfolio_column ? $seil_portfolio_column : 'bpw-col-3';
	$seil_portfolio_no_space = $seil_portfolio_no_space ? 'bpw-no-gutter' : '';
}
?>

<div class="container seil-content-area">
	<div class="row">

	<?php if (is_post_type('portfolio')) { ?>
	<!-- Portfolio Start -->
  <div class="seil-portfolios bpw-style-<?php echo esc_attr($seil_portfolio_style); ?> <?php echo esc_attr($seil_portfolio_column); ?> <?php echo esc_attr($seil_portfolio_no_space); ?>">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>

		<?php
		/* Start the Loop */
		if (have_posts()) : while (have_posts()) : the_post();
				/* Template */
				get_template_part( 'layouts/portfolio/portfolio', $seil_portfolio_style );
			endwhile;
		else :
			get_template_part( 'layouts/post/content', 'none' );
		endif;
		wp_reset_postdata(); ?>

	</div><!-- Portfolios End -->
	<?php
		if ($seil_portfolio_pagination) {
		  seil_paging_nav();
		}
	wp_reset_postdata();
	} // Post Type Portfolio
	?>

	</div> <!-- Row -->
</div> <!-- Container -->

<?php get_footer();
