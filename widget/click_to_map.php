<?php
class Elementor_Widget_Click_To_Map extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'click_to_map_elementor';
    }

    public function get_title()
    {
        return __('Click to map', 'click_to_map_elementor');
    }

    public function get_icon()
    {
        return 'eicon-google-maps';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
              'label' => __('Content', 'click_to_map_elementor'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'website_link',
            [
                'label' => esc_html__('Google Map Link', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'click_to_map_elementor'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );


        $this->add_control(
            'widget_text',
            [
                'label' => esc_html__('Infotext', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('The content is provided by Google. If you active it, some data might be transfered or it will set cookies. More information can be found in our privacy page.', 'click_to_map_elementor'),
                'placeholder' => esc_html__('Text', 'click_to_map_elementor'),
            ]
        );

        $this->add_control(
            'widget_button_text',
            [
                'label' => esc_html__('Button text', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Accept', 'click_to_map_elementor'),
                'placeholder' => esc_html__('Type the button text here', 'click_to_map_elementor'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Frame', 'click_to_map_elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__('Height', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ,'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                  'desktop_default' => [
                    'unit' => 'px',
                    'size' => "400",
                  ],
                  'tablet_default' => [
                    'unit' => 'px',
                    'size' => "300",
                  ],
                  'mobile_default' => [
                    'unit' => 'px',
                    'size' => "200",
                  ],
                'selectors' => [
                    '{{WRAPPER}} .click__map' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .click__map iframe' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Map border', 'click_to_map_elementor'),
                'selector' => '{{WRAPPER}} .click__map',
            ]
        );

        $this->add_responsive_control(
            'inner_width',
            [
                'label' => esc_html__('Text width', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ,'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                  'desktop_default' => [
                    'unit' => 'px',
                    'size' => "600",
                  ],
                  'tablet_default' => [
                    'unit' => 'px',
                    'size' => "400",
                  ],
                  'mobile_default' => [
                    'unit' => 'px',
                    'size' => "200",
                  ],
                'selectors' => [
                    '{{WRAPPER}} .click__map .click__map__text__content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Text padding', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .click__map .click__map__text__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .click__map__text__content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'label' => esc_html__('Button Font', 'click_to_map_elementor'),
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .click__map__text__content button',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Color', 'click_to_map_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .click__map__text__content button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => esc_html__('Button Background', 'click_to_map_elementor'),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .click__map__text__content button',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $isEditor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        $settings = $this->get_settings_for_display();

        echo '<div class="click__map" >';
        echo '<iframe src="" data-url="'.$settings['website_link']['url'].'" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        echo '<div class="click__map__text"><div class="click__map__text__content"><p>'.$settings['widget_text'].'</p><button onclick="onClickMapAccept();">'.$settings['widget_button_text'].'</button></div></div>';
        echo '</div>';
    }

    protected function _content_template()
    {
    }
}
