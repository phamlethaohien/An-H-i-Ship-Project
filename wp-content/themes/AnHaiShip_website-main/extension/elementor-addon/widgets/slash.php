<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AnHaiShipWebsite_Elementor_Addon_Slash extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'AnHaiShipWebsite-slash';
	}

	public function get_title() {
		return esc_html__( 'Slash', 'AnHaiShipWebsite' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	protected function register_controls() {

		// Content section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'AnHaiShipWebsite' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'         =>  esc_html__( 'Heading', 'AnHaiShipWebsite' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Venture Spirit is in our DNA', 'AnHaiShipWebsite' ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'description',
			[
				'label'         =>  esc_html__( 'Description', 'AnHaiShipWebsite' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Our team work side by side with portfolio companies to solve problems and continue to grow.', 'AnHaiShipWebsite' ),
				'label_block'   =>  true
			]
		);

		$this->end_controls_section();

		// Middle section
		$this->start_controls_section(
			'middle_section',
			[
				'label' => esc_html__( 'Middle', 'AnHaiShipWebsite' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Title' , 'AnHaiShipWebsite' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => esc_html__( 'Content', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Content' , 'AnHaiShipWebsite' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'AnHaiShipWebsite' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'AnHaiShipWebsite' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'AnHaiShipWebsite' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'AnHaiShipWebsite' ),
					],
					[
						'list_title' => esc_html__( 'Title #3', 'AnHaiShipWebsite' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'AnHaiShipWebsite' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Link
		$this->start_controls_section(
			'link_section',
			[
				'label' => __( 'Link', 'AnHaiShipWebsite' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'         =>  esc_html__( 'Text', 'AnHaiShipWebsite' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Text', 'AnHaiShipWebsite' ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'AnHaiShipWebsite' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],
			]
		);

		$this->end_controls_section();

		// Image section
		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image', 'AnHaiShipWebsite' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .element-slash__image' => 'background-image: url({{URL}})',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<div class="element-slash">
			<figure class="element-slash__image"></figure>

			<div class="container">
				<div class="element-slash__content">
					<div class="heading">
						<div class="heading__top">
							<h2 class="title">
								<?php echo wp_kses_post( $settings['heading'] ); ?>
							</h2>
						</div>

						<p class="heading__desc">
							<?php echo wp_kses_post( $settings['description'] ); ?>
						</p>
					</div>

					<div class="element-slash__boxes">
						<?php foreach ( $settings['list'] as $item ) : ?>

						<div class="slash-box">
							<h3 class="slash-box__title">
								<?php echo wp_kses_post( $item['list_title'] ); ?>
							</h3>

							<p class="slash-box__content">
								<?php echo wp_kses_post( $item['list_content'] ); ?>
							</p>
						</div>

						<?php endforeach; ?>
					</div>

					<div class="element-slash__link">
						<?php
						if ( ! empty( $settings['link']['url'] ) ) :
							$this->add_link_attributes( 'link', $settings['link'] );
							?>
							<a class="link-add-on" <?php echo $this->get_render_attribute_string( 'link' ); ?>>
								<?php echo esc_html( $settings['link_text'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php

	}

}