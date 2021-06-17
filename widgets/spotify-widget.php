<?php

// Initialize Namespace
namespace Elementor;
class liza_spotify_widg extends Widget_Base {

    public function get_name() {
        return  'liza-spotify-widget';
    }

    public function get_title() {
        return esc_html__( 'Liza Spotify Widget', 'liza-spotify' );
    }

    public function get_script_depends() {
        return [
            'liza-script'
        ];
    }
    public function get_style_depends() {
        return [
            'liza-style'
        ];
    }
    public function get_icon() {
        return ' eicon-animated-headline';
    }

    public function get_categories() {
        return [ 'liza-spotify-category' ];
    }
    public function get_keywords() {
        return [ 'Spotify', 'Music','Liza' ];
    }
    public function _register_controls() {
        // Section Starts
        $this->start_controls_section(
			'liza_section_title',
			[
				'label' => __( 'General', 'liza-spotify' ),
			]
		);
        // TEXT
        $this->add_control(
			'spotify_link',
			[
				'label' => __( 'Spotify <bold> Embed </bold> Link', 'liza-spotify' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'https://open.spotify.com/embed/track/4xHWH1jwV5j4mBYRhxPbwZ', 'liza-spotify' ),
				'placeholder' => __( 'Link Here', 'liza-spotify' ),
			]
		);      
	$this->add_control(
      'liza_height',
      [
        'label' => __( 'Height', 'liza-spotify' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 80,
        'max' => 1400,
        'step' => 10,
        'default' => 380,
      ]
    );
        $this->end_controls_section();
    }
    // Render the widget
    protected function render() {
        $settings = $this->get_settings_for_display();
	$height = $settings['liza_height'];
        ?>
 <iframe src="<?php echo esc_url($settings['spotify_link']); ?>" width="100%" height="<?php echo esc_html__($height)?>" frameBorder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new liza_spotify_widg() );
