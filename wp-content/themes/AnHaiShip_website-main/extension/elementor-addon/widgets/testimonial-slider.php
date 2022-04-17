<?php

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class AnHaiShipWebsite_Elementor_Addon_Testimonial_Slider extends Widget_Base {

    public function get_categories() {
        return array( 'mytheme' );
    }

    public function get_name() {
        return 'AnHaiShipWebsite-testimonial-slider';
    }

    public function get_title() {
        return esc_html__( 'Testimonial Slider', 'AnHaiShipWebsite' );
    }

    public function get_icon() {
        return 'eicon-user-circle-o';
    }

    public function get_script_depends() {
        return ['AnHaiShipWebsite-elementor-custom'];
    }

    protected function _register_controls() {

        // Content testimonial
        $this->start_controls_section(
            'content_testimonial',
            [
                'label' => __( 'Content', 'AnHaiShipWebsite' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Name', 'AnHaiShipWebsite' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'John Doe' , 'AnHaiShipWebsite' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_position',
            [
                'label'         =>  esc_html__( 'Position', 'AnHaiShipWebsite' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Codetic', 'AnHaiShipWebsite' ),
                'label_block'   =>  true
            ]
        );

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__( 'Choose Image', 'AnHaiShipWebsite' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_description',
            [
                'label' => esc_html__( 'Description', 'AnHaiShipWebsite' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'GEMs are robotics algorithm for modules that built & optimized for NVIDIA AGX Data should underlie every business decision. Data should underlie every business Yet too often some very down the certain routes.', 'AnHaiShipWebsite' ),
                'placeholder' => esc_html__( 'Type your description here', 'AnHaiShipWebsite' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'AnHaiShipWebsite' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Title #1', 'AnHaiShipWebsite' ),
                    ],
                    [
                        'list_title' => __( 'Title #2', 'AnHaiShipWebsite' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content additional options
        $this->start_controls_section(
            'content_additional_options',
            [
                'label' => __( 'Additional Options', 'AnHaiShipWebsite' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'AnHaiShipWebsite'),
                'label_off'     =>  esc_html__('No', 'AnHaiShipWebsite'),
                'label_on'      =>  esc_html__('Yes', 'AnHaiShipWebsite'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'AnHaiShipWebsite'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'AnHaiShipWebsite'),
                'label_on'      =>  esc_html__('Yes', 'AnHaiShipWebsite'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'AnHaiShipWebsite'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'AnHaiShipWebsite'),
                'label_off'     =>  esc_html__('No', 'AnHaiShipWebsite'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'AnHaiShipWebsite'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'AnHaiShipWebsite'),
                'label_off'     =>  esc_html__('No', 'AnHaiShipWebsite'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $data_settings_owl = [
            'loop' => ('yes' === $settings['loop']),
            'nav' => ('yes' === $settings['nav']),
            'dots' => ('yes' === $settings['dots']),
            'margin' => $settings['margin_item'],
            'autoplay' => ('yes' === $settings['autoplay']),
            'items' => 1
        ];
    ?>

        <div class="element-testimonial-slider">
            <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                <?php
                foreach ( $settings['list'] as $item ) :
                    $imageId = $item['list_image']['id'];
                ?>

                    <div class="item text-center elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <div class="item__image">
                            <?php
                            if ( $imageId ) :
                                echo wp_get_attachment_image( $item['list_image']['id'], array('150', '150') );
                            else:
                            ?>
                                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/user-avatar.png' ) ) ?>" alt="<?php echo esc_attr( $item['list_title'] ); ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="item__content">
                            <div class="desc">
                                <?php echo wp_kses_post( $item['list_description'] ) ?>
                            </div>

                            <div class="name">
                                <?php echo esc_html( $item['list_title'] ); ?>
                            </div>

                            <div class="position">
                                <?php echo esc_html( $item['list_position'] ); ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php
    }
}