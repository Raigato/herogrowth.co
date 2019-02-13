<?php
/*
 * All Theme Options for Seil theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function seil_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => SEIL_NAME . esc_html__(' Options', 'seil'),
    'menu_slug'       => sanitize_title(SEIL_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => SEIL_NAME .' <small>V-'. SEIL_VERSION .' by <a href="'. SEIL_BRAND_URL .'" target="_blank">'. SEIL_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'seil_vt_settings' );

// Theme Framework Options
function seil_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'seil'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'seil'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'seil')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'seil'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'seil'),
            'add_title' => esc_html__('Add Logo', 'seil'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'seil'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'seil'),
            'add_title' => esc_html__('Add Retina Logo', 'seil'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'seil'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'seil'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'seil'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'seil'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'seil')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'seil'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'seil'),
            'add_title' => esc_html__('Add Login Logo', 'seil'),
          ),
        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'seil'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'seil'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'seil'),
              'add_title' => esc_html__('Add Fav Icon', 'seil'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'seil'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'seil'),
              'add_title' => esc_html__('Add iPhone Icon', 'seil'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'seil'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'seil'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'seil'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'seil'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'seil'),
              'add_title' => esc_html__('Add iPad Icon', 'seil'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'seil'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'seil'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'seil'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'seil'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'seil'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'seil'),
        'info' => esc_html__('Turn off if you don\'t want your site to be responsive.', 'seil'),
        'default' => true,
      ),

      array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => esc_html__('Page Comments', 'seil'),
        'info' => esc_html__('Turn On if you want to show comments in your pages.', 'seil'),
        'default' => true,
      ),

      array(
        'id'    => 'pre_loader',
        'type'  => 'switcher',
        'title' => esc_html__('Pre Loader', 'seil'),
        'info' => esc_html__('Turn On if you want pre loader in your pages.', 'seil'),
        'default' => false,
      ),

      array(
        'id'        => 'pre_loader_option',
        'type'      => 'select',
        'options'   => array(
          'ball-scale-multiple'         => __('Ball Scale Multiple', 'seil'),
          'ball-pulse'                  => __('Ball Pulse', 'seil'),
          'ball-grid-pulse'             => __('Ball Grid Pulse', 'seil'),
          'ball-clip-rotate'            => __('Ball Clip Rotate', 'seil'),
          'ball-clip-rotate-pulse'      => __('Ball Clip Rotate Pulse', 'seil'),
          'square-spin'                 => __('Square Spin', 'seil'),
          'ball-clip-rotate-multiple'   => __('Ball Clip Rotate Multiple', 'seil'),
          'ball-pulse-rise'             => __('Ball Pulse Rise', 'seil'),
          'ball-rotate'                 => __('Ball Rotate', 'seil'),
          'cube-transition'             => __('Cube Transition', 'seil'),
          'ball-zig-zag'                => __('Ball Zig Zag', 'seil'),
          'ball-zig-zag-deflect'        => __('Ball Zig Zag Deflect', 'seil'),
          'ball-triangle-path'          => __('Ball Triangle Path', 'seil'),
          'ball-scale'                  => __('Ball Scale', 'seil'),
          'line-scale'                  => __('Line Scale', 'seil'),
          'line-scale-party'            => __('Line Scale Party', 'seil'),
          'ball-pulse-sync'             => __('Ball Pulse Sync', 'seil'),
          'ball-beat'                   => __('Ball Beat', 'seil'),
          'line-scale-pulse-out'        => __('Line Scale Pulse Out', 'seil'),
          'line-scale-pulse-out-rapid'  => __('Line Scale Pulse Out Rapid', 'seil'),
          'ball-scale-ripple'           => __('Ball Scale Ripple', 'seil'),
          'ball-scale-ripple-multiple'  => __('Ball Scale Ripple Multiple', 'seil'),
          'ball-spin-fade-loader'       => __('Ball Spin Fade Loader', 'seil'),
          'line-spin-fade-loader'       => __('Line Spin Fade Loader', 'seil'),
          'triangle-skew-spin'          => __('Triangle Skew Spin', 'seil'),
          'pacman'                      => __('Pacman', 'seil'),
          'ball-grid-beat'              => __('Ball Grid Beat', 'seil'),
          'semi-circle-spin'            => __('Semi Circle Spin', 'seil'),
        ),
        'title'     => __('Loader Style', 'seil'),
        'dependency'  => array('pre_loader', '==', 'true'),
      ),
      array(
        'id'    => 'back_to_top',
        'type'  => 'switcher',
        'title' => esc_html__('Back To Top', 'seil'),
        'info' => esc_html__('Turn Off if you want to hide back to top in your pages.', 'seil'),
        'default' => true,
      ),

    ), // end: fields

  );

  // ------------------------------
  // Footer Section
  // ------------------------------

      // footer copyright
      $options[]   = array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Footer', 'seil'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'seil'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'seil'),
            'default' => true,
          ),

          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'seil'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Footer Social Icons', 'seil'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Footer Social Icons', 'seil'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )

  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'seil'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'seil'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'seil'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'seil'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'seil'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'seil'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'seil'),
            'info'           => __('Enter css selectors like : <strong>body, .custom-class</strong>', 'seil'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'seil'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'seil'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'seil'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'seil'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'seil'),
        'accordion_title'     => esc_html__('New Typography', 'seil'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'seil'),
            'selector'        => 'body, .seil-widget .mc4wp-form input[type="email"], .seil-widget .mc4wp-form input[type="text"]',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'seil'),
            'selector'        => '.seil-navigation .navbar-nav > li > a, .mean-container .mean-nav ul li a',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
            'size'            => '16px',
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'seil'),
            'selector'        => '.dropdown-menu, .mean-container .mean-nav ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
            'size'            => '16px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'seil'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .seil-location-name, .text-logo',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Primary Font', 'seil'),
            'selector'        => '.seil-search-two input, .seil-search-three input, .btn-fourth, .seil-counter-two .counter-label, .seil-list-icon h5, .seil-testimonials-two .testi-client-info .testi-name, .seil-testimonials-two .testi-client-info .testi-pro, .seil-testimonials-three .testi-client-info .testi-name, .seil-testimonials-three .testi-client-info .testi-pro, .seil-testimonials-four .testi-client-info .testi-name, .seil-testimonials-four .testi-client-info .testi-pro, .seil-testimonials-five .testi-name, .seil-list-icon h5, .seil-comments-area .seil-comments-meta .comments-reply, .footer-nav-links, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #review_form #respond .form-submit input, .woocommerce .products li.product a.button, .woocommerce #review_form #respond input, .woocommerce #review_form #respond select, .woocommerce #review_form #respond textarea, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .tooltip',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Secondary Font', 'seil'),
            'selector'        => '.nice-select, blockquote, .seil-link-arrow, input, select, textarea, .wpcf7 p, .seil-title-area .page-title, .seil-breadcrumbs ul, .seil-topbar-left, .seil-top-active, .seil-recent-blog .widget-bdate, .seil-topdd-content li a, .seil-list-three li, .seil-address-info, .seil-btn, .seil-cta-one, .seil-cta-two, .seil-service-one .service-heading, .seil-service-one .services-read-more, .service-heading, .seil-service-five .service-heading, .seil-tab-links li a, .seil-counter-one, .seil-counter-two, .seil-panel-one .panel-default > .panel-heading, .seil-panel-two .panel-heading, .nav-tabs-two .nav-tabs > li > a, .testimonial-heading, .testi-client-info .testi-name, .seil-testimonials-three .testi-content p, .seil-team-member .team-content .team-name, .seil-team-member-two .team-content .team-name, .seil-team-member-two .team-content .view-profile, .seil-team-details .tm-name, .seil-history .bh-year, .seil-blog-one .bp-top-meta > div, .seil-blog-one .bp-heading, .seil-blog-one .bp-read-more, .seil-blog-one .bp-bottom-comments a, .featured-image.seil-theme-carousel .owl-controls, .bp-share > p, .bp-author-info .author-content .author-pro, .bp-author-info .author-content .author-name, .seil-comments-area .comments-title, .seil-comments-area .seil-comments-meta, .wp-pagenavi, .wp-link-pages, .seil-list-four li, .seil-map-address, .seil-get-quote .bgq-btn, .seil-widget .widget-title, .seil-blog-widget, .seil-sidebar .seil-widget.seil-recent-blog .widget-bdate, .seil-widget .mc4wp-form input[type="submit"], .seil-copyright, .woocommerce ul.products li.product .price, .woocommerce a.added_to_cart, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta, .woocommerce table.shop_table .cart_item td .amount, .woocommerce table.woocommerce-checkout-review-order-table tfoot td, .woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce ul.product_list_widget li .amount, .woocommerce .widget_price_filter .price_slider_amount, .woocommerce .woocommerce-result-count, .woocommerce-review-link, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce .widget_shopping_cart ul.product_list_widget li .amount, .woocommerce .widget_shopping_cart ul.product_list_widget li .quantity',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'seil'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'seil'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'seil'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'svg',
            'type'           => 'upload',
            'title'          => 'Upload .svg <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.svg</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'seil'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'seil'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'seil'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'seil')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'seil'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'seil'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'seil'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'seil'),
            'default' => '16',
          ),
          array(
            'id'             => 'seil_load_more_style',
            'type'           => 'select',
            'title'          => esc_html__('Load More Style', 'seil'),
            'options'        => array(
              'seil-pagi' => esc_html__('Page Numbers', 'seil'),
              'seil-loadmore' => esc_html__('Load More', 'seil'),
            ),
            'info'          => esc_html__('Default : Page Numbers', 'seil'),
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'seil'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'seil'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'seil'),
              'date'    => esc_html__('Date', 'seil'),
              'comments'      => esc_html__('Comments', 'seil'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'seil'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'seil')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'seil'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'seil'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'seil'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'seil'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'seil'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'seil'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__('Comment Area/Form', 'seil'),
            'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'seil'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'seil')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'seil'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'seil'),
              'sidebar-left' => esc_html__('Left', 'seil'),
              'sidebar-hide' => esc_html__('Hide', 'seil'),
            ),
            'info'          => esc_html__('Default option : Right', 'seil'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'seil'),
            'options'        => seil_vt_registered_sidebars(),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'seil'),
          ),
          // End fields

        )
      ),

    ),
  );

  // ------------------------------
  // Extra Pages
  // ------------------------------

      // error 404 page
      $options[]   = array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'seil'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_title',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'seil'),
            'info'  => esc_html__('Enter 404 page heading.', 'seil'),
          ),
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Sub Heading', 'seil'),
            'info'  => esc_html__('Enter 404 page sub heading.', 'seil'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'seil'),
            'info'  => esc_html__('Enter 404 page content.', 'seil'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_btn_prev_text',
            'type'  => 'text',
            'title' => esc_html__('Link Text', 'seil'),
            'info'  => esc_html__('Enter BACK TO PREVIOUS PAGE Link text. If you want to change it.', 'seil'),
          ),
          array(
            'id'    => 'error_btn_home_text',
            'type'  => 'text',
            'title' => esc_html__('Link Text', 'seil'),
            'info'  => esc_html__('Enter BACK TO HOME Link text. If you want to change it.', 'seil'),
          ),
          // End 404 Page

        ) // end: fields

  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'seil'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'seil'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'seil'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'seil'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'seil'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'seil'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'seil'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'seil'),
            'accordion_title' => esc_html__('New Sidebar', 'seil'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'seil'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom CSS', 'seil')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'seil'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'seil')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'seil'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'seil'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'seil')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Continue Reading Text', 'seil'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'seil'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'seil'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'seil'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'seil')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'seil'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'seil'),
          ),
          array(
            'id'          => 'ajax_load_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Load More Text', 'seil'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // envato account
  // ------------------------------
  $options[]   = array(
    'name'     => 'envato_account_section',
    'title'    => esc_html__('Envato Account', 'seil'),
    'icon'     => 'fa fa-link',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('Enter your Username and API key. You can get update our themes from WordPress admin itself.', 'seil'),
      ),
      array(
        'id'      => 'themeforest_username',
        'type'    => 'text',
        'title'   => esc_html__('Envato Username', 'seil'),
      ),
      array(
        'id'      => 'themeforest_api',
        'type'    => 'text',
        'title'   => esc_html__('Envato API Key', 'seil'),
        'class'   => 'text-security',
        'after'   => __('<p>This is not a password field. Enter your Envato API key, which is located in : <strong>http://themeforest.net/user/[YOUR-USER-NAME]/api_keys/edit</strong></p>', 'seil')
      ),

    )
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'seil_vt_options' );