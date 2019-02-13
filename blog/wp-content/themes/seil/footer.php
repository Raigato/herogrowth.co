<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$seil_pre_loader = cs_get_option('pre_loader');
$seil_loader_style = cs_get_option('pre_loader_option');
$seil_back_to_top = cs_get_option('back_to_top');

if ($seil_pre_loader) {

	if($seil_loader_style === 'ball-pulse'){
    $seil_loader_class = 'ball-pulse';
  } elseif($seil_loader_style === 'ball-grid-pulse'){
    $seil_loader_class = 'ball-grid-pulse';
  } elseif($seil_loader_style === 'ball-clip-rotate'){
    $seil_loader_class = 'ball-clip-rotate';
  } elseif($seil_loader_style === 'ball-clip-rotate-pulse'){
    $seil_loader_class = 'ball-clip-rotate-pulse';
  } elseif($seil_loader_style === 'square-spin'){
    $seil_loader_class = 'square-spin';
  } elseif($seil_loader_style === 'ball-clip-rotate-multiple'){
    $seil_loader_class = 'ball-clip-rotate-multiple';
  } elseif($seil_loader_style === 'ball-pulse-rise'){
    $seil_loader_class = 'ball-pulse-rise';
  } elseif($seil_loader_style === 'ball-rotate'){
    $seil_loader_class = 'ball-rotate';
  } elseif($seil_loader_style === 'cube-transition'){
    $seil_loader_class = 'cube-transition';
  } elseif($seil_loader_style === 'ball-zig-zag'){
    $seil_loader_class = 'ball-zig-zag';
  } elseif($seil_loader_style === 'ball-zig-zag-deflect'){
    $seil_loader_class = 'ball-zig-zag-deflect';
  } elseif($seil_loader_style === 'ball-triangle-path'){
    $seil_loader_class = 'ball-triangle-path';
  } elseif($seil_loader_style === 'ball-scale'){
    $seil_loader_class = 'ball-scale';
  } elseif($seil_loader_style === 'line-scale'){
    $seil_loader_class = 'line-scale';
  } elseif($seil_loader_style === 'line-scale-party'){
    $seil_loader_class = 'line-scale-party';
  } elseif($seil_loader_style === 'ball-pulse-sync'){
    $seil_loader_class = 'ball-pulse-sync';
  } elseif($seil_loader_style === 'ball-beat'){
    $seil_loader_class = 'ball-beat';
  } elseif($seil_loader_style === 'line-scale-pulse-out'){
    $seil_loader_class = 'line-scale-pulse-out';
  } elseif($seil_loader_style === 'line-scale-pulse-out-rapid'){
    $seil_loader_class = 'line-scale-pulse-out-rapid';
  } elseif($seil_loader_style === 'ball-scale-ripple'){
    $seil_loader_class = 'ball-scale-ripple';
  } elseif($seil_loader_style === 'ball-scale-ripple-multiple'){
    $seil_loader_class = 'ball-scale-ripple-multiple';
  } elseif($seil_loader_style === 'ball-spin-fade-loader'){
    $seil_loader_class = 'ball-spin-fade-loader';
  } elseif($seil_loader_style === 'line-spin-fade-loader'){
    $seil_loader_class = 'line-spin-fade-loader';
  } elseif($seil_loader_style === 'triangle-skew-spin'){
    $seil_loader_class = 'triangle-skew-spin';
  } elseif($seil_loader_style === 'pacman'){
    $seil_loader_class = 'pacman';
  } elseif($seil_loader_style === 'ball-grid-beat'){
    $seil_loader_class = 'ball-grid-beat';
  } elseif($seil_loader_style === 'semi-circle-spin'){
    $seil_loader_class = 'semi-circle-spin';
  } else {          
    $seil_loader_class = 'ball-scale-multiple';
  }

} else {
	$seil_loader_class = '';
}

if ($seil_pre_loader) {
?>
<!-- Seil loader -->
<div class="seil-preloader">
  <div class="loader-wrap">
    <div class="loader">
      <div class="loader-inner <?php echo esc_attr($seil_loader_class); ?>"></div> 
    </div>
  </div>
</div>
<?php } else { } ?>

<?php if ($seil_back_to_top === true) { ?>
<!-- Seil Back Top -->
<div class="seil-back-top">
  <a href="#0"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php } else { } ?>

</div><!-- #vtheme-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
