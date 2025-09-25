<?php

class MAK_CORE_Image_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mak_core_image_widget';
	}

	public function get_title() {
		return esc_html__( 'MAK Image Widget', 'tidy-core' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return [ 'tidy-core' ]; // সব widget Tidy Core category তে যাবে
	}

	public function get_keywords() {
		return [ 'mak', 'image', 'photo' ];
	}

	protected function register_controls() {

		// =====================
		// Content Tab
		// =====================
		$this->start_controls_section(
			'mak_image_section',
			[
				'label' => esc_html__( 'Image', 'tidy-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mak_image',
			[
				'label'   => esc_html__( 'Choose Image', 'tidy-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'mak_image_alt',
			[
				'label'   => esc_html__( 'Alt Text', 'tidy-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'MAK Image', 'tidy-core' ),
			]
		);

		$this->add_responsive_control(
			'mak_image_align',
			[
				'label'     => esc_html__( 'Alignment', 'tidy-core' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'tidy-core' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'tidy-core' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'tidy-core' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .mak-core-image' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();


		// =====================
		// Style Tab
		// =====================
		$this->start_controls_section(
			'mak_image_style',
			[
				'label' => esc_html__( 'Image Style', 'tidy-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'mak_image_width',
			[
				'label'      => esc_html__( 'Width', 'tidy-core' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range'      => [
					'%'  => [ 'min' => 10, 'max' => 100 ],
					'px' => [ 'min' => 50, 'max' => 1200 ],
				],
				'default'    => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .mak-core-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mak_image_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'tidy-core' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .mak-core-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'image_shadow',
				'selector' => '{{WRAPPER}} .mak-core-image img',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image    = $settings['mak_image'];
		$alt      = $settings['mak_image_alt'];
		?>
		<div class="mak-core-image">
			<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
		</div>
		<?php
	}
}
