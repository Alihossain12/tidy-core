<?php

class MAK_CORE_Image_Box_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mak_core_image_box_widget';
	}

	public function get_title() {
		return esc_html__( 'MAK Image Box', 'tidy-core' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_categories() {
		return [ 'tidy-core' ];
	}

	public function get_keywords() {
		return [ 'mak', 'image', 'box', 'feature' ];
	}

	protected function register_controls() {

		// =====================
		// Content Tab
		// =====================
		$this->start_controls_section(
			'image_box_content',
			[
				'label' => esc_html__( 'Image Box Content', 'tidy-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Image Box Title', 'tidy-core' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is a description for the image box widget.', 'tidy-core' ),
			]
		);

		$this->end_controls_section();

		// =====================
		// Style Tab
		// =====================

		// Image Style
		$this->start_controls_section(
			'image_style',
			[
				'label' => esc_html__( 'Image', 'tidy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Width', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [ 'min' => 10, 'max' => 100 ],
					'px' => [ 'min' => 50, 'max' => 1200 ],
				],
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .mak-core-image-box img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .mak-core-image-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_shadow',
				'selector' => '{{WRAPPER}} .mak-core-image-box img',
			]
		);

		$this->end_controls_section();

		// Title Style
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'tidy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mak-core-image-box h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'tidy-core' ),
				'selector' => '{{WRAPPER}} .mak-core-image-box h3',
			]
		);

		$this->end_controls_section();

		// Description Style
		$this->start_controls_section(
			'description_style',
			[
				'label' => esc_html__( 'Description', 'tidy-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mak-core-image-box p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => esc_html__( 'Typography', 'tidy-core' ),
				'selector' => '{{WRAPPER}} .mak-core-image-box p',
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => esc_html__( 'Padding', 'tidy-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mak-core-image-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image = $settings['image'];
		?>
		<div class="mak-core-image-box" style="overflow:hidden; text-align:center; transition: all 0.3s ease;">
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>" style="transition: transform 0.3s ease;">
			<h3><?php echo esc_html($settings['title']); ?></h3>
			<p><?php echo esc_html($settings['description']); ?></p>
		</div>

		<style>
			.mak-core-image-box:hover img {
				transform: scale(1.05);
				box-shadow: 0 15px 30px rgba(0,0,0,0.2);
			}
		</style>
		<?php
	}
}
