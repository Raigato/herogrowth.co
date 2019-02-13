<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

?>
<div class="seil-main-wrap posts-wrap">
	<div class="main-wrap-inner">
		<div class="category-title"><?php echo seil_title_area(); ?></div>
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

		</div>
	</div>
	<?php
	seil_paging_nav();
	?>
</div>

<?php get_footer();
