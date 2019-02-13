<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$seil_blog_widget = cs_get_option('blog_widget');
$seil_single_blog_widget = cs_get_option('single_blog_widget');
$seil_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

// Page Layout Options
if ($seil_page_layout) {
	$seil_page_layout_select = '';
	$seil_page_layout_select = $seil_page_layout['page_layout'];
if ($seil_page_layout_select !== 'default') {
	if($seil_page_layout_select === 'left-sidebar' || $seil_page_layout_select === 'right-sidebar') {
		$seil_layout_class = 'secondary';
	} else {
		$seil_layout_class = '';
	}
	// Page Layout Class
	if ($seil_page_layout_select === 'left-sidebar') {
		$seil_layout_class = 'secondary';
	} elseif ($seil_page_layout_select === 'right-sidebar') {
		$seil_layout_class = '';
	} else {
		$seil_layout_class = '';
	}
} else {
	$seil_page_layout_select = $seil_page_layout['page_layout'];
	$seil_sidebar_position = cs_get_option('single_sidebar_position');
	// Sidebar Position
	if ($seil_sidebar_position === 'sidebar-hide') {
		$seil_layout_class = '';
	} elseif ($seil_sidebar_position === 'sidebar-left') {
		$seil_layout_class = 'secondary';
	} else {
		$seil_layout_class = '';
	} } } else {
	$seil_page_layout_select = '';
	$seil_sidebar_position = cs_get_option('single_sidebar_position');
	// Sidebar Position
	if ($seil_sidebar_position === 'sidebar-hide') {
		$seil_layout_class = '';
	} elseif ($seil_sidebar_position === 'sidebar-left') {
		$seil_layout_class = 'secondary';
	} else {
		$seil_layout_class = '';
	}
}

if ($seil_page_layout_select !== 'full-width') {
?>

<div class="col-md-4 col-sm-12 col-xs-12 <?php echo esc_attr($seil_layout_class); ?>">
	<div class="secondary-wrap">
	<?php if ($seil_page_layout && $seil_page_layout_select !== 'default') {
		if (is_active_sidebar($seil_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($seil_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $seil_blog_widget && !$seil_single_blog_widget) {
		if (is_active_sidebar($seil_blog_widget)) {
			dynamic_sidebar($seil_blog_widget);
		}
	} elseif (is_single() && $seil_single_blog_widget) {
		if (is_active_sidebar($seil_single_blog_widget)) {
			dynamic_sidebar($seil_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div>
</div><!-- #secondary -->
<?php }	?>
