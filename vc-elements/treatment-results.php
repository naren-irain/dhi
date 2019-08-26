<?php
/*
    Element: Treatment Results
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class treatmentResults {

    public $block_settings_id = 174;
    public $results = array();


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'treatment_results', array( $this, 'renderHTML' ) );

        $this->results = array();
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
            "name" => __("Treatment Results", 'vc_extend'),
            "description" => __("Treatment Results", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "treatment_results",
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
                    'heading' => __( 'Title (optional)', 'vc_extend' ),
                    'param_name' => 'title',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),


                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Disclaimer', 'vc_extend' ),
                    'param_name' => 'disclaimer',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type'        => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'Result type', 'vc_extend' ),
                    'param_name'  => 'resulttype',
                    'admin_label' => false,
                    /*'value'       => array(
                        'men' => 'men',
                        'women' => 'women',
                        'beard' => 'beard',
                        'eyebrow' => 'eyebrow'
                    ),
                    //'std'           => 'men', // Your default value*/
                    'description' => __( 'Ex. men, women, beard, eyebrow', 'vc_extend' ),
                    'weight'        => 0,
                    'group'         => 'Listing'
                ),

                array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Description', 'vc_extend' ),
                    'param_name' => 'content',
                    'value' => __( '', 'vc_extend' ),
                    'description' => __( 'Enter this option other than treatment pages', 'vc_extend' ),
                    // 'admin_label' => false,
                    // 'weight' => 0,
                    'group' => 'Listing',
                ),
                
                array(
                    'type'        => 'textfield',
                    'holder' => 'a',
                    'heading' => __( 'View Treatment Link', 'vc_extend' ),
                    'param_name'  => 'treatment_link',
                    'admin_label' => false,
                    /*'value'       => array(
                        'men' => 'men',
                        'women' => 'women',
                        'beard' => 'beard',
                        'eyebrow' => 'eyebrow'
                    ),
                    //'std'           => 'men', // Your default value*/
                    'description' => __( 'Enter this option other than treatment pages', 'vc_extend' ),
                    'weight'        => 0,
                    'group'         => 'Listing'
                ),
                
                array(
                    'type'        => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'Additional Class', 'vc_extend' ),
                    'param_name'  => 'additional_class',
                    'admin_label' => false,
                    /*'value'       => array(
                        'men' => 'men',
                        'women' => 'women',
                        'beard' => 'beard',
                        'eyebrow' => 'eyebrow'
                    ),
                    //'std'           => 'men', // Your default value*/
                    'description' => __( 'Enter this option other than treatment pages', 'vc_extend' ),
                    'weight'        => 0,
                    'group'         => 'Listing'
                ),

                array(
                    'type'        => 'setting_block_id',
                    'param_name'  => 'setting_block_id',
                    'block_id'    => 174,
                    'group'       => 'Listing',
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
                    'resulttype' => '',
                    'treatment_link' => '',
                    'additional_class' => '',
                    'disclaimer' => "Disclaimer: Lutétia's non-invasive, tailor-made aesthetic treatments and cutting-edge innovation redefine beauty by keeping it 'au naturel."
                ),
                $atts
            )
        );


        $fieldStr = 'results_'.$resulttype.''; // + $resulttype

        $this->results = get_field($fieldStr, $this->block_settings_id);

        // Fill $html var with data
        $html = '
        <section class="treatment__results '.$additional_class.'">

        <div class="results__wrapper container">

            <div class="section-title">
                <h3 class="text-center">'. $title .'</h3>';

                if($content != '') {
                    $html .= '<div class="description">'. $content .'</div>';
                }

        $html .= '
            </div>

            <div class="results__slider">';

            foreach($this->results as $result) {
                $html .= '<div class="slick-slide"><div class="before-after-wrapper">';
                $html .= "<img src='".$result['before_image']."' /> <img src='".$result['after_image']."' />";
                $html .= "</div></div>";
            }

        $html .= '
            </div>
            <div class="disclaimer-text text-center">'. $disclaimer .'</div>';

            if($treatment_link != '') {
                $html .= '<div class="text-center btn-block"><a href="'. $treatment_link .'" class="btn--lutetia">VIEW TREATMENT</a></div>';
            }
        
        $html .= '    </div>

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
new treatmentResults();
