<?php
/*
    Element: Two Images Grid
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class twoImagesGrid {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'two_images_grid', array( $this, 'renderHTML' ) );

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
            "name" => __("Two Images Grid", 'vc_extend'),
            "description" => __("Two Images with 50% width", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "two_images_grid",
            "class" => "",
            "controls" => "full",
            "icon" => get_template_directory_uri().'/images/admin/icon-code.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Custom Elements', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 1', 'vc_extend' ),
                    'param_name' => 'grid_image_1',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 2', 'vc_extend' ),
                    'param_name' => 'grid_image_2',
                    // 'value' => __( 'Default value', 'vc_extend' ),
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
                    'grid_image_1' => 'grid_image_1',
                    'grid_image_2' => 'grid_image_2'
                ),
                $atts
            )
        );

        $img1_url = wp_get_attachment_image_src( $grid_image_1, "full");
        $img2_url = wp_get_attachment_image_src( $grid_image_2, "full");

        // Fill $html var with data
        $html = '
        <div class="two-image-grid">
            <div class="d-flex">
                <div class="left-grid">
                    <figure>
                        <img src="'. $img1_url[0] .'" />
                    </figure>
                </div>
                <div class="right-grid">
                    <figure>
                        <img src="'. $img2_url[0] .'" />
                    </figure>
                </div>
            </div>
        </div>';

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
new twoImagesGrid();
