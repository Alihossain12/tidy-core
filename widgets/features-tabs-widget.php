<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Features_Tabs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'features_tabs';
    }

    public function get_title() {
        return __( 'Features Tabs', 'tidy-core' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'tidy_core' ]; // custom category
    }

    protected function register_controls() {

        /**
         * ----------------------
         * CONTENT CONTROLS
         * ----------------------
         */
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'tidy-core' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __( 'Heading', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Built exclusively for you', 'tidy-core' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Excepteur sint occaecat cupidatat non proident...', 'tidy-core' ),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => __( 'Tab Title', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Internal Feedback', 'tidy-core' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_icon',
            [
                'label' => __( 'Tab Icon', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'tab_image',
            [
                'label' => __( 'Main Image', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => __( 'Tabs', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();


   
        // Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Section', 'tidy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_background',
            [
                'label' => __( 'Background Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-tabs' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => __( 'Padding', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .features-tabs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Heading
        $this->start_controls_section(
            'heading_style',
            [
                'label' => __( 'Heading', 'tidy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-tabs h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .features-tabs h2',
            ]
        );

        $this->end_controls_section();

        // Description
        $this->start_controls_section(
            'description_style',
            [
                'label' => __( 'Description', 'tidy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-tabs p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .features-tabs p',
            ]
        );

        $this->end_controls_section();

        // Tabs
        $this->start_controls_section(
            'tabs_style',
            [
                'label' => __( 'Tabs', 'tidy-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_text_color',
            [
                'label' => __( 'Tab Text Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-tabs .tab' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'tab_active_color',
            [
                'label' => __( 'Active Tab Color', 'tidy-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-tabs .tab.is-active' => 'color: {{VALUE}}; font-weight: bold;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_typography',
                'selector' => '{{WRAPPER}} .features-tabs .tab',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>

        <section class="features-tabs section center-content has-bottom-divider">
            <div class="container">
                <div class="features-tabs-inner section-inner has-top-divider">
                    <div class="section-header center-content">
                        <div class="container-xs">
                            <h2 class="mt-0 mb-16"><?php echo esc_html( $settings['heading'] ); ?></h2>
                            <p class="m-0"><?php echo esc_html( $settings['description'] ); ?></p>
                        </div>
                    </div>

                    <?php if ( $settings['tabs'] ) : ?>
                        <div class="tabs">
                            <ul class="tab-list list-reset mb-0">
                                <?php foreach ( $settings['tabs'] as $i => $tab ) : ?>
                                    <li class="tab <?php echo $i == 0 ? 'is-active' : ''; ?>" data-index="<?php echo $i; ?>">
                                        <div class="features-tabs-tab-image mb-12">
                                            <img src="<?php echo esc_url( $tab['tab_icon']['url'] ); ?>" alt="">
                                        </div>
                                        <div class="text-color-high fw-600 text-sm">
                                            <?php echo esc_html( $tab['tab_title'] ); ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php foreach ( $settings['tabs'] as $i => $tab ) : ?>
                                <div class="tab-panel <?php echo $i == 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
                                    <img class="has-shadow" src="<?php echo esc_url( $tab['tab_image']['url'] ); ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <script>
        document.addEventListener("DOMContentLoaded", function(){
            const wrapper = document.querySelector("#elementor .elementor-element-<?php echo $this->get_id(); ?> .features-tabs");
            if(!wrapper) return;
            const tabs = wrapper.querySelectorAll(".tab");
            const panels = wrapper.querySelectorAll(".tab-panel");

            tabs.forEach((tab, i) => {
                tab.addEventListener("click", function(){
                    tabs.forEach(t => t.classList.remove("is-active"));
                    panels.forEach(p => p.classList.remove("active"));
                    tab.classList.add("is-active");
                    panels[i].classList.add("active");
                });
            });
        });
        </script>
    <?php }
}
