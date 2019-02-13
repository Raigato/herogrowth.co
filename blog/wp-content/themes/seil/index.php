<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$seil_pagi_style = cs_get_option('seil_load_more_style');
$seil_load_more = cs_get_option('ajax_load_more_text');
$seil_load_more = ( $seil_load_more ) ? $seil_load_more : esc_html__( 'Load More', 'seil' );

get_header();
?>
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

		</div>
	</div>
	 <?php

	 if($seil_pagi_style === 'seil-loadmore') {
			global $wp_query;
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="seil-load-more-posts"><span class="seil-ajx-more-posts" data-loading="' .$seil_load_more. '">' .$seil_load_more. '</span></div>';
		} else {
			seil_paging_nav();
		}

	 ?>
</div>

<?php get_footer();
