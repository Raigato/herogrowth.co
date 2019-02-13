<?php
/*
 * Seil Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'SEIL_THEMEROOT_PATH', get_template_directory() );
define( 'SEIL_THEMEROOT_URI', get_template_directory_uri() );
define( 'SEIL_CSS', SEIL_THEMEROOT_URI . '/assets/css' );
define( 'SEIL_IMAGES', SEIL_THEMEROOT_URI . '/assets/images' );
define( 'SEIL_SCRIPTS', SEIL_THEMEROOT_URI . '/assets/js' );
define( 'SEIL_FRAMEWORK', get_template_directory() . '/inc' );
define( 'SEIL_LAYOUT', get_template_directory() . '/layouts' );
define( 'SEIL_CS_IMAGES', SEIL_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'SEIL_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'SEIL_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$seil_theme_child = wp_get_theme();
	$seil_get_parent = $seil_theme_child->Template;
	$seil_theme = wp_get_theme($seil_get_parent);
} else { // Parent Theme Active
	$seil_theme = wp_get_theme();
}
define('SEIL_NAME', $seil_theme->get( 'Name' ), true);
define('SEIL_VERSION', $seil_theme->get( 'Version' ), true);
define('SEIL_BRAND_URL', $seil_theme->get( 'AuthorURI' ), true);
define('SEIL_BRAND_NAME', $seil_theme->get( 'Author' ), true);

/**
 * All Main Files Include
 */
require_once( SEIL_FRAMEWORK . '/init.php' );
