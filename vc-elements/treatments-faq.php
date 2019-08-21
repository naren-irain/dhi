<?php
/*
    Element: Treatments Faq
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class treatmentsFaq {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'treatments_faq', array( $this, 'renderHTML' ) );

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
            "name" => __("Treatments Faq", 'vc_extend'),
            "description" => __("Treatments Faq", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "treatments_faq",
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
                    'holder' => 'h4',
                    //'class' => 'text-class',
                    'heading' => __( 'Faq 1 - Question', 'vc_extend' ),
                    'param_name' => 'faq1question',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Faq 1 - Answer', 'vc_extend' ),
                    'param_name' => 'faq1answer',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                
                array(
                    'type' => 'textfield',
                    'holder' => 'h4',
                    //'class' => 'text-class',
                    'heading' => __( 'Faq 2 - Question', 'vc_extend' ),
                    'param_name' => 'faq2question',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Faq 2 - Answer', 'vc_extend' ),
                    'param_name' => 'faq2answer',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                
                array(
                    'type' => 'textfield',
                    'holder' => 'h4',
                    //'class' => 'text-class',
                    'heading' => __( 'Faq 3 - Question', 'vc_extend' ),
                    'param_name' => 'faq3question',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Faq 3 - Answer', 'vc_extend' ),
                    'param_name' => 'faq3answer',
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
                    'faq1question' => '',
                    'faq1answer' => '',
                    'faq2question' => '',
                    'faq2answer' => '',
                    'faq3question' => '',
                    'faq3answer' => '',
                ),
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $bgimg, "full");


        // Fill $html var with data
        $html = '
        <div class="treatments-faq">
            <div class="faq-flex d-flex align-items-center">
                <div class="faq-block"><div>
                    <h4><mark>' . $title . '</mark></h4>
                    <div class="faq-list">
                        <div class="faq-item active">
                            <h5><span>' . $faq1question . '</span><i><small>+</small></i></h5>
                            <div class="faq-content">' . $faq1answer . '</div>
                        </div>
        ';
                    if($faq2question != '') {
                        $html .= ' <div class="faq-item">
                            <h5><span>' . $faq2question . '</span><i><small>+</small></i></h5>
                            <div class="faq-content" style="display: none;">' . $faq2answer . '</div>
                        </div>';
                    }
                    if($faq3question != '') {
                        $html .= ' <div class="faq-item">
                            <h5><span>' . $faq3question . '</span><i><small>+</small></i></h5>
                            <div class="faq-content" style="display: none;">' . $faq3answer . '</div>
                        </div>
                    </div>';
                    }

        $html .= '
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
new treatmentsFaq();
