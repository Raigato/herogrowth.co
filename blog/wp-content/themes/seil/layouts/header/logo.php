<?php
// Logo Image
$seil_brand_logo_default = cs_get_option('brand_logo_default');
$seil_brand_logo_retina = cs_get_option('brand_logo_retina');

// Retina Size
$seil_retina_width = cs_get_option('retina_width');
$seil_retina_height = cs_get_option('retina_height');
$retina_width_actual = $seil_retina_width ? 'width='.$seil_retina_width.'' : '';
$retina_height_actual = $seil_retina_height ? 'height='.$seil_retina_height.'' : '';

// Logo Spacings
$seil_brand_logo_top = cs_get_option('brand_logo_top');
$seil_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($seil_brand_logo_top !== '') {
	$seil_brand_logo_top = 'padding-top:'. seil_check_px($seil_brand_logo_top) .';';
} else { $seil_brand_logo_top = ''; }
if ($seil_brand_logo_bottom !== '') {
	$seil_brand_logo_bottom = 'padding-bottom:'. seil_check_px($seil_brand_logo_bottom) .';';
} else { $seil_brand_logo_bottom = ''; }
?>
<div class="seil-logo" style="<?php echo esc_attr($seil_brand_logo_top); echo esc_attr($seil_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
	if (isset($seil_brand_logo_default)){
		if ($seil_brand_logo_retina){
			echo '<img src="'. esc_url(wp_get_attachment_url($seil_brand_logo_retina)) .'" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .' alt="" class="retina-logo">
				';
		}
		echo '<img src="'. esc_url(wp_get_attachment_url($seil_brand_logo_default)) .'" alt="" class="default-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
	} else {
		echo '<div class="text-logo">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
	}
	echo '</a>';
	?>
</div>