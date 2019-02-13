<?php
	// Main Text
	$seil_need_copyright = cs_get_option('need_copyright');

	if (isset($seil_need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="footer-wrap">
	<?php
		$seil_secondary_text = cs_get_option('secondary_text');
		echo do_shortcode($seil_secondary_text);
	?>
<div class="seil-copyright">
	<?php
		$seil_copyright_text = cs_get_option('copyright_text');
		echo '<p>'. do_shortcode($seil_copyright_text) .'</p>';
	?>
</div>
</div>
			
<!-- Copyright Bar -->
<?php }