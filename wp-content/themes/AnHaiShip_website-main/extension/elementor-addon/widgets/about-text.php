<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AnHaiShipWebsite_Elementor_Addon_About_Text extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'AnHaiShipWebsite-about-text';
    }

    public function get_title() {
        return esc_html__( 'About Text', 'AnHaiShipWebsite' );
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    protected function register_controls() {

        // Content heading
        $this->start_controls_section(
            'content_heading',
            [
                'label' => __( 'Heading', 'AnHaiShipWebsite' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'AnHaiShipWebsite' ),
                'type'          =>  Controls_Manager::TEXTAREA,
                'default'       =>  esc_html__( 'Heading', 'AnHaiShipWebsite' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        // Content description
        $this->start_controls_section(
            'content_description',
            [
                'label' => esc_html__( 'Description', 'AnHaiShipWebsite' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Description', 'AnHaiShipWebsite' ),
                'type'      =>  Controls_Manager::WYSIWYG,
                'default'   =>  '',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <div class="element-about-text">
            <div class="box">
                <h2 class="heading">
		            <?php echo wp_kses_post( $settings['heading'] ); ?>
                </h2>

                <span class="line"></span>
            </div>

            <?php if ( !empty( $settings['description'] ) ) : ?>

                <div class="description">
                    <?php echo wp_kses_post( $settings['description'] ); ?>
                </div>

            <?php endif; ?>
        </div>

        <?php

    }

    protected function content_template() {

        ?>
        <div class="element-about-text">
            <div class="box">
                <h2 class="heading">
                    {{{ settings.heading }}}
                </h2>

                <span class="line"></span>
            </div>

            <# if ( '' !== settings.description ) {#>

            <div class="description">
                {{{ settings.description }}}
            </div>

            <# } #>
        </div>

        <?php
    }

}