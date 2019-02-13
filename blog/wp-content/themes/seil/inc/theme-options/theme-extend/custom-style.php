<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'seil_dynamic_styles' ) ) {
  function seil_dynamic_styles() {

    // Typography
    $seil_vt_get_typography  = seil_vt_get_typography();

  ob_start();

/* Header - Customizer */
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .seil-sidebar,
  .seil-footer {
    background-color: {$header_bg_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .seil-navigation ul li a {
    color: {$header_link_color};
  }
  .seil-navigation ul li:hover > a, 
  .seil-navigation > ul > li.active > a, 
  .seil-navigation .submenu > li.active > a {
    color: {$header_link_hover_color};
  }
CSS;
}

// Sub menu
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .seil-navigation .submenu li a {
    color: {$submenu_link_color};
  }
  .seil-navigation .submenu li a:hover {
    color: {$submenu_link_hover_color};
  }
CSS;
}

// Text Logo
$text_logo_link_color  = cs_get_customize_option( 'text_logo_link_color' );
$text_logo_link_hover_color  = cs_get_customize_option( 'text_logo_link_hover_color' );
if ($text_logo_link_color || $text_logo_link_hover_color) {
echo <<<CSS
  .no-class {}
  a .text-logo {
    color: {$text_logo_link_color};
  }
  a .text-logo:hover {
    color: {$text_logo_link_hover_color};
  }
CSS;
}

// Copyright 
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );

if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .seil-copyright,
  .seil-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .seil-copyright a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .seil-copyright a:hover {color: {$copyright_link_hover_color};}
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body,
  .post-info p,
  span.post-date,  
  form label,
  table td,
  .seil-blog-detail p,
  .seil-comments-area .seil-comments-meta .comments-date,
  .seil-page-wrap p {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  body a,
  h3.post-title a,
  .post-meta a,
  .post-likes a,
  .read-more a.more-link,
  h5.quote-owner a,
  .seil-more-posts a,
  a.author-name,
  .seil-ajx-more-posts h4,
  .seil-page-wrap a {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  body a:hover,
  h3.post-title a:hover,
  .post-meta a:hover,
  .post-likes a:hover,
  a.author-name:hover,
  .seil-more-posts a:hover,
  .read-more a.more-link:hover,
  h5.quote-owner a:hover,
  .seil-ajx-more-posts h4:hover,
  .seil-page-wrap a:hover {color: {$body_link_hover_color};}
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .seil-widget p,
  .widget_rss .rssSummary
  .subscribe-form p,
  .seil-widget ul li {color: {$sidebar_content_color};}
CSS;
}
// Content Heading
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .seil-unit-fix h3.post-title,
  .caption-text strong,
  h3.comment-reply-title,
  .seil-blog-share .blog-share-label,
  .seil-page-title,
  .seil-page-wrap h1, 
  .seil-page-wrap h2, 
  .seil-page-wrap h3,
  .seil-page-wrap h4, 
  .seil-page-wrap h5, 
  .seil-page-wrap h6,
  .seil-comments-area .seil-comments-meta h4,
  .btn-group p.shortcode-sub-heading,
  table th,
  .category-title {color: {$content_heading_color};}
CSS;
}
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .seil-widget h1, 
  .seil-widget h2, 
  .seil-widget h3,
  .seil-widget h4, 
  .seil-widget h5, 
  .seil-widget h6,
  .widget-title {color: {$sidebar_heading_color};}
CSS;
}

  echo $seil_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'seil_custom_font_load' ) ) {
  function seil_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. $font['svg'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'seil_vt_custom_css' ) ) {
  function seil_vt_custom_css() {
    wp_enqueue_style('seil-default-style', get_template_directory_uri() . '/style.css');
    $output  = seil_custom_font_load();
    $output .= seil_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = seil_compress_css_lines( $output );

    wp_add_inline_style( 'seil-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'seil_vt_custom_js' ) ) {
  function seil_vt_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'seil_vt_custom_js' );
}