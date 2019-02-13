<?php
/*
 * All Metabox related options for Seil theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function seil_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'seil'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(   

          // Common Post Option
          array(
            'id'      => 'common_feature_image',
            'type'    => 'image',
            'title'   => esc_html__('Listing Page Featured Image', 'seil'),
            'info'    => esc_html__('Upload Your Listing Page Featured Image', 'seil'),
          ),       

          //Link Post
          array(
            'type'    => 'notice',
            'title'   => 'Link Post',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Link Post', 'seil')
          ),
          array(
            'id'      => 'post_link_title',
            'type'    => 'text',
            'title'   => esc_html__('Post Link Title', 'seil'),
            'info'    => esc_html__('Enter Post Link Title', 'seil'),
          ),
          array(
            'id'      => 'post_link',
            'type'    => 'text',
            'title'   => esc_html__('Post Link', 'seil'),
            'info'    => esc_html__('Enter Post Link', 'seil'),
          ),

          // Aside Post
          array(
            'id'      => 'aside_feature_image',
            'type'    => 'image',
            'title'   => esc_html__('Aside Posts Featured Image', 'seil'),
            'info'    => esc_html__('Upload Aside Posts Featured Image ( For Perfect Fit Please Upload Image Size 361 x 632 )', 'seil'),
          ),

          // Audio Post
          array(
            'type'       => 'notice',
            'title'      => 'Audio Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Audio Post', 'seil')
          ),
          array(
            'id'        => 'audio_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Audio iframe', 'seil'),
            'info'      => esc_html__('Enter your Audio iframe', 'seil'),
            'sanitize'  => true,
          ),
          array(
            'id'      => 'audio_post_audio_link',
            'type'    => 'text',
            'title'   => esc_html__('Audio Link', 'seil'),
            'info'    => esc_html__('Enter your Audio Link', 'seil'),
          ),

          // Video Post
          array(
            'type'       => 'notice',
            'title'      => 'Video Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Video Post', 'seil')
          ),
          array(
            'id'        => 'video_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Video iframe', 'seil'),
            'info'      => esc_html__('Enter your Video iframe', 'seil'),
            'sanitize'  => true,
          ),
          array(
            'id'      => 'video_post_video_link',
            'type'    => 'text',
            'title'   => esc_html__('Video Link', 'seil'),
            'info'    => esc_html__('Enter your Video Link', 'seil'),
          ),

          // Quote Post
          array(
            'type'       => 'notice',
            'title'      => 'Quote Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Quote Post', 'seil')
          ),
          array(
            'id'      => 'quote_post_text',
            'type'    => 'text',
            'title'   => esc_html__('Quote Text', 'seil'),
            'info'    => esc_html__('Enter your Quote', 'seil'),
          ),
          array(
            'id'      => 'quote_post_author',
            'type'    => 'text',
            'title'   => esc_html__('Quote Author Name', 'seil'),
            'info'    => esc_html__('Enter your Quote Author Name', 'seil'),
          ),
          array(
            'id'      => 'quote_post_author_link',
            'type'    => 'text',
            'title'   => esc_html__('Quote Author Link', 'seil'),
            'info'    => esc_html__('Enter your Quote Author Link', 'seil'),
          ),
          // Gallery
          array(
            'type'       => 'notice',
            'title'      => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Gallery Format', 'seil')
          ),
          array(
            'id'      => 'gallery_type',
            'type'    => 'radio',
            'title'   => esc_html__('Gallery Type (Normal or Gallery With Page Numbers)', 'seil'),
            'info'    => esc_html__('Choose your Gallery Type(Normal or Gallery With Page Numbers). Default : Normal', 'seil'),
            'options'    => array(
              'normal'   => 'Normal',
              'page_number'    => 'Gallery With Page Numbers',
            ),
            'default'    => 'normal',
            'radio'      => true,
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'seil'),
            'add_title'   => esc_html__('Add Image(s)', 'seil'),
            'edit_title'  => esc_html__('Edit Image(s)', 'seil'),
            'clear_title' => esc_html__('Clear Image(s)', 'seil'),
          ),
          // Gallery

        ),
      ),

    ),
  );
  
  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'seil'),
    'post_type' => array('page', 'post'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'default'       => SEIL_CS_IMAGES . '/page-0.png',
              'full-width'    => SEIL_CS_IMAGES . '/page-1.png',
              'left-sidebar'  => SEIL_CS_IMAGES . '/page-3.png',
              'right-sidebar' => SEIL_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'default',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'seil'),
            'options'        => seil_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'seil'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );
  // -----------------------------------------
  // Page Layout Title
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options_page',
    'title'     => esc_html__('Page Title', 'seil'),
    'post_type' => array('page'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section_page',
        'fields' => array(

          array(
              'id'        => 'seil_page_title_switch',
              'type'      => 'switcher',
              'title'     => __('Need Page Title?', 'seil'),
              'on_title'     => __('Yes', 'seil'),
              'off_title'     => __('No', 'seil'),
              'default' => true,
            ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'seil'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'seil'),
            'info'    => esc_html__('Enter client name', 'seil'),
          ),
          array(
            'id'      => 'testi_name_link',
            'type'    => 'text',
            'title'   => esc_html__('Name Link', 'seil'),
            'info'    => esc_html__('Enter client name link, if you want', 'seil'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'seil'),
            'info'    => esc_html__('Enter client profession', 'seil'),
          ),
          array(
            'id'      => 'testi_pro_link',
            'type'    => 'text',
            'title'   => esc_html__('Profession Link', 'seil'),
            'info'    => esc_html__('Enter client profession link', 'seil'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Job Position', 'seil'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'seil'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'seil'),
          ),
          array(
            'id'      => 'team_custom_link',
            'type'    => 'text',
            'title'    => esc_html__('Custom Link', 'seil'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'seil'),
            ),
            'info'    => esc_html__('Enter your custom link, if you don\'t want to show this page.', 'seil'),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'seil_vt_metabox_options' );