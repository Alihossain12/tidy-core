<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Modern_Icon_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'modern_icon_box';
    }

    public function get_title() {
        return __( 'tidy-core Icon Box', 'tidy-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'tidy-core' ];
    }

    protected function register_controls() {

        // Content Tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'tidy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Icon
        $this->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Title
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'tidy-core Icon Box', 'tidy-core' ),
            ]
        );

        // Description
        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'This is a tidy-core icon box with full styling options.', 'tidy-core' ),
            ]
        );

        // Link
        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'tidy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Icon Style
        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon Size (px)', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [ 'min' => 10, 'max' => 200 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => __( 'Icon Alignment', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [ 'title' => __( 'Left', 'tidy-core' ), 'icon' => 'eicon-h-align-left' ],
                    'center' => [ 'title' => __( 'Center', 'tidy-core' ), 'icon' => 'eicon-h-align-center' ],
                    'right' => [ 'title' => __( 'Right', 'tidy-core' ), 'icon' => 'eicon-h-align-right' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box .icon' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
            ]
        );

        // Title Style
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'tidy-core' ),
                'selector' => '{{WRAPPER}} .modern-icon-box h3',
            ]
        );

        $this->add_control(
            'title_align',
            [
                'label' => __( 'Title Alignment', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [ 'title' => __( 'Left', 'tidy-core' ), 'icon' => 'eicon-text-align-left' ],
                    'center' => [ 'title' => __( 'Center', 'tidy-core' ), 'icon' => 'eicon-text-align-center' ],
                    'right' => [ 'title' => __( 'Right', 'tidy-core' ), 'icon' => 'eicon-text-align-right' ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box h3' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Description Style
        $this->add_control(
            'desc_color',
            [
                'label' => __( 'Description Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => __( 'Description Typography', 'tidy-core' ),
                'selector' => '{{WRAPPER}} .modern-icon-box p',
            ]
        );

        $this->add_control(
            'desc_align',
            [
                'label' => __( 'Description Alignment', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [ 'title' => __( 'Left', 'tidy-core' ), 'icon' => 'eicon-text-align-left' ],
                    'center' => [ 'title' => __( 'Center', 'tidy-core' ), 'icon' => 'eicon-text-align-center' ],
                    'right' => [ 'title' => __( 'Right', 'tidy-core' ), 'icon' => 'eicon-text-align-right' ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Box Style
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __( 'Box Border', 'tidy-core' ),
                'selector' => '{{WRAPPER}} .modern-icon-box',
            ]
        );

        $this->add_control(
            'box_radius',
            [
                'label' => __( 'Box Border Radius', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [ 'px' => [ 'min' => 0, 'max' => 100 ] ],
                'selectors' => [ '{{WRAPPER}} .modern-icon-box' => 'border-radius: {{SIZE}}{{UNIT}};' ],
            ]
        );

        $this->add_control(
            'box_shadow',
            [
                'label' => __( 'Box Shadow', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'return_value' => 'yes',
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box' => 'box-shadow:0 6px 25px rgba(0,0,0,0.1);',
                ],
            ]
        );

        $this->add_control(
            'box_padding',
            [
                'label' => __( 'Box Padding (px)', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'box_align',
            [
                'label' => __( 'Box Alignment', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [ 'title' => __( 'Left', 'tidy-core' ), 'icon' => 'eicon-h-align-left' ],
                    'center' => [ 'title' => __( 'Center', 'tidy-core' ), 'icon' => 'eicon-h-align-center' ],
                    'right' => [ 'title' => __( 'Right', 'tidy-core' ), 'icon' => 'eicon-h-align-right' ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .modern-icon-box' => 'margin-left:auto; margin-right:auto; text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="modern-icon-box" style="position:relative; overflow:hidden; transition:0.3s;">
            
            <?php if ( !empty( $settings['icon']['value'] ) ): ?>
                <div class="icon" style="margin-bottom:15px;">
                    <i class="<?php echo esc_attr( $settings['icon']['value'] ); ?>"></i>
                </div>
            <?php endif; ?>

            <?php if ( !empty( $settings['title'] ) ): ?>
                <h3><?php echo esc_html( $settings['title'] ); ?></h3>
            <?php endif; ?>

            <?php if ( !empty( $settings['description'] ) ): ?>
                <p><?php echo esc_html( $settings['description'] ); ?></p>
            <?php endif; ?>

            <?php if ( !empty( $settings['link']['url'] ) ): ?>
                <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="modern-icon-box-link" style="display:inline-block; margin-top:15px; color:#fff; background:#0073e6; padding:12px 25px; border-radius:10px; text-decoration:none; font-weight:500; transition:0.3s;">
                    Learn More
                </a>
            <?php endif; ?>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <# var icon = settings.icon.value; #>
        <div class="modern-icon-box">
            <# if ( icon ) { #>
                <div class="icon"><i class="{{ icon }}"></i></div>
            <# } #>
            <# if ( settings.title ) { #>
                <h3>{{ settings.title }}</h3>
            <# } #>
            <# if ( settings.description ) { #>
                <p>{{ settings.description }}</p>
            <# } #>
        </div>
        <?php
    }
}
