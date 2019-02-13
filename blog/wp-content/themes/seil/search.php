<?php
/*
 * The template for displaying search results pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

get_header();

?>

<div class="seil-content-side">
<div class="seil-main-wrap posts-wrap">
	<div class="main-wrap-inner">
		<div class="seil-masonry">

			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'layouts/post/content' );
				endwhile;
			else :
				get_template_part( 'layouts/post/content', 'none' );
			endif;
	    wp_reset_postdata();  // avoid errors further down the page
			?>

		</div><!-- Seil Masonry Div -->
	</div><!-- Main Wrap Area -->
	<?php seil_paging_nav(); ?>
</div>
</div>

<?php get_footer();