<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$seil_error_title = cs_get_option('error_title');
$seil_error_heading = cs_get_option('error_heading');
$seil_error_page_content = cs_get_option('error_page_content');
$seil_error_btn_prev_text = cs_get_option('error_btn_prev_text');
$seil_error_btn_home_text = cs_get_option('error_btn_home_text');

$seil_error_title = ( $seil_error_title ) ? $seil_error_title : esc_html__( '404', 'seil' );
$seil_error_heading = ( $seil_error_heading ) ? $seil_error_heading : esc_html__( 'Oops! Page Not Found!', 'seil' );
$seil_error_page_content = ( $seil_error_page_content ) ? $seil_error_page_content : esc_html__( 'It looks like nothing was found at this location. Its probably some thing we have done wrong but now we know about it and we will try to fix it Click the link below to return home.', 'seil' );
$seil_error_btn_prev_text = ( $seil_error_btn_prev_text ) ? $seil_error_btn_prev_text : esc_html__( 'Go to Previous Page', 'seil' );
$seil_error_btn_home_text = ( $seil_error_btn_home_text ) ? $seil_error_btn_home_text : esc_html__( 'Go to Homepage', 'seil' );

get_header(); ?>

<!-- Seil Main Wrap, Fullpage -->
<div class="seil-main-wrap fullpage">
	<div class="main-wrap-inner">
		<div class="seil-table-container">
			<div class="seil-align-container">
				<div class="container">
					<div class="container-wrap">
						<div class="seil-404-error">
							<h1 class="error-title"><?php echo esc_attr($seil_error_title); ?></h1>
							<h2 class="error-sub-title"><?php echo esc_attr($seil_error_heading); ?></h2>
							<p><?php echo esc_attr($seil_error_page_content); ?></p>
							<div class="pages-link">
								<a href="javascript:history.go(-1)"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo esc_attr($seil_error_btn_prev_text); ?></a>
								<a href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_attr($seil_error_btn_home_text); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
