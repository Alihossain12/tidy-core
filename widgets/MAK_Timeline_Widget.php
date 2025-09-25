<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Custom_Timeline_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'custom_timeline';
    }

    public function get_title() {
        return __( 'tidy-core', 'custom-timeline' );
    }

    public function get_icon() {
        return 'eicon-time-line';
    }

    public function get_categories() {
        return [ 'tidy-core' ];
    }

    protected function register_controls() {

        // Content Controls
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Timeline Content', 'custom-timeline' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('event_title', [
            'label' => __( 'Event Title', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Registration', 'custom-timeline' ),
        ]);

        $repeater->add_control('event_time', [
            'label' => __( 'Time', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '11:00 am', 'custom-timeline' ),
        ]);

        $repeater->add_control('event_desc', [
            'label' => __( 'Description', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Check-in and pick up your welcome packet.', 'custom-timeline' ),
        ]);

        $this->add_control('timeline_items', [
            'label' => __( 'Timeline Items', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ event_title }}}',
        ]);

        $this->end_controls_section();

        // Style Controls
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Timeline Style', 'custom-timeline' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('box_background', [
            'label' => __( 'Box Background Color', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#8C00FF',
        ]);

        $this->add_control('alternate_box_background', [
            'label' => __( 'Alternate Box Background Color', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#3300FF',
        ]);

        $this->add_control('title_color', [
            'label' => __( 'Event Title Color', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#FFFFFF',
        ]);

        $this->add_control('time_color', [
            'label' => __( 'Event Time Color', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#FFFFFF',
        ]);

        $this->add_control('desc_color', [
            'label' => __( 'Description Color', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#FFFFFF',
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'custom-timeline' ),
                'selector' => '{{WRAPPER}} .timeline-item .timeline-box h3',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'time_typography',
                'label' => __( 'Time Typography', 'custom-timeline' ),
                'selector' => '{{WRAPPER}} .timeline-item .timeline-box h2',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => __( 'Description Typography', 'custom-timeline' ),
                'selector' => '{{WRAPPER}} .timeline-item .timeline-box p',
            ]
        );

        $this->add_control('alignment', [
            'label' => __( 'Box Text Alignment', 'custom-timeline' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => ['title' => __( 'Left', 'custom-timeline' ), 'icon' => 'eicon-text-align-left'],
                'center' => ['title' => __( 'Center', 'custom-timeline' ), 'icon' => 'eicon-text-align-center'],
                'right' => ['title' => __( 'Right', 'custom-timeline' ), 'icon' => 'eicon-text-align-right'],
            ],
            'default' => 'left',
            'toggle' => true,
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="custom-timeline-container">
            <div class="timeline-line"></div>
            <?php if(!empty($settings['timeline_items'])): ?>
                <?php foreach ($settings['timeline_items'] as $index => $item) : ?>
                    <div class="timeline-item <?php echo ($index % 2 == 0) ? 'left' : 'right'; ?>">
                        <div class="timeline-box">
                            <h3 style="color: <?php echo $settings['title_color']; ?>;"><?php echo esc_html($item['event_title']); ?></h3>
                            <h2 style="color: <?php echo $settings['time_color']; ?>;"><?php echo esc_html($item['event_time']); ?></h2>
                            <p style="color: <?php echo $settings['desc_color']; ?>;"><?php echo esc_html($item['event_desc']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <style>
        .custom-timeline-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }
        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            width: 3px;
            height: 100%;
            background: #000;
            transform: translateX(-50%);
        }
        .timeline-item {
            position: relative;
            width: 50%;
            padding: 10px 20px;
            box-sizing: border-box;
        }
        .timeline-item.left { left: 0; }
        .timeline-item.right { left: 50%; }
        .timeline-item .timeline-box {
            padding: 15px;
            border-radius: 8px;
            display: inline-block;
            text-align: <?php echo $settings['alignment']; ?>;
            background-color: <?php echo $settings['box_background']; ?>;
        }
        .timeline-item.right .timeline-box {
            background-color: <?php echo $settings['alternate_box_background']; ?>;
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            top: 25px;
            width: 12px;
            height: 12px;
            background: #000;
            border-radius: 50%;
            left: 100%;
            transform: translateX(-50%);
        }
        .timeline-item.right::after {
            left: 0%;
            transform: translateX(-50%);
        }

        /* Responsive: mobile */
        @media (max-width: 768px) {
            .timeline-item, .timeline-item.left, .timeline-item.right {
                width: 100%;
                padding: 10px 15px;
                text-align: center;
            }
            .timeline-item .timeline-box {
                display: block;
                width: auto;
            }
            .timeline-item::after, .timeline-item.right::after {
                left: 50%;
                transform: translateX(-50%);
            }
            .timeline-line {
                left: 50%;
            }
        }
        </style>
        <?php
    }
}
