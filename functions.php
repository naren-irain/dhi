<?php
/**
 * Functions
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

define( 'VISUALCOMPOSERSTARTER_VERSION', '3.0.3' );

if ( ! function_exists( 'visualcomposerstarter_setup' ) ) :

	/**
	 * Theme setup
	 */
	function visualcomposerstarter_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'visual-composer-starter', get_template_directory() . '/languages' );

		/*
		 * Define sidebars
		 */
		define( 'VISUALCOMPOSERSTARTER_PAGE_SIDEBAR',                     'vct_overall_site_page_sidebar' );
		define( 'VISUALCOMPOSERSTARTER_POST_SIDEBAR',                     'vct_overall_site_post_sidebar' );
		define( 'VISUALCOMPOSERSTARTER_ARCHIVE_AND_CATEGORY_SIDEBAR',     'vct_overall_site_aac_sidebar' );
		define( 'VISUALCOMPOSERSTARTER_DISABLE_HEADER',                   'vct_overall_site_disable_header' );
		define( 'VISUALCOMPOSERSTARTER_DISABLE_FOOTER',                   'vct_overall_site_disable_footer' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable custom logo
		 */
		add_theme_support( 'custom-logo' );

		/*
		 * Enable custom background
		 */
		add_theme_support( 'custom-background', array(
				'default-color' => '#ffffff',
			) );

		visualcomposerstarter_set_old_styles();
		visualcomposerstarter_set_old_content_size();

		/*
		 * Feed Links
		 */
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-formats', array( 'gallery', 'video', 'image' ) );

		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		if ( get_theme_mod( 'vct_overall_site_featured_image', true ) === true ) {
			add_theme_support( 'post-thumbnails' );
		}

		add_image_size( 'visualcomposerstarter-featured-loop-image', 848, 0 );
		add_image_size( 'visualcomposerstarter-featured-loop-image-full', 1140, 0 );
		add_image_size( 'visualcomposerstarter-featured-single-image-boxed', 1170, 0 );
		add_image_size( 'visualcomposerstarter-featured-single-image-full', 1920, 0 );

		/*
		 * Set the default content width.
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 848;
		}

		/*
		 * This theme uses wp_nav_menu() in two locations.
		 */
		register_nav_menus( array(
			'primary'       => esc_html__( 'Primary Menu', 'visual-composer-starter' ),
			'treatments'     => esc_html__( 'Footer Menu Treatments', 'visual-composer-starter' ),
			'useful'     => esc_html__( 'Footer Menu Useful', 'visual-composer-starter' ),
		) );

		/*
		 * Comment reply
		 */
		add_action( 'comment_form_before', 'visualcomposerstarter_enqueue_comments_reply' );

		/*
		 * ACF Integration
		 */

		if ( class_exists( 'acf' ) && function_exists( 'register_field_group' ) ) {
			$vct_acf_page_options = array(
				'id' => 'acf_page-options',
				'title' => esc_html__( 'Page Options', 'visual-composer-starter' ),
				'fields' => array(
					array(
						'key' => 'field_589f5a321f0bc',
						'label' => esc_html__( 'Sidebar Position', 'visual-composer-starter' ),
						'name' => 'sidebar_position',
						'type' => 'select',
						'instructions' => esc_html__( 'Select specific sidebar position.', 'visual-composer-starter' ),
						'choices' => array(
							'default' => esc_html__( 'Default', 'visual-composer-starter' ),
							'none' => esc_html__( 'None', 'visual-composer-starter' ),
							'left' => esc_html__( 'Left', 'visual-composer-starter' ),
							'right' => esc_html__( 'Right', 'visual-composer-starter' ),
						),
						'default_value' => get_theme_mod( VISUALCOMPOSERSTARTER_PAGE_SIDEBAR, 'none' ),
						'allow_null' => 0,
						'multiple' => 0,
					),
					array(
						'key' => 'field_589f55db2faa9',
						'label' => esc_html__( 'Hide Page Title', 'visual-composer-starter' ),
						'name' => 'hide_page_title',
						'type' => 'checkbox',
						'choices' => array(
							1 => esc_html__( 'Yes', 'visual-composer-starter' ),
						),
						'default_value' => '',
						'layout' => 'vertical',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array(
					'position' => 'side',
					'layout' => 'default',
					'hide_on_screen' => array(),
				),
				'menu_order' => 0,
			);

			$vct_acf_post_options = array(
				'id' => 'acf_post-options',
				'title' => esc_html__( 'Post Options', 'visual-composer-starter' ),
				'fields' => array(
					array(
						'key' => 'field_589f5b1d656ca',
						'label' => esc_html__( 'Sidebar Position', 'visual-composer-starter' ),
						'name' => 'sidebar_position',
						'type' => 'select',
						'instructions' => esc_html__( 'Select specific sidebar position.', 'visual-composer-starter' ),
						'choices' => array(
							'default' => esc_html__( 'Default', 'visual-composer-starter' ),
							'none' => esc_html__( 'None', 'visual-composer-starter' ),
							'left' => esc_html__( 'Left', 'visual-composer-starter' ),
							'right' => esc_html__( 'Right', 'visual-composer-starter' ),
						),
						'default_value' => get_theme_mod( VISUALCOMPOSERSTARTER_POST_SIDEBAR, 'none' ),
						'allow_null' => 0,
						'multiple' => 0,
					),
					array(
						'key' => 'field_589f5b9a56207',
						'label' => esc_html__( 'Hide Post Title', 'visual-composer-starter' ),
						'name' => 'hide_page_title',
						'type' => 'checkbox',
						'choices' => array(
							1 => esc_html__( 'Yes', 'visual-composer-starter' ),
						),
						'default_value' => '',
						'layout' => 'vertical',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'post',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array(
					'position' => 'side',
					'layout' => 'default',
					'hide_on_screen' => array(),
				),
				'menu_order' => 0,
			);

			if ( ! get_theme_mod( VISUALCOMPOSERSTARTER_DISABLE_HEADER, false ) ) {
				$vct_acf_page_options['fields'][] = array(
					'key' => 'field_58c800e5a7722',
					'label' => 'Disable Header',
					'name' => 'disable_page_header',
					'type' => 'checkbox',
					'choices' => array(
						1 => esc_html__( 'Yes', 'visual-composer-starter' ),
					),
					'default_value' => '',
					'layout' => 'vertical',
				);

				$vct_acf_post_options['fields'][] = array(
					'key' => 'field_58c7e3f0b7dfb',
					'label' => 'Disable Header',
					'name' => 'disable_post_header',
					'type' => 'checkbox',
					'choices' => array(
						1 => esc_html__( 'Yes', 'visual-composer-starter' ),
					),
					'default_value' => '',
					'layout' => 'vertical',
				);
			}

			if ( ! get_theme_mod( VISUALCOMPOSERSTARTER_DISABLE_FOOTER, false ) ) {
				$vct_acf_page_options['fields'][] = array(
					'key' => 'field_58c800faa7723',
					'label' => 'Disable Footer',
					'name' => 'disable_page_footer',
					'type' => 'checkbox',
					'choices' => array(
						1 => esc_html__( 'Yes', 'visual-composer-starter' ),
					),
					'default_value' => '',
					'layout' => 'vertical',
				);

				$vct_acf_post_options['fields'][] = array(
					'key' => 'field_58c7e40db7dfc',
					'label' => 'Disable Footer',
					'name' => 'disable_post_footer',
					'type' => 'checkbox',
					'choices' => array(
						1 => esc_html__( 'Yes', 'visual-composer-starter' ),
					),
					'default_value' => '',
					'layout' => 'vertical',
				);
			}
			register_field_group( $vct_acf_page_options );
			register_field_group( $vct_acf_post_options );
		} // End if().

		/**
		 * Customizer settings.
		 */
		require get_template_directory() . '/inc/customizer/class-visualcomposerstarter-fonts.php';
		require get_template_directory() . '/inc/customizer/class-visualcomposerstarter-customizer.php';
		require get_template_directory() . '/inc/hooks.php';
		// require get_template_directory() . '/inc/extend.php'; // Example for VC-Element
		require get_template_directory() . '/vc-elements/header-boxed.php';
		require get_template_directory() . '/vc-elements/header-with-stats.php';
		require get_template_directory() . '/vc-elements/welcome-section.php';
		require get_template_directory() . '/vc-elements/welcome-section-alt.php';
		require get_template_directory() . '/vc-elements/seven-image-grid.php';
		require get_template_directory() . '/vc-elements/two-images-grid.php';
		require get_template_directory() . '/vc-elements/image-border-content.php';
		require get_template_directory() . '/vc-elements/image-border-content-left.php';
		require get_template_directory() . '/vc-elements/contact-section.php';
		require get_template_directory() . '/vc-elements/content-with-bg.php';
		//require get_template_directory() . '/vc-elements/contact-section-blog.php';
		//require get_template_directory() . '/vc-elements/contact-for-treatment.php';
		require get_template_directory() . '/vc-elements/testimonials-list.php';
		require get_template_directory() . '/vc-elements/testimonial-in-treatments.php';
		require get_template_directory() . '/vc-elements/what-to-expect.php';
		//require get_template_directory() . '/vc-elements/our-team.php';
		//require get_template_directory() . '/vc-elements/our-clinics.php';
		require get_template_directory() . '/vc-elements/treatments-faq.php';
		require get_template_directory() . '/vc-elements/treatment-results.php';
		require get_template_directory() . '/vc-elements/results-tab.php';
		//require get_template_directory() . '/vc-elements/treatments-indications.php';
		require get_template_directory() . '/vc-elements/category-links-grid.php';
		new VisualComposerStarter_Fonts();
		new VisualComposerStarter_Customizer();

	}
endif; /* visualcomposerstarter_setup */

add_action( 'after_setup_theme', 'visualcomposerstarter_setup' );

/**
 *  Style Switch Toggle function
 */
function visualcomposerstarter_style_switch_toggle_acf() {
	$screen = get_current_screen();
	if ( isset( $screen->base ) && 'post' === $screen->base ) {
		$font_uri = VisualComposerStarter_Fonts::vct_theme_get_google_font_uri( array( 'Open Sans' ) );
		wp_register_style( 'visualcomposerstarter-toggle-acf-fonts', $font_uri );
		wp_enqueue_style( 'visualcomposerstarter-toggle-acf-fonts' );

		wp_register_style( 'visualcomposerstarter-toggle-acf-style', get_template_directory_uri() . '/css/toggle-switch.css', array(), false );
		wp_enqueue_style( 'visualcomposerstarter-toggle-acf-style' );
	}
}
add_action( 'admin_enqueue_scripts', 'visualcomposerstarter_style_switch_toggle_acf' );

/**
 *  Script Switch Toggle function
 */
function visualcomposerstarter_script_switch_toggle_acf() {
	$screen = get_current_screen();
	if ( isset( $screen->base ) && 'post' === $screen->base ) {
		wp_register_script( 'visualcomposerstarter-toggle-acf-script', get_template_directory_uri() . '/js/toggle-switch-acf.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'visualcomposerstarter-toggle-acf-script' );
	}
}
add_action( 'admin_enqueue_scripts', 'visualcomposerstarter_script_switch_toggle_acf' );

/**
 * Ajax Comment Reply
 */
function visualcomposerstarter_enqueue_comments_reply() {
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Add Next Page Button to WYSIWYG editor
 */

add_filter( 'mce_buttons', 'visualcomposerstarter_page_break' );

/**
 * Add page break
 *
 * @param string[] $mce_buttons Add page break.
 *
 * @return array
 */
function visualcomposerstarter_page_break( $mce_buttons ) {
	$pos = array_search( 'wp_more', $mce_buttons, true );

	if ( false !== $pos ) {
		$buttons = array_slice( $mce_buttons, 0, $pos );
		$buttons[] = 'wp_page';
		$mce_buttons = array_merge( $buttons, array_slice( $mce_buttons, $pos ) );
	}

	return $mce_buttons;
}

/**
 * Enqueues styles.
 *
 * @since Visual Composer Starter 1.0
 */
function visualcomposerstarter_style() {

	/* Bootstrap stylesheet */
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' );

	/* Add Visual Composer Starter Font */
	wp_register_style( 'visualcomposerstarter-font', get_template_directory_uri() . '/css/visual-composer-starter-font.min.css', array(), VISUALCOMPOSERSTARTER_VERSION );

	/* Slick slider stylesheet */
	wp_register_style( 'twentytwenty', get_template_directory_uri() . '/css/twentytwenty.css', array(), '1.6.0' );

	/* Slick slider stylesheet */
	wp_register_style( 'slick-style', get_template_directory_uri() . '/css/slick.min.css', array(), '1.6.0' );

	/* General theme stylesheet */
	wp_register_style( 'visualcomposerstarter-general', get_template_directory_uri() . '/css/style.min.css', array(), VISUALCOMPOSERSTARTER_VERSION );

	/* Woocommerce stylesheet */
	wp_register_style( 'visualcomposerstarter-woocommerce', get_template_directory_uri() . '/css/woocommerce.min.css', array(), VISUALCOMPOSERSTARTER_VERSION );

	/* Stylesheet with additional responsive style */
	wp_register_style( 'visualcomposerstarter-responsive', get_template_directory_uri() . '/css/responsive.min.css', array(), VISUALCOMPOSERSTARTER_VERSION );

	/* Theme stylesheet */
	wp_register_style( 'visualcomposerstarter-style', get_stylesheet_uri() );

	/* DHI stylesheet */
	wp_register_style( 'dhi-style', get_template_directory_uri() . '/css/dhi.css', array(), '1.6.0' );
	

	/* Font options */
	$fonts = array(
		get_theme_mod( 'vct_fonts_and_style_body_font_family', 'Roboto' ),
		get_theme_mod( 'vct_fonts_and_style_h1_font_family', 'Playfair Display' ),
		get_theme_mod( 'vct_fonts_and_style_h2_font_family', 'Playfair Display' ),
		get_theme_mod( 'vct_fonts_and_style_h3_font_family', 'Playfair Display' ),
		get_theme_mod( 'vct_fonts_and_style_h4_font_family', 'Playfair Display' ),
		get_theme_mod( 'vct_fonts_and_style_h5_font_family', 'Playfair Display' ),
		get_theme_mod( 'vct_fonts_and_style_h6_font_family', 'Playfair Display' ),
		get_theme_mod( 'vct_fonts_and_style_buttons_font_family', 'Playfair Display' ),
	);

	$font_uri = VisualComposerStarter_Fonts::vct_theme_get_google_font_uri( $fonts );

	/* Load Google Fonts */
	wp_register_style( 'visualcomposerstarter-fonts', $font_uri, array(), null, 'screen' );

	/* Enqueue styles */
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'twentytwenty' );
	wp_enqueue_style( 'slick-style' );
	wp_enqueue_style( 'visualcomposerstarter-style' );
	wp_enqueue_style( 'dhi-style' );
	wp_enqueue_style( 'dhi-style-ananth' );
	/*wp_enqueue_style( 'visualcomposerstarter-font' );
	wp_enqueue_style( 'visualcomposerstarter-general' );
	wp_enqueue_style( 'visualcomposerstarter-woocommerce' );
	wp_enqueue_style( 'visualcomposerstarter-responsive' );
	wp_enqueue_style( 'visualcomposerstarter-fonts' );*/
}
add_action( 'wp_enqueue_scripts', 'visualcomposerstarter_style' );


/**
 * Enqueues scripts.
 *
 * @since Visual Composer Starter 1.0
 */
function visualcomposerstarter_script() {
	/* Bootstrap Transition JS */
	wp_register_script( 'bootstrap-transition', get_template_directory_uri() . '/js/bootstrap/transition.min.js', array( 'jquery' ), '3.3.7', true );

	/* Bootstrap Transition JS */
	wp_register_script( 'bootstrap-collapser', get_template_directory_uri() . '/js/bootstrap/collapse.min.js', array( 'jquery' ), '3.3.7', true );

	/* Slick Slider JS */
	wp_register_script( 'event-js', get_template_directory_uri() . '/js/lib/jquery.event.move.js', array( 'jquery' ), '1.6.0', true );
	wp_register_script( 'twentytwenty-js', get_template_directory_uri() . '/js/lib/jquery.twentytwenty.js', array( 'jquery' ), '1.6.0', true );

	/* Slick Slider JS */
	wp_register_script( 'slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', array( 'jquery' ), '1.6.0', true );

	/* Parallax JS */
	wp_register_script( 'skrollr-js', get_template_directory_uri() . '/js/lib/skrollr.min.js', array( 'jquery' ), '1', true );

	/* Modernizr JS */
	wp_register_script( 'modernizr-js', get_template_directory_uri() . '/js/lib/modernizr-custom.js', array( 'jquery' ), '1', true );

	/* Main theme JS functions */
	wp_register_script( 'visualcomposerstarter-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), VISUALCOMPOSERSTARTER_VERSION, true );

	wp_localize_script( 'jquery', 'visualcomposerstarter', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'visualcomposerstarter' ),
		'woo_coupon_form' => get_theme_mod( 'woocommerce_coupon_from', false ),
	) );

	/* Enqueue scripts */
	wp_enqueue_script( 'modernizr-js' );
	wp_enqueue_script( 'bootstrap-transition' );
	wp_enqueue_script( 'bootstrap-collapser' );
	wp_enqueue_script( 'skrollr-js' );
	wp_enqueue_script( 'event-js' );
	wp_enqueue_script( 'slick-js' );
	wp_enqueue_script( 'twentytwenty-js' );
	wp_enqueue_script( 'visualcomposerstarter-script' );
}
add_action( 'wp_enqueue_scripts', 'visualcomposerstarter_script' );

/**
 * Used by hook: 'customize_preview_init'
 *
 * @see add_action('customize_preview_init',$func)
 */
function visualcomposerstarter_customizer_live_preview() {
	wp_enqueue_script( 'visualcomposerstarter-themecustomizer', get_template_directory_uri() . '/js/customize-preview.min.js', array(
			'jquery',
			'customize-preview',
		), '', true );
}
add_action( 'customize_preview_init', 'visualcomposerstarter_customizer_live_preview' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param Classes $classes Classes list.
 *
 * @return array
 */
function visualcomposerstarter_body_classes( $classes ) {
	$classes[] = 'visualcomposerstarter';

	/* Sandwich color */
	if ( get_theme_mod( 'vct_header_sandwich_style', '#333333' ) === '#FFFFFF' ) {
		$classes[] = 'sandwich-color-light';
	}

	/* Header Style */
	if ( get_theme_mod( 'vct_header_position', 'top' ) === 'sandwich' ) {
		$classes[] = 'menu-sandwich';
	}

	/* Menu position */
	if ( get_theme_mod( 'vct_header_sticky_header', false ) === true ) {
		$classes[] = 'fixed-header';
	}

	/* Navbar background */
	if ( get_theme_mod( 'vct_header_reserve_space_for_header', true ) === false ) {
		$classes[] = 'navbar-no-background';
	}

	/* Width of header-area */
	if ( get_theme_mod( 'vct_header_top_header_width', 'boxed' ) === 'full_width' ) {
		$classes[] = 'header-full-width';
	} elseif ( get_theme_mod( 'vct_header_top_header_width', 'boxed' ) === 'full_width_boxed' ) {
		$classes[] = 'header-full-width-boxed';
	}

	/* Width of content-area */
	if ( get_theme_mod( 'vct_overall_content_area_size', 'boxed' ) === 'full_width' ) {
		$classes[] = 'content-full-width';
	}

	/* Height of featured image */
	if ( get_theme_mod( 'vct_overall_site_featured_image_height', 'auto' ) === 'full_height' ) {
		$classes[] = 'featured-image-full-height';
	}

	if ( get_theme_mod( 'vct_overall_site_featured_image_height', 'auto' ) === 'custom' ) {
		$classes[] = 'featured-image-custom-height';
	}

	if ( false === visualcomposerstarter_is_the_header_displayed() ) {
		$classes[] = 'header-area-disabled';
	}
	if ( false === visualcomposerstarter_is_the_footer_displayed() ) {
		$classes[] = 'footer-area-disabled';
	}

	return $classes;
}
add_filter( 'body_class', 'visualcomposerstarter_body_classes' );

/**
 *  Give linked images class
 *
 * @param string $html Html.
 * @since Visual Composer Starter 1.2
 * @return mixed
 */
function visualcomposerstarter_give_linked_images_class( $html ) {
	$classes = 'image-link'; // separated by spaces, e.g. 'img image-link'.

	$patterns = array();
	$replacements = array();

	// Matches img tag wrapped in anchor tag where anchor has existing classes contained in double quotes.
	$patterns[0] = '/<a([^>]*)class="([^"]*)"([^>]*)>\s*<img([^>]*)>\s*<\/a>/';
	$replacements[0] = '<a\1class="' . $classes . ' \2"\3><img\4></a>';

	// Matches img tag wrapped in anchor tag where anchor has existing classes contained in single quotes.
	$patterns[1] = '/<a([^>]*)class=\'([^\']*)\'([^>]*)>\s*<img([^>]*)>\s*<\/a>/';
	$replacements[1] = '<a\1class="' . $classes . ' \2"\3><img\4></a>';

	// Matches img tag wrapped in anchor tag where anchor tag has no existing classes.
	$patterns[2] = '/<a(?![^>]*class)([^>]*)>\s*<img([^>]*)>\s*<\/a>/';
	$replacements[2] = '<a\1 class="' . $classes . '"><img\2></a>';

	$html = preg_replace( $patterns, $replacements, $html );

	return $html;
}
add_filter( 'the_content', 'visualcomposerstarter_give_linked_images_class' );

/*
 * Register sidebars
 */
register_sidebar(
	array(
		'name'          => esc_html__( 'Sidebar', 'visual-composer-starter' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'visual-composer-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h2>',
	)
);

register_sidebar(
	array(
		'name'          => esc_html__( 'Menu Area', 'visual-composer-starter' ),
		'id'            => 'menu',
		'description'   => esc_html__( 'Add widgets here to appear in menu area.', 'visual-composer-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h2>',
	)
);
/**
 * Footer area 1.
 *
 * @return array
 */
function visualcomposerstarter_footer_1() {
	return array(
		'name' => esc_html__( 'Footer Widget Column 1', 'visual-composer-starter' ),
		'id' => 'footer',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'visual-composer-starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h2>',
	);
}
/**
 * Footer area 2.
 *
 * @return array
 */
function visualcomposerstarter_footer_2() {
	return array(
		'name' => esc_html__( 'Footer Widget Column 2', 'visual-composer-starter' ),
		'id' => 'footer-2',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'visual-composer-starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h2>',
	);
}
/**
 * Footer area 3.
 *
 * @return array
 */
function visualcomposerstarter_footer_3() {
	return array(
		'name' => esc_html__( 'Footer Widget Column 3', 'visual-composer-starter' ),
		'id' => 'footer-3',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'visual-composer-starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h2>',
	);
}
/**
 * Footer area 4.
 *
 * @return array
 */
function visualcomposerstarter_footer_4() {
	return array(
		'name' => esc_html__( 'Footer Widget Column 4', 'visual-composer-starter' ),
		'id' => 'footer-4',
		'description' => esc_html__( 'Add widgets here to appear in your footer.', 'visual-composer-starter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h2>',
	);
}

add_action( 'widgets_init',             'visualcomposerstarter_all_widgets' );
add_action( 'admin_bar_init',           'visualcomposerstarter_widgets' );

/**
 * All widgets.
 */
function visualcomposerstarter_all_widgets() {
	/**
	 * Register all zones for availability in customizer
	 */
	register_sidebar(
		visualcomposerstarter_footer_1()
	);
	register_sidebar(
		visualcomposerstarter_footer_2()
	);
	register_sidebar(
		visualcomposerstarter_footer_3()
	);
	register_sidebar(
		visualcomposerstarter_footer_4()
	);
}

/**
 * Widgets handler
 */
function visualcomposerstarter_widgets() {
	unregister_sidebar( 'footer' );
	unregister_sidebar( 'footer-2' );
	unregister_sidebar( 'footer-3' );
	unregister_sidebar( 'footer-4' );
	if ( get_theme_mod( 'vct_footer_area_widget_area', false ) ) {
		$footer_columns = intval( get_theme_mod( 'vct_footer_area_widgetized_columns', 1 ) );
		if ( $footer_columns >= 1 ) {
			register_sidebar(
				visualcomposerstarter_footer_1()
			);
		}

		if ( $footer_columns >= 2 ) {
			register_sidebar(
				visualcomposerstarter_footer_2()
			);
		}

		if ( $footer_columns >= 3 ) {
			register_sidebar(
				visualcomposerstarter_footer_3()
			);
		}
		if ( 4 === $footer_columns ) {
			register_sidebar(
				visualcomposerstarter_footer_4()
			);
		}
	}

}

/**
 * Is header displayed
 *
 * @return bool
 */
function visualcomposerstarter_is_the_header_displayed() {
	if ( get_theme_mod( VISUALCOMPOSERSTARTER_DISABLE_HEADER, false ) ) {
		return false;
	} elseif ( function_exists( 'get_field' ) ) {
		if ( is_page() && ! ( function_exists( 'is_shop' ) && is_shop() ) ) {
			return ! get_field( 'field_58c800e5a7722' );
		} elseif ( function_exists( 'is_shop' ) && is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
			return ! get_field( 'field_58c800e5a7722', get_option( 'woocommerce_shop_page_id' ) );
		} elseif ( is_singular() ) {
			return ! get_field( 'field_58c7e3f0b7dfb' );
		} else {
			return true;
		}
	} else {
		return true;
	}
}

/**
 * Is footer displayed.
 *
 * @return bool
 */
function visualcomposerstarter_is_the_footer_displayed() {
	if ( get_theme_mod( VISUALCOMPOSERSTARTER_DISABLE_FOOTER, false ) ) {
		return false;
	} elseif ( function_exists( 'get_field' ) ) {
		if ( is_page() && ! ( function_exists( 'is_shop' ) && is_shop() ) ) {
			return ! get_field( 'field_58c800faa7723' );
		} elseif ( function_exists( 'is_shop' ) && is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
			return ! get_field( 'field_58c800faa7723', get_option( 'woocommerce_shop_page_id' ) );
		} elseif ( is_singular() ) {
			return ! get_field( 'field_58c7e40db7dfc' );
		} else {
			return true;
		}
	} else {
		return true;
	}
}

/**
 * Get header container class.
 *
 * @return string
 */
function visualcomposerstarter_get_header_container_class() {
	if ( get_theme_mod( 'vct_header_top_header_width', 'boxed' ) === 'full_width' ) {
		return 'container-fluid';
	} else {
		return 'container';
	}
}

/**
 * Get header image container class.
 *
 * @return string
 */
function visualcomposerstarter_get_header_image_container_class() {
	if ( get_theme_mod( 'vct_overall_site_featured_image_width', 'full_width' ) === 'full_width' ) {
		return 'container-fluid';
	} else {
		return 'container';
	}
}

/**
 * Get contant container class
 *
 * @return string
 */
function visualcomposerstarter_get_content_container_class() {
	if ( 'full_width' === get_theme_mod( 'vct_overall_content_area_size', 'boxed' ) ) {
		return 'container-fluid';
	} else {
		return 'fluid-div';
		//return 'container';
	}
}

/**
 * Check needed sidebar
 *
 * @return string
 */
function visualcomposerstarter_check_needed_sidebar() {
	if ( is_page() && ! ( function_exists( 'is_shop' ) && is_shop() ) ) {
		return VISUALCOMPOSERSTARTER_PAGE_SIDEBAR;
	} elseif ( function_exists( 'is_shop' ) && is_shop() ) {
		return VISUALCOMPOSERSTARTER_PAGE_SIDEBAR;
	} elseif ( is_singular() ) {
		return VISUALCOMPOSERSTARTER_POST_SIDEBAR;
	} elseif ( is_archive() || is_category() || is_search() || is_front_page() || is_home() ) {
		return VISUALCOMPOSERSTARTER_ARCHIVE_AND_CATEGORY_SIDEBAR;
	} else {
		return 'none';
	}
}

/**
 * Specify sidebar
 *
 * @return null
 */
function visualcomposerstarter_specify_sidebar() {
	if ( is_page() ) {
		$value = function_exists( 'get_field' ) ? get_field( 'field_589f5a321f0bc' ) : null;
	} elseif ( is_singular() ) {
		$value = function_exists( 'get_field' ) ? get_field( 'field_589f5b1d656ca' ) : null;
	} elseif ( ( is_archive() || is_category() || is_search() || is_front_page() || is_home() ) && ! ( function_exists( 'is_shop' ) && is_shop() ) ) {
		if ( is_front_page() ) {
			$value = function_exists( 'get_field' ) ? get_field( 'field_589f5a321f0bc', get_option( 'page_on_front' ) ) : null;
		} elseif ( is_home() ) {
			$value = function_exists( 'get_field' ) ? get_field( 'field_589f5a321f0bc', get_option( 'page_for_posts' ) ) : null;
		} else {
			$value = get_theme_mod( visualcomposerstarter_check_needed_sidebar(), 'none' );
		}
	} elseif ( function_exists( 'is_shop' ) && is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
		$value = function_exists( 'get_field' ) ? get_field( 'field_589f5a321f0bc', get_option( 'woocommerce_shop_page_id' ) ) : null;
	} else {
		$value = null;
	}

	$value = apply_filters( 'visualcomposerstarter_specify_sidebar', $value );

	if ( 'default' === $value ) {
		return get_theme_mod( visualcomposerstarter_check_needed_sidebar(), 'none' );
	} else {
		$specify_setting = function_exists( 'get_field' ) ? $value : null;
		if ( $specify_setting ) {
			return $specify_setting;
		} else {
			return get_theme_mod( visualcomposerstarter_check_needed_sidebar(), 'none' );
		}
	}
}

/**
 * Is the title displayed
 *
 * @return bool
 */
function visualcomposerstarter_is_the_title_displayed() {
	if ( function_exists( 'get_field' ) ) {
		if ( is_page() && ! ( function_exists( 'is_shop' ) && is_shop() ) ) {
			return (bool) ! get_field( 'field_589f55db2faa9' );
		} elseif ( function_exists( 'is_shop' ) && is_shop() && get_option( 'woocommerce_shop_page_id' ) ) {
			return (bool) ! get_field( 'field_589f55db2faa9', get_option( 'woocommerce_shop_page_id' ) );
		} elseif ( is_singular() ) {
			return (bool) ! get_field( 'field_589f5b9a56207' );
		} else {
			return true;
		}
	} else {
		return true;
	}
}

/**
 * Get main content block class
 *
 * @return string
 */
function visualcomposerstarter_get_maincontent_block_class() {
	switch ( visualcomposerstarter_specify_sidebar() ) {
		case 'none':
			return 'col-md-12';
		case 'left':
			return 'col-md-9 col-md-push-3';
		case 'right':
			return 'col-md-9';
		default:
			return 'col-md-12';
	}
}

/**
 * Get sidebar class
 *
 * @return bool|string
 */
function visualcomposerstarter_get_sidebar_class() {
	switch ( visualcomposerstarter_specify_sidebar() ) {
		case 'none':
			return false;
		case 'left':
			return 'col-md-3 col-md-pull-9';
		case 'right':
			return 'col-md-3';
		default:
			return false;
	}
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'visualcomposerstarter_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function visualcomposerstarter_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array();

	if ( ! class_exists( 'acf' ) ) {
		$plugins[] = array(
			'name' => 'Advanced Custom Fields',
			'slug' => 'advanced-custom-fields',
			'required' => false,
		);
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'visual-composer-starter',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}

/**
 *  For backward compatibility for background
 *
 * @deprecated 1.3
 */
function visualcomposerstarter_set_old_styles() {
	if ( get_theme_mod( 'vct_overall_site_bg_color' ) ) {
		set_theme_mod( 'background_color', str_replace( '#', '', get_theme_mod( 'vct_overall_site_bg_color' ) ) );
		remove_theme_mod( 'vct_overall_site_bg_color' );
	}

	if ( get_theme_mod( 'vct_overall_site_enable_bg_image' ) ) {

		set_theme_mod( 'background_attachment', 'scroll' );
		set_theme_mod( 'background_image', esc_url_raw( get_theme_mod( 'vct_overall_site_bg_image' ) ) );
		if ( 'repeat' === get_theme_mod( 'vct_overall_site_bg_image_style' ) ) {
			set_theme_mod( 'background_repeat', 'repeat' );
		} else {
			set_theme_mod( 'background_repeat', 'no-repeat' );
			set_theme_mod( 'background_size', esc_html( get_theme_mod( 'vct_overall_site_bg_image_style' ) ) );
		}

		remove_theme_mod( 'vct_overall_site_bg_image' );
		remove_theme_mod( 'vct_overall_site_bg_image_style' );
		remove_theme_mod( 'vct_overall_site_enable_bg_image' );
	}
}

/**
 * For backward compatibility content area size
 *
 * @deprecated 2.0.4
 */
function visualcomposerstarter_set_old_content_size() {
	if ( get_theme_mod( 'vct_content_area_size' ) ) {
		set_theme_mod( 'vct_overall_content_area_size', get_theme_mod( 'vct_content_area_size' ) );
		remove_theme_mod( 'vct_content_area_size' );
	}
}

if ( ! function_exists( 'visualcomposerstarter_support' ) ) {
	/**
	 *  WooCommerce support
	 */
	function visualcomposerstarter_support() {
		add_theme_support( 'woocommerce' );
	}

	add_action( 'after_setup_theme', 'visualcomposerstarter_support' );

}
/**
 *  WooCommerce single product gallery
 */
function visualcomposerstarter_woo_setup() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'visualcomposerstarter_woo_setup' );

/**
 *  WooCommerce single product categories layout
 */
function visualcomposerstarter_woo_categories() {
	global $product;
	// @codingStandardsIgnoreLine
	echo wc_get_product_category_list( $product->get_id(), ' ', '<div class="entry-categories"><span class="screen-reader-text">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'visual-composer-starter' ) . '</span>', '</div>' );
}
add_action( 'woocommerce_single_product_summary', 'visualcomposerstarter_woo_categories', 1 );

/**
 * WooCommerce single product tags layout
 */
function visualcomposerstarter_woo_tags() {
	global $product;
	// @codingStandardsIgnoreLine
	echo wc_get_product_tag_list( $product->get_id(), ' ', '<div class="entry-tags"><span class="screen-reader-text">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'visual-composer-starter' ) . '</span>', '</div>' );
}
add_action( 'woocommerce_single_product_summary', 'visualcomposerstarter_woo_tags', 65 );

/**
 * WooCommerce single product price layout
 *
 * @param product $price layout.
 * @param product $regular_price number.
 * @param product $sale_price number.
 * @return string
 */
function visualcomposerstarter_woo_format_sale_price( $price, $regular_price, $sale_price ) {
	$price = '<ins>' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</ins> <del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del>';

	return $price;
}
add_filter( 'woocommerce_format_sale_price', 'visualcomposerstarter_woo_format_sale_price', 10, 3 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

/**
 * WooCommerce single product sale flash layout
 *
 * @param single $post data.
 * @param single $product data.
 * @return string
 */
function visualcomposerstarter_woo_sale_flash( $post, $product ) {
	$sale = <<<HTML
 <span class="onsale vct-sale">
	<svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Product-Open" transform="translate(-20.000000, -24.000000)" fill-rule="nonzero" fill="#FAC917">
                <g id="Image" transform="translate(0.000000, 4.000000)">
                    <g id="Discount" transform="translate(20.000000, 20.000000)">
                        <ellipse id="Oval" cx="17.5163" cy="19.8834847" rx="2.04" ry="2.00245399"></ellipse>
                        <ellipse id="Oval" cx="30.4763" cy="28.011092" rx="2.04" ry="2.00245399"></ellipse>
                        <path d="M47.2963,26.5975951 L46.5563,25.606184 C45.7563,24.5264294 45.7363,23.0638528 46.5263,21.9644663 L47.2463,20.9632393 C48.3463,19.4319509 47.8363,17.3018896 46.1463,16.408638 L45.0463,15.8294969 C43.8463,15.2012761 43.1863,13.8859387 43.4163,12.5607853 L43.6263,11.3534233 C43.9463,9.50802454 42.5363,7.80004908 40.6263,7.72152147 L39.3763,7.67244172 C38.0163,7.61354601 36.8363,6.71047853 36.4563,5.42458896 L36.1063,4.24667485 C35.5763,2.44053988 33.5563,1.50802454 31.7963,2.25403681 L30.6463,2.7350184 C29.3963,3.26507975 27.9363,2.95096933 27.0263,1.94974233 L26.1963,1.0368589 C24.9263,-0.357006135 22.6963,-0.347190184 21.4363,1.0761227 L20.6163,1.99882209 C19.7163,3.00986503 18.2663,3.34360736 17.0063,2.83317791 L15.8463,2.36201227 C14.0763,1.64544785 12.0763,2.61722699 11.5663,4.42336196 L11.2363,5.61109202 C10.8763,6.90679755 9.7163,7.82949693 8.3563,7.89820859 L7.1063,7.96692025 C5.1963,8.07489571 3.8163,9.80250307 4.1663,11.6479018 L4.3963,12.8552638 C4.6463,14.1706012 4.0063,15.4957546 2.8163,16.1436074 L1.7263,16.7423804 C0.0563,17.6552638 -0.4237,19.7951411 0.7063,21.3067975 L1.4463,22.2982086 C2.2463,23.3779632 2.2663,24.8405399 1.4763,25.9399264 L0.7563,26.9411534 C-0.3437,28.4724417 0.1663,30.6025031 1.8563,31.4957546 L2.9563,32.0748957 C4.1563,32.7031166 4.8163,34.018454 4.5863,35.3436074 L4.3763,36.5509693 C4.0563,38.3963681 5.4663,40.1043436 7.3763,40.1828712 L8.6263,40.2319509 C9.9863,40.2908466 11.1663,41.1939141 11.5463,42.4798037 L11.8963,43.6577178 C12.4263,45.4638528 14.4463,46.3963681 16.2063,45.6503558 L17.3563,45.1693742 C18.6063,44.6393129 20.0663,44.9534233 20.9763,45.9546503 L21.8063,46.8675337 C23.0863,48.2613988 25.3163,48.2515828 26.5663,46.8282699 L27.3863,45.9055706 C28.2863,44.8945276 29.7363,44.5607853 30.9963,45.0712147 L32.1563,45.5423804 C33.9263,46.2589448 35.9263,45.2871656 36.4363,43.4810307 L36.7663,42.2933006 C37.1263,40.9975951 38.2863,40.0748957 39.6463,40.006184 L40.8963,39.9374724 C42.8063,39.8294969 44.1863,38.1018896 43.8363,36.2564908 L43.6063,35.0491288 C43.3563,33.7337914 43.9963,32.408638 45.1863,31.7607853 L46.2763,31.1620123 C47.9463,30.2589448 48.4263,28.1190675 47.2963,26.5975951 Z M12.5863,19.8834847 C12.5863,17.213546 14.7863,15.0540368 17.5063,15.0540368 C20.2263,15.0540368 22.4263,17.213546 22.4263,19.8834847 C22.4263,22.5534233 20.2263,24.7129325 17.5063,24.7129325 C14.7863,24.7129325 12.5863,22.5436074 12.5863,19.8834847 Z M18.4563,32.3399264 C18.0363,32.8405399 17.2763,32.9092515 16.7663,32.4969816 L16.7663,32.4969816 C16.2563,32.0847117 16.1863,31.3386994 16.6063,30.8380859 L29.5163,15.5742822 C29.9363,15.0736687 30.6963,15.0049571 31.2063,15.417227 C31.7163,15.8294969 31.7863,16.5755092 31.3663,17.0761227 L18.4563,32.3399264 Z M30.4763,32.8405399 C27.7563,32.8405399 25.5563,30.6810307 25.5563,28.011092 C25.5563,25.3411534 27.7563,23.1816442 30.4763,23.1816442 C33.1963,23.1816442 35.3963,25.3411534 35.3963,28.011092 C35.3963,30.6810307 33.1963,32.8405399 30.4763,32.8405399 Z" id="Shape"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
</span>
HTML;

	return $sale;
}
add_filter( 'woocommerce_sale_flash', 'visualcomposerstarter_woo_sale_flash', 10, 2 );

/**
 * Update cart woocommerce cart item count
 */
function visualcomposerstarter_woo_cart_count() {
	if ( function_exists( 'WC' ) ) {
		echo esc_html( WC()->cart->get_cart_contents_count() );
	}
	die;
}
add_action( 'wp_ajax_visualcomposerstarter_woo_cart_count', 'visualcomposerstarter_woo_cart_count' );
add_action( 'wp_ajax_nopriv_visualcomposerstarter_woo_cart_count', 'visualcomposerstarter_woo_cart_count' );

/**
 * Add variable container
 *
 * @param dropdown $html content.
 * @return string
 */
function visualcomposerstarter_woo_variable_container( $html ) {
	return '<div class="vct-variable-container">' . $html . '</div>';
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'visualcomposerstarter_woo_variable_container' );

/**
 * Removes the "shop" title on the main shop page
 *
 * @access public
 * @return bool
 */
function visualcomposerstarter_woo_hide_page_title() {
	return visualcomposerstarter_is_the_title_displayed();
}
add_filter( 'woocommerce_show_page_title', 'visualcomposerstarter_woo_hide_page_title' );

// Move payments after customer details.
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20 );


/** Custom Param element to add link */
function setting_block_field_param( $settings, $value ) {
 	return '<div style="font-size:16px;"><span style=" display:block;">The block occurs on multiple pages, so we moved its settings to <pre>Theme Settings/'.get_the_title(esc_attr( $settings['block_id']  )).'</pre></span><span style=" display:block;">In order to edit the block, click <a style="font-weight:700;" href="'. get_edit_post_link(esc_attr( $settings['block_id']  )) .'" alt="edit page link" target="_blank">here</a></span></div>'; // This is html markup that will be outputted in content elements edit form
}
vc_add_shortcode_param( 'setting_block_id', 'setting_block_field_param' );


/* Add length options in excerpt */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
/* Add length options in content */
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}

/* Website Url Short Code  */
function wp_site_url() {
	return get_site_url();
}
add_shortcode('wp_site_url', 'wp_site_url');


/* Template Url Short Code  */
function wp_template_url() {
	return get_template_directory_uri();
}
add_shortcode('wp_template_url', 'wp_template_url');
