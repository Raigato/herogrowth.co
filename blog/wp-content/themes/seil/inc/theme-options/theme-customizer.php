<?php
/*
 * All customizer related options for Seil theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'seil_vt_customizer' ) ) {
  function seil_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('Left Menu Colors', 'seil'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Left Menu Bar', 'seil'),
					),
				),
			),
			array(
				'name'      => 'header_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'seil'),
				),
			),
			array(
				'name'      => 'header_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'seil'),
				),
			),
			array(
				'name'      => 'header_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover And Active Color', 'seil'),
				),
			),
			array(
				'name'      => 'text_logo_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Logo Color', 'seil'),
				),
			),
			array(
				'name'      => 'text_logo_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Logo Hover Color', 'seil'),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'seil'),
					),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'seil'),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'seil'),
				),
			),
	    // Fields End

			// Copyright Colors
	    array(
				'name'          => 'header_copyright_colors',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Copyright Colors', 'seil'),
					),
				),
			),
	    array(
				'name'      => 'copyright_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'seil'),
				),
			),
			array(
				'name'      => 'copyright_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'seil'),
				),
			),
			array(
				'name'      => 'copyright_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'seil'),
				),
			),

	  )
	);
	// Header Color
	
	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('Content Colors', 'seil'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'seil'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'seil'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'seil'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'seil'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'seil'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'seil'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'seil'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'seil'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'seil'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'seil_vt_customizer' );
}