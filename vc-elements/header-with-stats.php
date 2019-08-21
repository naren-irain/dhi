<?php
/*
    Element: Header With Text
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class headerBoxedWithStats {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'header_boxed_with_stats', array( $this, 'renderHTML' ) );

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
            "name" => __("Header With Stats", 'vc_extend'),
            "description" => __("Banner at the top with stats", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "header_boxed_with_stats",
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
                    'heading' => __( 'Title', 'vc_extend' ),
                    'param_name' => 'title',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Description', 'vc_extend' ),
                    'param_name' => 'content',
                    'value' => __( '', 'vc_extend' ),
                    'description' => __( 'To add link highlight text or url and click the chain to apply hyperlink', 'vc_extend' ),
                    // 'admin_label' => false,
                    // 'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 1 - Icon', 'vc_extend' ),
                    'param_name' => 'stat1icon',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 1 - Content', 'vc_extend' ),
                    'param_name' => 'stat1content',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 2 - Icon', 'vc_extend' ),
                    'param_name' => 'stat2icon',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 2 - Content', 'vc_extend' ),
                    'param_name' => 'stat2content',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 3 - Icon', 'vc_extend' ),
                    'param_name' => 'stat3icon',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 3 - Content', 'vc_extend' ),
                    'param_name' => 'stat3content',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 4 - Icon', 'vc_extend' ),
                    'param_name' => 'stat4icon',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Stat 4 - Content', 'vc_extend' ),
                    'param_name' => 'stat4content',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
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
                    'bgimg' => 'bgimg',
                    'stat1icon' => 'stat1icon',
                    'stat1content' => 'stat1content',
                    'stat2icon' => 'stat2icon',
                    'stat2content' => 'stat2content',
                    'stat3icon' => 'stat3icon',
                    'stat3content' => 'stat3content',
                    'stat4icon' => 'stat4icon',
                    'stat4content' => 'stat4content',
                    'title'   => '',
                ),
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $bgimg, "full");
        $stat1icon = wp_get_attachment_image_src( $stat1icon, "full");
        $stat2icon = wp_get_attachment_image_src( $stat2icon, "full");
        $stat3icon = wp_get_attachment_image_src( $stat3icon, "full");
        $stat4icon = wp_get_attachment_image_src( $stat4icon, "full");


        // Fill $html var with data
        $html = '
        <div class="page-header">
            <div class="header-banner">
                <figure><img src="'. $img_url[0] .'" class="wpc-directory-image" /></figure>
            </div>
            <div class="page-header-content box--filled text-center d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h1>' . $title . '</h1>
                    <div class="description">'. $content .'</div>
                </div>
            </div>
            <div class="header-stats-block">
                <div class="header-stats-list d-flex justify-content-center">
                    <div class="header-stats d-inline-flex stats-1">
                        <figure><img src="'. $stat1icon[0] .'" /> </figure>
                        <div>'. $stat1content .'</div>
                    </div>
                    <div class="header-stats d-inline-flex stats-2">
                        <figure><img src="'. $stat2icon[0] .'" /> </figure>
                        <div>'. $stat2content .'</div>
                    </div>
                    <div class="header-stats d-inline-flex stats-3">
                        <figure><img src="'. $stat3icon[0] .'" /> </figure>
                        <div>'. $stat3content .'</div>
                    </div>
                    <div class="header-stats d-inline-flex stats-4">
                        <figure><img src="'. $stat4icon[0] .'" /> </figure>
                        <div>'. $stat4content .'</div>
                    </div>
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
new headerBoxedWithStats();
