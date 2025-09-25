<?php

class MAK_CORE_Heading_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mak_core_heading_widget';
	}

	public function get_title() {
		return esc_html__( 'MAK Heading Widget', 'tidy-core' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return [ 'tidy-core' ];
	}

	public function get_keywords() {
		return [ 'mak', 'heading' ];
	}

	protected function register_controls() {

		// =====================
		// Content Tab
		// =====================
		$this->start_controls_section(
			'mak_heading_section',
			[
				'label' => esc_html__( 'MAK Heading', 'tidy-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mak_title',
			[
				'label'   => esc_html__( 'Title', 'tidy-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is a sample heading from MAK Core', 'tidy-core' ),
			]
		);

		$this->add_control(
			'mak_subtitle',
			[
				'label'   => esc_html__( 'Sub Title', 'tidy-core' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is a sample Sub Title', 'tidy-core' ),
			]
		);

		$this->end_controls_section();


		// =====================
		// Style Tab - Title
		// =====================
		$this->start_controls_section(
			'mak_title_style',
			[
				'label' => esc_html__( 'Title', 'tidy-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mak_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'tidy-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typography', 'tidy-core' ),
				'selector' => '{{WRAPPER}} h2',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} h2',
			]
		);

		$this->end_controls_section();


		// =====================
		// Style Tab - Sub Title
		// =====================
		$this->start_controls_section(
			'mak_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'tidy-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mak_subtitle_color',
			[
				'label'     => esc_html__( 'Sub Title Color', 'tidy-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'label'    => esc_html__( 'Typography', 'tidy-core' ),
				'selector' => '{{WRAPPER}} span',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading  = $settings['mak_title'];
		$subtitle = $settings['mak_subtitle'];
		?>
		<h2><?php echo $heading; ?></h2>
		<span><?php echo $subtitle; ?></span>
		<?php
	}
}
