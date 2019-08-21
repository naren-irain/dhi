<?php
/*
    Element: Treatments Indication
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class indicationsList {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'indications_list', array( $this, 'renderHTML' ) );

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
            "name" => __("indications List", 'vc_extend'),
            "description" => __("Indications List", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "indications_list",
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
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 1', 'vc_extend' ),
                    'param_name' => 'indication1',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 2', 'vc_extend' ),
                    'param_name' => 'indication2',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 3', 'vc_extend' ),
                    'param_name' => 'indication3',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 4', 'vc_extend' ),
                    'param_name' => 'indication4',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 5', 'vc_extend' ),
                    'param_name' => 'indication5',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 6', 'vc_extend' ),
                    'param_name' => 'indication6',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 7', 'vc_extend' ),
                    'param_name' => 'indication7',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'li',
                    //'class' => 'text-class',
                    'heading' => __( 'Indiaction Point 8', 'vc_extend' ),
                    'param_name' => 'indication8',
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
                    'title'   => '',
                    'indication1' => '',
                    'indication2' => '',
                    'indication3' => '',
                    'indication4' => '',
                    'indication5' => '',
                    'indication6' => '',
                    'indication7' => '',
                    'indication8' => ''
                ),
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $bgimg, "full");


        // Fill $html var with data
        $html = '
        <div class="treatments-faq section-indiactions">
            <div class="faq-flex d-flex align-items-center">
                <div class="faq-block"><div>
                    <h4><mark>' . $title . '</mark></h4>
                    <ul class="indiactions-list">
                        <li><span>' . $indication1 . '</span></li>
        ';
                    if($indication2 != '') {
                        $html .= ' <li><span>' . $indication2 . '</span></li>';
                    }
                    if($indication3 != '') {
                        $html .= ' <li><span>' . $indication3 . '</span></li>';
                    }
                    if($indication4 != '') {
                        $html .= ' <li><span>' . $indication4 . '</span></li>';
                    }
                    if($indication5 != '') {
                        $html .= ' <li><span>' . $indication5 . '</span></li>';
                    }
                    if($indication6 != '') {
                        $html .= ' <li><span>' . $indication6 . '</span></li>';
                    }
                    if($indication7 != '') {
                        $html .= ' <li><span>' . $indication7 . '</span></li>';
                    }
                    if($indication8 != '') {
                        $html .= ' <li><span>' . $indication8 . '</span></li>';
                    }

        $html .= '
                </ul>
                </div>
            </div>
                <div class="image-box">
                    <figure><img src="'. $img_url[0] .'" /></figure>
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
new indicationsList();
