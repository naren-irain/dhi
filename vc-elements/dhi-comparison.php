<?php
/*
    Element: Dhi Comparison
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class DhiComparison {

    public $block_settings_id = 217;
    public $comparsion_list = array();


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dhi_comparison', array( $this, 'renderHTML' ) );

        $this->comparsion_list = get_field('comparsion_list', $this->block_settings_id);
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
            "name" => __("Dhi Comparison", 'vc_extend'),
            "description" => __("Dhi Comparison", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "dhi_comparison",
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
                    'type'        => 'setting_block_id',
                    'param_name'  => 'setting_block_id',
                    'block_id'    => 217,
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
                    'title' => ''
                ),
                $atts
            )
        );


        // Fill $html var with data
        $html = '
        <section class="dhi__comparison">

        <div class="container container--secondary">

            <div class="section-title">
                <h3 class="text-center">'. $title .'</h3>
            </div>

            <div class="dhicomparison__list">';

            $html .= '<div class="dhicomparison__slider">';
            foreach($this->comparsion_list as $comparsion_list) {
                $html .= '<div class="slick-slide"><div class="dhicomparison d-flex">';
                $html .= "<div class='col'><div class='box box__dhi'><figure class='box--filled'><img class='box--filled' src='".$comparsion_list['bg_image']."' /></figure><div class='overlay box--filled d-flex justify-content-center align-items-center'><div><h4>". $comparsion_list['dhi_title'] ."</h4><div class='description'>". $comparsion_list['dhi_content'] ."</div></div></div></div></div>";
                $html .= "<div class='col'><div class='box box__others d-flex justify-content-center align-items-center'><div><h4>". $comparsion_list['comp_title'] ."</h4><h5>". $comparsion_list['comp_subtitle'] ."</h5><div class='description'>". $comparsion_list['comp_content'] ."</div></div></div></div>";
                $html .= "</div></div>";
            }

            $html .= '</div></div>
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
new DhiComparison();
