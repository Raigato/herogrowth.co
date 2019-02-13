<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'seil_vt_scripts_styles' ) ) {
  function seil_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', SEIL_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', SEIL_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'owl-carousel', SEIL_CSS .'/owl.carousel.min.css', array(), '2.1.6', 'all' );

    wp_enqueue_style( 'loader', SEIL_CSS .'/loaders.min.css', array(), SEIL_VERSION, 'all' );
    wp_enqueue_style( 'magnific-popup', SEIL_CSS .'/magnific-popup.css', array(), SEIL_VERSION, 'all' );
    wp_enqueue_style( 'mCustomScrollbar', SEIL_CSS .'/jquery.mCustomScrollbar.min.css', array(), SEIL_VERSION, 'all' );
    wp_enqueue_style( 'seil-style', SEIL_CSS .'/styles.css', array(), SEIL_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap', SEIL_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'seil-plugins', SEIL_SCRIPTS . '/plugins.js', array( 'jquery' ), SEIL_VERSION, true );
    wp_enqueue_script( 'seil-scripts', SEIL_SCRIPTS . '/scripts.js', array( 'jquery' ), SEIL_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', SEIL_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $seil_viewport = cs_get_option('theme_responsive');
    if($seil_viewport == 'on') {
      wp_enqueue_style( 'seil-responsive', SEIL_CSS .'/responsive.css', array(), SEIL_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'seil_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'seil_vt_admin_scripts_styles' ) ) {
  function seil_vt_admin_scripts_styles() {

    wp_enqueue_style( 'seil-admin-main', SEIL_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'seil-admin-scripts', SEIL_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'seil_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'seil_vt_wp_enqueue_styles' ) ) {
  function seil_vt_wp_enqueue_styles() {
    seil_vt_google_fonts();
    add_action( 'wp_head', 'seil_vt_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'seil_vt_wp_enqueue_styles' );
}
