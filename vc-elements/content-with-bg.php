<?php
/*
    Element: Content with Background
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class contentWithBG {


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'content_with_bg', array( $this, 'renderHTML' ) );

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
            "name" => __("Content with Background", 'vc_extend'),
            "description" => __("Content with Background", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "content_with_bg",
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
                    'heading' => __( 'Image', 'vc_extend' ),
                    'param_name' => 'bgimg',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Column 1 title', 'vc_extend' ),
                    'param_name' => 'column_1_title',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textarea',
                    'holder' => 'div',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Column 1 Content', 'vc_extend' ),
                    'param_name' => 'column_1_content',
                    'value' => __( '', 'vc_extend' ),
                    // 'admin_label' => false,
                    // 'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Column 2 title', 'vc_extend' ),
                    'param_name' => 'column_2_title',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textarea',
                    'holder' => 'div',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Column 2 Content', 'vc_extend' ),
                    'param_name' => 'column_2_content',
                    'value' => __( '', 'vc_extend' ),
                    // 'admin_label' => false,
                    // 'weight' => 0,
                    'group' => 'Listing',
                ),

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
                    'column_1_title' => '',
                    'column_1_content' => '',
                    'column_2_title' => '',
                    'column_2_content' => '',
                    'bgimg' => 'bgimg',
                ),
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $bgimg, "full");

        // Fill $html var with data
        $html = '
        <section class="section__welcome contact__withbg contentOnly" style="background-image: url('. $img_url[0] .');">
            <div class="row">
                <div class="col-sm-6">
                    <h2>'. $column_1_title .'</h2>
                    <div class="wpc-directory-text wpb_content_element">'. $column_1_content .'</div>
                </div>
                <div class="col-sm-6">
                    <h2>'. $column_2_title .'</h2>
                    <div class="wpc-directory-text wpb_content_element">'. $column_2_content .'</div>
                </div>
            </div>
        </section>';

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
new contentWithBG();
