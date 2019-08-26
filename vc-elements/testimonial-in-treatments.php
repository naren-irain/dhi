<?php
/*
    Element: Popular Testimonial List
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class popularTestimonialList {


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'popular_testimonial_list', array( $this, 'renderHTML' ) );


    }

    public function integrateWithVC() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        /*
        Add your Visual Composer logic here.
        Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */
        vc_map( array(
            "name" => __("Popular Testimonial List", 'vc_extend'),
            "description" => __("Popular treatments like in home page", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "popular_testimonial_list",
            "class" => "",
            "controls" => "full",
            "icon" => get_template_directory_uri().'/images/admin/icon-code.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Custom Elements', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Title', 'vc_extend' ),
                    'param_name' => 'title',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                )

            )
        ) );
    }

    /*
    Shortcode logic how it should be rendered
    */
    public function renderHTML( $atts, $content = null ) {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title' => '',
                ),
                $atts
            )
        );

        // Fill $html var with data
        $html = '<div class="section__testimonial container container--secondary">';

        if($title != '') {
            $html .= '<div class="section-title">
                <h3>'. $title .'</h3>
            </div>';
        }

        $html .= '<div class="row list__testimonial">';

			$loop = new WP_Query( array(
				'post_type' => 'testimonial',
				'posts_per_page' => 2,
				'orderby'		=> 'ID',
				'order'			=> 'DESC',
				'cat'	=> 3,
			));
            if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

            $html .= '<div class="col-sm-6"><div class="box__testimonial">';
            $html .= '<div class="content">
                        <div class="description">'. get_the_content() .'</div>
                        <h4>'. get_the_title() .'<br/>'. get_field('job_title') .'</h4>
                    </div>
                </div>
            </div>';

            endwhile; endif; wp_reset_postdata();
        
        $html .= '</div></div>';

        return $html;
    }

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extend'), $plugin_data['Name']).'</p>
        </div>';
    }
}
// Finally initialize code
new popularTestimonialList();
