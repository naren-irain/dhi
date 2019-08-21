<?php
/*
    Element: Welcome Section
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class welcomeSection {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'welcome_section', array( $this, 'renderHTML' ) );

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
            "name" => __("Welcome Section", 'vc_extend'),
            "description" => __("Left multipe content, Right single content", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "welcome_section",
            "class" => "",
            "controls" => "full",
            "icon" => get_template_directory_uri().'/images/admin/icon-code.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Custom Elements', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

                array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Column 1 content', 'vc_extend' ),
                    'param_name' => 'content',
                    'value' => __( '', 'vc_extend' ),
                    'description' => __( 'To add link highlight text or url and click the chain to apply hyperlink', 'vc_extend' ),
                    // 'admin_label' => false,
                    // 'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textarea',
                    'holder' => 'p',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Column 2 content', 'vc_extend' ),
                    'param_name' => 'content2',
                    'value' => __( '', 'vc_extend' ),
                    'description' => __( 'To add link highlight text or url and click the chain to apply hyperlink', 'vc_extend' ),
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
                    'content2' => 'content2'
                ),
                $atts
            )
        );

        // Fill $html var with data
        $html = '
        <section class="section__welcome">
            <div class="row">
                <div class="col-sm-6">
                    <div class="wpc-directory-text wpb_content_element">'. $content .'</div>
                </div>
                <div class="col-sm-6">
                    <div class="wpc-directory-text wpb_content_element"><p>'. $content2 .'</p></div>
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
new welcomeSection();
