<?php
/*
    Element: Popular Treatments List
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class popularTreatmentsList {


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'popular_reatments_list', array( $this, 'renderHTML' ) );


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
            "name" => __("Popular Treatments List", 'vc_extend'),
            "description" => __("Popular treatments like in home page", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "popular_reatments_list",
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
        $html = '<div class="recent-blogs">

        <div class="section-title">
            <h3 class="text-center">'. $title .'</h3>
        </div>

        <div class="d-flex list__blogs list__five justify-content-center">';

        
			$loop = new WP_Query( array(
				'post_type' => 'treatments',
				'posts_per_page' => 5,
				'orderby'		=> 'ID',
				'order'			=> 'DESC',
				'cat'	=> 16,
			));
            if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

            $postimg = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url() : get_template_directory_uri().'/images/upload/img-salon-5.jpg';

            $html .= '<div class="col"><div class="box__blog popular"><figure class="post__img">';
            $html .= '<img src="'. $postimg .'" /><a href="'.get_the_permalink().'" class="box--filled"></a></figure>';
            $html .= '<div class="content">
                        <h4 class="text-center"><a href="'.get_the_permalink().'">'. get_the_title() .'</a></h4>
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
new popularTreatmentsList();
