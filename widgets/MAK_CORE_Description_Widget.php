<?php

class MAK_CORE_Description_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mak_core_description_widget';
	}

	public function get_title() {
		return esc_html__( 'MAK Description Widget', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-editor-paragraph';
	}

	// ✅ এখন Tidy Core category তে show হবে
	public function get_categories() {
		return [ 'tidy_core' ];
	}

	public function get_keywords() {
		return [ 'mak', 'description', 'text', 'paragraph' ];
	}

	protected function register_controls() {

		// =====================
		// Content Tab
		// =====================
		$this->start_controls_section(
			'mak_description_section',
			[
				'label' => esc_html__( 'Description', 'elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mak_description_text',
			[
				'label'   => esc_html__( 'Text', 'elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is a sample description text from MAK Core Widget. You can replace it with your own content.', 'elementor-addon' ),
			]
		);

		$this->add_responsive_control(
			'mak_description_align',
			[
				'label'     => esc_html__( 'Alignment', 'elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'elementor-addon' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-addon' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'elementor-addon' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .mak-core-description' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();


		// =====================
		// Style Tab
		// =====================
		$this->start_controls_section(
			'mak_description_style',
			[
				'label' => esc_html__( 'Description Style', 'elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mak_description_color',
			[
				'label'     => esc_html__( 'Text Color', 'elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mak-core-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => esc_html__( 'Typography', 'elementor-addon' ),
				'selector' => '{{WRAPPER}} .mak-core-description',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'description_bg',
				'label'    => esc_html__( 'Background', 'elementor-addon' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .mak-core-description',
			]
		);

		$this->add_responsive_control(
			'mak_description_padding',
			[
				'label'      => esc_html__( 'Padding', 'elementor-addon' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .mak-core-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mak_description_margin',
			[
				'label'      => esc_html__( 'Margin', 'elementor-addon' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .mak-core-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings     = $this->get_settings_for_display();
		$description  = $settings['mak_description_text'];
		?>
		<div class="mak-core-description">
			<?php echo esc_html( $description ); ?>
		</div>
		<?php
	}
}
