<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Module Name: Button
 * Description: Display Button content
 */

class TB_Buttons_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct( array(
			'name' => __('Button', 'themify'),
			'slug' => 'buttons'
		));
	}

	public function get_title( $module ) {
		$text = isset( $module['mod_settings']['mod_title_button'] ) ? $module['mod_settings']['mod_title_button'] : '';
		$return = wp_trim_words( $text, 100 );
		return $return;
	}

	public function get_options() {
		return  array(
			array(
				'id'=>'buttons_size',
				'type' => 'radio',
				'label' => __( 'Size', 'themify' ),
				'options' => array(
					'normal'=> __( 'Normal', 'themify' ),
					'small'=>__( 'Small', 'themify' ),
					'large'=> __( 'Large', 'themify' ),
					'xlarge'=>__( 'xLarge', 'themify' )
				),
				'default' => 'normal',
				'render_callback' => array(
					'binding' => 'live'
				)
			),
			array(
				'id'=>'buttons_style',
				'type' => 'radio',
				'label' => __( 'Button Style', 'themify' ),
				'options' => array(
					'circle'=> __( 'Circle', 'themify' ),
					'rounded'=>__( 'Rounded', 'themify' ),
					'squared'=> __( 'Squared', 'themify' ),
					'outline'=>__('Outlined', 'themify')
				),
				'default' => 'rounded',
				'render_callback' => array(
					'binding' => 'live'
				)
			),
			array(
				'id' => 'content_button',
				'type' => 'builder',
				'new_row_text'=>__('Add new button','themify'),
				'options' => array(
					array(
						'id' => 'label',
						'type' => 'text',
						'label' => __( 'Text', 'themify' ),
						'class' => 'fullwidth',
						'render_callback' => array(
							'repeater' => 'content_button',
							'binding' => 'live'
						)
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'label' => __( 'Link', 'themify' ),
						'class' => 'fullwidth',
						'binding' => array(
							'empty' => array(
								'hide' => array('link_options', 'lightbox_size')
							),
							'not_empty' => array(
								'show' => array('link_options', 'lightbox_size')
							)
						),
						'render_callback' => array(
							'repeater' => 'content_button',
							'binding' => 'live'
						)
					),
					array(
						'id' => 'link_options',
						'type' => 'radio',
						'label' => __('Open Link In', 'themify'),
						'options' => array(
							'regular' => __('Same window', 'themify'),
							'lightbox' => __('Lightbox ', 'themify'),
							'newtab' => __('New tab ', 'themify')
						),
						'new_line' => false,
						'default' => 'regular',
						'option_js' => true,
						'wrap_with_class' => 'link_options',
						'render_callback' => array(
							'repeater' => 'content_button',
							'binding' => 'live'
						)
					),
					array(
						'id' => 'lightbox_size',
						'type' => 'multi',
						'label' => __('Lightbox Dimension', 'themify'),
						'options' => array(
							array(
								'id' => 'lightbox_width',
								'type' => 'text',
								'label' => __( 'Width', 'themify' ),
								'value' => '',
								'render_callback' => array(
									'repeater' => 'content_button',
									'binding' => 'live'
								)
							),
							array(
								'id' => 'lightbox_size_unit_width',
								'type' => 'select',
								'label' => __( 'Units', 'themify' ),
								'options' => array(
									'pixels' => __('px ', 'themify'),
									'percents' => __('%', 'themify')
								),
								'default' => 'pixels',
								'render_callback' => array(
									'repeater' => 'content_button',
									'binding' => 'live'
								)
							),
							array(
								'id' => 'lightbox_height',
								'type' => 'text',
								'label' => __( 'Height', 'themify' ),
								'value' => '',
								'render_callback' => array(
									'repeater' => 'content_button',
									'binding' => 'live'
								)
							),
							array(
								'id' => 'lightbox_size_unit_height',
								'type' => 'select',
								'label' => __( 'Units', 'themify' ),
								'options' => array(
									'pixels' => __('px ', 'themify'),
									'percents' => __('%', 'themify')
								),
								'default' => 'pixels',
								'render_callback' => array(
									'repeater' => 'content_button',
									'binding' => 'live'
								)
							)
						),
						'wrap_with_class' => 'tf-group-element tf-group-element-lightbox lightbox_size'
					),
					array(
						'id' => 'button_container',
						'type' => 'multi',
						'label' => __( 'Color', 'themify' ),
						'wrap_with_class' => 'fullwidth',
						'options' => array(
							array(
								'id' => 'button_color_bg',
								'type' => 'layout',
								'label' =>'',
								'options' => array(
									array('img' => 'color-default.png', 'value' => 'default', 'label' => __('default', 'themify')),
									array('img' => 'color-black.png', 'value' => 'black', 'label' => __('black', 'themify')),
									array('img' => 'color-grey.png', 'value' => 'gray', 'label' => __('gray', 'themify')),
									array('img' => 'color-blue.png', 'value' => 'blue', 'label' => __('blue', 'themify')),
									array('img' => 'color-light-blue.png', 'value' => 'light-blue', 'label' => __('light-blue', 'themify')),
									array('img' => 'color-green.png', 'value' => 'green', 'label' => __('green', 'themify')),
									array('img' => 'color-light-green.png', 'value' => 'light-green', 'label' => __('light-green', 'themify')),
									array('img' => 'color-purple.png', 'value' => 'purple', 'label' => __('purple', 'themify')),
									array('img' => 'color-light-purple.png', 'value' => 'light-purple', 'label' => __('light-purple', 'themify')),
									array('img' => 'color-brown.png', 'value' => 'brown', 'label' => __('brown', 'themify')),
									array('img' => 'color-orange.png', 'value' => 'orange', 'label' => __('orange', 'themify')),
									array('img' => 'color-yellow.png', 'value' => 'yellow', 'label' => __('yellow', 'themify')),
									array('img' => 'color-red.png', 'value' => 'red', 'label' => __('red', 'themify')),
									array('img' => 'color-pink.png', 'value' => 'pink', 'label' => __('pink', 'themify')),
								),
								'bottom' => false,
								'wrap_with_class' => 'fullwidth',
								'render_callback' => array(
									'repeater' => 'content_button',
									'binding' => 'live'
								)
							)
						)
					),
					array(
						'id'=>'button_single_style',
						'type' => 'radio',
						'label' => __( 'Button Style', 'themify' ),
						'options' => array(
							'default'=> __( 'Default', 'themify' ),
							'circle'=> __( 'Circle', 'themify' ),
							'rounded'=>__( 'Rounded', 'themify' ),
							'squared'=> __( 'Squared', 'themify' ),
							'outline'=>__('Outlined', 'themify')
						),
						'default' => 'default',
						'render_callback' => array(
							'repeater' => 'content_button',
							'binding' => 'live'
						)
					),
					array(
						'id' => 'icon_container',
						'type' => 'multi',
						'label' => __('Icon', 'themify'),
						'wrap_with_class' => 'fullwidth',
						'options' => array(
							array(
								'id' => 'icon',
								'type' => 'text',
								'iconpicker' => true,
								'label' => '',
								'class' => 'fullwidth themify_field_icon',
								'wrap_with_class' => 'fullwidth',
								'render_callback' => array(
									'repeater' => 'content_button',
									'binding' => 'live',
									'control_type' => 'textonchange'
								)
							)
						)
					)
				),
				'render_callback' => array(
					'binding' => 'live'
				)
			),
			// Additional CSS
			array(
				'type' => 'separator',
				'meta' => array('html' => '<hr/>')
			),
			array(
				'id' => 'css_button',
				'type' => 'text',
				'label' => __('Additional CSS Class', 'themify'),
				'class' => 'large exclude-from-reset-field',
				'help' => sprintf('<br/><small>%s</small>', __('Add additional CSS class(es) for custom styling', 'themify')),
				'render_callback' => array(
					'binding' => 'live'
				)
			)
		);
	}

	public function get_default_settings() {
		$settings = array(
			'content_button' => array(
				array( 
					'label' => esc_html__( 'Button Text', 'themify' ), 
					'link' => 'https://themify.me/',
					'link_options' => 'regular'
				)
			)
		);
		return $settings;
	}

	public function get_animation() {
		$animation = array(
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . esc_html__( 'Appearance Animation', 'themify' ) . '</h4>')
			),
			array(
				'id' => 'multi_Animation Effect',
				'type' => 'multi',
				'label' => __('Effect', 'themify'),
				'fields' => array(
					array(
						'id' => 'animation_effect',
						'type' => 'animation_select',
						'label' => __( 'Effect', 'themify' )
					),
					array(
						'id' => 'animation_effect_delay',
						'type' => 'text',
						'label' => __( 'Delay', 'themify' ),
						'class' => 'xsmall',
						'description' => __( 'Delay (s)', 'themify' ),
					),
					array(
						'id' => 'animation_effect_repeat',
						'type' => 'text',
						'label' => __( 'Repeat', 'themify' ),
						'class' => 'xsmall',
						'description' => __( 'Repeat (x)', 'themify' ),
					),
				)
			)
		);

		return $animation;
	}

	public function get_styling() {
		$general = array(
			// Background
			array(
				'id' => 'separator_image_background',
				'title' => '',
				'description' => '',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Background', 'themify').'</h4>'),
			),
			array(
				'id' => 'background_image',
				'type' => 'image_and_gradient',
				'label' => __('Background Image', 'themify'),
				'class' => 'xlarge',
				'prop' => 'background-image',
				'selector' => ' div.module-buttons',
								'option_js' => true
			),
			array(
				'id' => 'background_color',
				'type' => 'color',
				'label' => __('Background Color', 'themify'),
				'class' => 'small',
				'prop' => 'background-color',
				'selector' => array( ' div.module-buttons'),
			),
			// Font
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_font',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Font', 'themify').'</h4>'),
			),
			array(
				'id' => 'font_family',
				'type' => 'font_select',
				'label' => __('Font Family', 'themify'),
				'class' => 'font-family-select',
				'prop' => 'font-family',
				'selector' => ' div.module-buttons',
			),
						array(
				'id' => 'font_color',
				'type' => 'color',
				'label' => __('Font Color', 'themify'),
				'class' => 'small',
				'prop' => 'color',
				'selector' => array( 'div.module-buttons')
			),
			array(
				'id' => 'multi_font_size',
				'type' => 'multi',
				'label' => __('Font Size', 'themify'),
				'fields' => array(
					array(
						'id' => 'font_size',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'font-size',
						'selector' => array(' div.module-buttons i',' div.module-buttons a',' div.module-buttons span'),
					),
					array(
						'id' => 'font_size_unit',
						'type' => 'select',
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
							array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify')),
						)
					)
				)
			),
			array(
				'id' => 'multi_line_height',
				'type' => 'multi',
				'label' => __('Line Height', 'themify'),
				'fields' => array(
					array(
						'id' => 'line_height',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'line-height',
						'selector' => array(' div.module-buttons i',' div.module-buttons a',' div.module-buttons span'),
					),
					array(
						'id' => 'line_height_unit',
						'type' => 'select',
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
							array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify')),
						)
					)
				)
			),
			array(
				'id' => 'text_align',
				'label' => __( 'Text Align', 'themify' ),
				'type' => 'radio',
				'meta' => array(
					array( 'value' => '', 'name' => __( 'Default', 'themify' ), 'selected' => true ),
					array( 'value' => 'left', 'name' => __( 'Left', 'themify' ) ),
					array( 'value' => 'center', 'name' => __( 'Center', 'themify' ) ),
					array( 'value' => 'right', 'name' => __( 'Right', 'themify' ) ),
					array( 'value' => 'justify', 'name' => __( 'Justify', 'themify' ) )
				),
				'prop' => 'text-align',
				'selector' => ' div.module-buttons'
			),
			// Padding
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_padding',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Padding', 'themify').'</h4>'),
			),
			array(
				'id' => 'multi_padding_top',
				'type' => 'multi',
				'label' => __('Padding', 'themify'),
				'fields' => array(
					array(
						'id' => 'padding_top',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-top',
						'selector' => array( ' div.module-buttons' )
					),
					array(
						'id' => 'padding_top_unit',
						'type' => 'select',
						'description' => __('top', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_padding_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_right',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-right',
						'selector' => array( ' div.module-buttons' )
					),
					array(
						'id' => 'padding_right_unit',
						'type' => 'select',
						'description' => __('right', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_padding_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_bottom',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-bottom',
						'selector' => array( ' div.module-buttons' )
					),
					array(
						'id' => 'padding_bottom_unit',
						'type' => 'select',
						'description' => __('bottom', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_padding_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_left',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-left',
						'selector' => array( ' div.module-buttons')
					),
					array(
						'id' => 'padding_left_unit',
						'type' => 'select',
						'description' => __('left', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			// "Apply all" // apply all padding
			array(
				'id' => 'checkbox_padding_apply_all',
				'class' => 'style_apply_all style_apply_all_padding',
				'type' => 'checkbox',
				'label' => false,
				'options' => array(
					array( 'name' => 'padding', 'value' => __( 'Apply to all padding', 'themify' ) )
				)
			),
			// Margin
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_margin',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Margin', 'themify').'</h4>'),
			),
			array(
				'id' => 'multi_margin_top',
				'type' => 'multi',
				'label' => __('Margin', 'themify'),
				'fields' => array(
					array(
						'id' => 'margin_top',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-top',
						'selector' => ' div.module-buttons',
					),
					array(
						'id' => 'margin_top_unit',
						'type' => 'select',
						'description' => __('top', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_margin_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'margin_right',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-right',
						'selector' => ' div.module-buttons',
					),
					array(
						'id' => 'margin_right_unit',
						'type' => 'select',
						'description' => __('right', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_margin_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'margin_bottom',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-bottom',
						'selector' => ' div.module-buttons',
					),
					array(
						'id' => 'margin_bottom_unit',
						'type' => 'select',
						'description' => __('bottom', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_margin_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'margin_left',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-left',
						'selector' => ' div.module-buttons',
					),
					array(
						'id' => 'margin_left_unit',
						'type' => 'select',
						'description' => __('left', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			// "Apply all" // apply all margin
			array(
				'id' => 'checkbox_margin_apply_all',
				'class' => 'style_apply_all style_apply_all_margin',
				'type' => 'checkbox',
				'label' => false,
				'options' => array(
					array( 'name' => 'margin', 'value' => __( 'Apply to all margin', 'themify' ) )
				)
			),
			// Border
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_border',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Border', 'themify').'</h4>'),
			),
			array(
				'id' => 'multi_border_top',
				'type' => 'multi',
				'label' => __('Border', 'themify'),
				'fields' => array(
					array(
						'id' => 'border_top_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-top-color',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_top_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-top-width',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_top_style',
						'type' => 'select',
						'description' => __('top', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-top-style',
						'selector' => ' div.module-buttons'
					)
				)
			),
			array(
				'id' => 'multi_border_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'border_right_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-right-color',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_right_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-right-width',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_right_style',
						'type' => 'select',
						'description' => __('right', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-right-style',
						'selector' => ' div.module-buttons'
					)
				)
			),
			array(
				'id' => 'multi_border_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'border_bottom_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-bottom-color',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_bottom_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-bottom-width',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_bottom_style',
						'type' => 'select',
						'description' => __('bottom', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-bottom-style',
						'selector' => ' div.module-buttons'
					)
				)
			),
			array(
				'id' => 'multi_border_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'border_left_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-left-color',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_left_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-left-width',
						'selector' => ' div.module-buttons'
					),
					array(
						'id' => 'border_left_style',
						'type' => 'select',
						'description' => __('left', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-left-style',
						'selector' => ' div.module-buttons'
					)
				)
			),
			// "Apply all" // apply all border
			array(
				'id' => 'checkbox_border_apply_all',
				'class' => 'style_apply_all style_apply_all_border',
				'type' => 'checkbox',
				'label' => false,
								'default'=>'border',
				'options' => array(
					array( 'name' => 'border', 'value' => __( 'Apply to all border', 'themify' ) )
				)
			)
		);

		$button_link = array(
			// Background
			array(
				'id' => 'separator_image_background',
				'title' => '',
				'description' => '',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Background', 'themify').'</h4>'),
			),
			array(
				'id' => 'button_background_color',
				'type' => 'color',
				'label' => __('Background Color', 'themify'),
				'class' => 'small',
				'prop' => 'background-color',
				'selector' => ' .module-buttons .module-buttons-item a'
			),
			array(
				'id' => 'button_hover_background_color',
				'type' => 'color',
				'label' => __('Background Hover', 'themify'),
				'class' => 'small',
				'prop' => 'background-color',
				'selector' => ' .module-buttons .module-buttons-item a:hover'
			),
			// Link
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_link',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Link', 'themify').'</h4>'),
			),
			array(
				'id' => 'link_color',
				'type' => 'color',
				'label' => __('Color', 'themify'),
				'class' => 'small',
				'prop' => 'color',
				'selector' => ' .module-buttons .module-buttons-item a'
			),
			array(
				'id' => 'link_color_hover',
				'type' => 'color',
				'label' => __('Color Hover', 'themify'),
				'class' => 'small',
				'prop' => 'color',
				'selector' => ' .module-buttons .module-buttons-item a:hover'
			),
			array(
				'id' => 'text_decoration',
				'type' => 'select',
				'label' => __( 'Text Decoration', 'themify' ),
				'meta'	=> array(
					array('value' => '',   'name' => '', 'selected' => true),
					array('value' => 'underline',   'name' => __('Underline', 'themify')),
					array('value' => 'overline', 'name' => __('Overline', 'themify')),
					array('value' => 'line-through',  'name' => __('Line through', 'themify')),
					array('value' => 'none',  'name' => __('None', 'themify'))
				),
				'prop' => 'text-decoration',
				'selector' => array(' .module-buttons .module-buttons-item a span',' .module-buttons .module-buttons-item a i')
			),
			// Padding
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_padding',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Padding', 'themify').'</h4>'),
			),
			array(
				'id' => 'multi_link_padding_top',
				'type' => 'multi',
				'label' => __('Padding', 'themify'),
				'fields' => array(
					array(
						'id' => 'padding_top_link',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-top',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'padding_top_link_unit',
						'type' => 'select',
						'description' => __('top', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_link_padding_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_right_link',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-right',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'padding_right_link_unit',
						'type' => 'select',
						'description' => __('right', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_link_padding_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_bottom_link',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-bottom',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'padding_bottom_link_unit',
						'type' => 'select',
						'description' => __('bottom', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'multi_link_padding_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_left_link',
						'type' => 'text',
						'class' => 'style_padding style_field xsmall',
						'prop' => 'padding-left',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'padding_left_link_unit',
						'type' => 'select',
						'description' => __('left', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			// "Apply all" // apply all padding
			array(
				'id' => 'checkbox_link_padding_apply_all',
				'class' => 'style_apply_all style_apply_all_padding',
				'type' => 'checkbox',
				'label' => false,
				'options' => array(
					array( 'name' => 'padding', 'value' => __( 'Apply to all padding', 'themify' ) )
				)
			),
			// Margin
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_margin',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Margin', 'themify').'</h4>'),
			),
			array(
				'id' => 'link_multi_margin_top',
				'type' => 'multi',
				'label' => __('Margin', 'themify'),
				'fields' => array(
					array(
						'id' => 'link_margin_top',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-top',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_margin_top_unit',
						'type' => 'select',
						'description' => __('top', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'link_multi_margin_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'link_margin_right',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-right',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_margin_right_unit',
						'type' => 'select',
						'description' => __('right', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'link_multi_margin_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'link_margin_bottom',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-bottom',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_margin_bottom_unit',
						'type' => 'select',
						'description' => __('bottom', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			array(
				'id' => 'link_multi_margin_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'link_margin_left',
						'type' => 'text',
						'class' => 'style_margin style_field xsmall',
						'prop' => 'margin-left',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_margin_left_unit',
						'type' => 'select',
						'description' => __('left', 'themify'),
						'meta' => array(
							array('value' => 'px', 'name' => __('px', 'themify')),
														array('value' => 'em', 'name' => __('em', 'themify')),
							array('value' => '%', 'name' => __('%', 'themify'))
						)
					),
				)
			),
			// "Apply all" // apply all margin
			array(
				'id' => 'link_checkbox_margin_apply_all',
				'class' => 'style_apply_all style_apply_all_margin',
				'type' => 'checkbox',
				'label' => false,
				'options' => array(
					array( 'name' => 'margin', 'value' => __( 'Apply to all margin', 'themify' ) )
				)
			),
			// Border
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_border',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Border', 'themify').'</h4>'),
			),
			array(
				'id' => 'link_multi_border_top',
				'type' => 'multi',
				'label' => __('Border', 'themify'),
				'fields' => array(
					array(
						'id' => 'link_border_top_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-top-color',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_top_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-top-width',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_top_style',
						'type' => 'select',
						'description' => __('top', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-top-style',
						'selector' => ' .module-buttons .module-buttons-item a'
					)
				)
			),
			array(
				'id' => 'link_multi_border_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'link_border_right_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-right-color',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_right_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-right-width',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_right_style',
						'type' => 'select',
						'description' => __('right', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-right-style',
						'selector' => ' .module-buttons .module-buttons-item a'
					)
				)
			),
			array(
				'id' => 'link_multi_border_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'link_border_bottom_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-bottom-color',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_bottom_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-bottom-width',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_bottom_style',
						'type' => 'select',
						'description' => __('bottom', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-bottom-style',
						'selector' => ' .module-buttons .module-buttons-item a'
					)
				)
			),
			array(
				'id' => 'link_multi_border_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'link_border_left_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-left-color',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_left_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-left-width',
						'selector' => ' .module-buttons .module-buttons-item a'
					),
					array(
						'id' => 'link_border_left_style',
						'type' => 'select',
						'description' => __('left', 'themify'),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-left-style',
						'selector' => ' .module-buttons .module-buttons-item a'
					)
				)
			),
			// "Apply all" // apply all border
			array(
				'id' => 'link_checkbox_border_apply_all',
				'class' => 'style_apply_all style_apply_all_border',
				'type' => 'checkbox',
				'label' => false,
								'default'=>'border',
				'options' => array(
					array( 'name' => 'border', 'value' => __( 'Apply to all border', 'themify' ) )
				)
			)
		);

		return array(
			array(
				'type' => 'tabs',
				'id' => 'module-styling',
				'tabs' => array(
					'general' => array(
					'label' => __('General', 'themify'),
					'fields' => $general
					),
					'button_link' => array(
						'label' => __('Button Link', 'themify'),
						'fields' => $button_link
					)
				)
			),
		);

	}

	protected function _visual_template() { ?>
		<div class="module module-<?php echo esc_attr( $this->slug ); ?> {{ data.css_button }}">
			<# if ( data.content_button ) { #>
				<div class="module-<?php echo esc_attr( $this->slug ); ?> {{ data.buttons_size }}">
					<# _.each( data.content_button, function( item ) { #>
						<# var buttonStyle = item.button_single_style && item.button_single_style !== 'default'
							? item.button_single_style : data.buttons_style; #>
						
						<div class="module-buttons-item {{ buttonStyle }}">
							<# if ( item.link ) { #>
							<a class="ui builder_button {{ item.button_color_bg }}" href="{{ item.link }}">
							<# } #>
							
							<# if ( item.icon ) { #>
							<i class="fa {{ item.icon }}"></i>
							<# } #>

							<span>{{ item.label }}</span>

							<# if ( item.link ) { #>
							</a>
							<# } #>
						</div>

					<# } ); #>
				</div>
			<# } #>
		</div>
	<?php
	}
}

///////////////////////////////////////
// Module Options
///////////////////////////////////////
Themify_Builder_Model::register_module( 'TB_Buttons_Module' );
