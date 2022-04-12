<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AnHaiShipWebsite_Elementor_Addon_Text_Grid extends Widget_Base {

	public function get_categories() {
		return array( 'mytheme' );
	}

	public function get_name() {
		return 'AnHaiShipWebsite-text-grid';
	}

	public function get_title() {
		return esc_html__( 'Text Grid', 'AnHaiShipWebsite' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	protected function register_controls() {

		// Content heading
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'AnHaiShipWebsite' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'column',
			[
				'label'     =>  esc_html__( 'Column', 'AnHaiShipWebsite' ),
				'type'      =>  Controls_Manager::SELECT,
				'default'   =>  4,
				'options'   =>  [
					1   =>  esc_html__( '1 Column', 'AnHaiShipWebsite' ),
					2   =>  esc_html__( '2 Column', 'AnHaiShipWebsite' ),
					3   =>  esc_html__( '3 Column', 'AnHaiShipWebsite' ),
					4   =>  esc_html__( '4 Column', 'AnHaiShipWebsite' ),
				],
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Title' , 'AnHaiShipWebsite' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'sub_title', [
				'label' => esc_html__( 'Content', 'AnHaiShipWebsite' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Sub title' , 'AnHaiShipWebsite' ),
				'show_label' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<div class="element-text-grid">
			<h2 class="heading">
				<?php echo wp_kses_post( $settings['title'] ); ?>
			</h2>

			<p>
				<?php echo wp_kses_post( $settings['sub_title'] ); ?>
			</p>
		</div>

		<?php

	}

}