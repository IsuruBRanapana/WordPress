<?php
/**
 * Veterinary Pet Care Theme Customizer
 * @package Veterinary Pet Care
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function veterinary_pet_care_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'veterinary_pet_care_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'veterinary-pet-care' ),
	    'description' => __( 'Description of what this panel does.', 'veterinary-pet-care' ),
	) );

	//layout setting
	$wp_customize->add_section( 'veterinary_pet_care_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'veterinary-pet-care' ),    	
    	'description'	=> __('Here you can select the blog sidebar layout.','veterinary-pet-care'),
		'priority'   => null,
		'panel' => 'veterinary_pet_care_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('veterinary_pet_care_layout',array(
        'default' => __( 'Right Sidebar', 'veterinary-pet-care' ),
        'sanitize_callback' => 'veterinary_pet_care_sanitize_choices'
	) );
	$wp_customize->add_control(new veterinary_pet_care_Image_Radio_Control($wp_customize, 'veterinary_pet_care_layout', array(
        'type' => 'radio',
        'label' => esc_html__('Select Sidebar layout', 'veterinary-pet-care'),
        'section' => 'veterinary_pet_care_theme_layout',
        'settings' => 'veterinary_pet_care_layout',
        'choices' => array(
            'Right Sidebar' => get_template_directory_uri() . '/images/layout3.png',
            'Left Sidebar' => get_template_directory_uri() . '/images/layout2.png',
            'One Column' => get_template_directory_uri() . '/images/layout1.png',
            'Three Columns' => get_template_directory_uri() . '/images/layout4.png',
            'Four Columns' => get_template_directory_uri() . '/images/layout5.png',
            'Grid Layout' => get_template_directory_uri() . '/images/layout6.png'
   	))));

	//Topbar section
	$wp_customize->add_section('veterinary_pet_care_topbar_icon',array(
		'title'	=> __('Topbar Section','veterinary-pet-care'),
		'description'	=> __('Add Header Content here','veterinary-pet-care'),
		'priority'	=> null,
		'panel' => 'veterinary_pet_care_panel_id',
	));

	$wp_customize->add_setting('veterinary_pet_care_request_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('veterinary_pet_care_request_text',array(
		'label'	=> __('Add Appointment Text','veterinary-pet-care'),
		'section'	=> 'veterinary_pet_care_topbar_icon',
		'setting'	=> 'veterinary_pet_care_request_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('veterinary_pet_care_request_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('veterinary_pet_care_request_link',array(
		'label'	=> __('Add Appointment Link','veterinary-pet-care'),
		'section'	=> 'veterinary_pet_care_topbar_icon',
		'setting'	=> 'veterinary_pet_care_request_link',
		'type'		=> 'url'
	));

	//Slider section
  	$wp_customize->add_section('veterinary_pet_care_slidersettings',array(
	    'title' => __('Slider Section','veterinary-pet-care'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'veterinary_pet_care_panel_id',
	)); 

	$wp_customize->add_setting('veterinary_pet_care_slider_hide_show',array(
	  'default' => 'false',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('veterinary_pet_care_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','veterinary-pet-care'),
	  'section' => 'veterinary_pet_care_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'veterinary_pet_care_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'veterinary_pet_care_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'veterinary_pet_care_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'veterinary-pet-care' ),
			'section'  => 'veterinary_pet_care_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//About Section
	$wp_customize->add_section('veterinary_pet_care_services',array(
		'title'	=> __('Services Section','veterinary-pet-care'),
		'description'	=> __('Add About sections below.','veterinary-pet-care'),
		'panel' => 'veterinary_pet_care_panel_id',
	));

	$wp_customize->add_setting('veterinary_pet_care_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('veterinary_pet_care_services_title',array(
		'label'	=> __('Section Title','veterinary-pet-care'),
		'section'	=> 'veterinary_pet_care_services',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('veterinary_pet_care_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('veterinary_pet_care_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','veterinary-pet-care'),
		'description'=> __('Size of image should be 80 x 80 ','veterinary-pet-care'),
		'section' => 'veterinary_pet_care_services',
	));

	//footer text
	$wp_customize->add_section('veterinary_pet_care_footer_section',array(
		'title'	=> __('Footer Text','veterinary-pet-care'),
		'description'	=> __('Add some text for footer like copyright etc.','veterinary-pet-care'),
		'panel' => 'veterinary_pet_care_panel_id'
	));
	
	$wp_customize->add_setting('veterinary_pet_care_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('veterinary_pet_care_text',array(
		'label'	=> __('Copyright Text','veterinary-pet-care'),
		'section'	=> 'veterinary_pet_care_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'veterinary_pet_care_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

class veterinary_pet_care_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='veterinary-pet-care-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'veterinary-pet-care-radio-img-selected veterinary-pet-care-radio-img-img' : 'veterinary-pet-care-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    } 
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Veterinary_Pet_Care_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Veterinary_Pet_Care_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Veterinary_Pet_Care_Customize_Section_Pro(
			$manager,
			'example_1',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'Pet Care Pro', 'veterinary-pet-care' ),
				'pro_text' => esc_html__( 'Go Pro', 'veterinary-pet-care' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/veterinary-pet-wordpress-theme/')					
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'veterinary-pet-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'veterinary-pet-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!

Veterinary_Pet_Care_Customize::get_instance();