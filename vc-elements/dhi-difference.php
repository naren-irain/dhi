<?php
/*
    Element: Dhi Difference
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class DhiDifference {

    public $block_settings_id = 218;
    public $difference_list = array();


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dhi_difference', array( $this, 'renderHTML' ) );

        $this->difference_list = get_field('difference_list', $this->block_settings_id);
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
            "name" => __("Dhi Difference", 'vc_extend'),
            "description" => __("Dhi Difference", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "dhi_difference",
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
                    'block_id'    => 218,
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
        <section class="dhi__differences">

        <div class="container container--secondary">

            <div class="section-title">
                <h3 class="text-center">'. $title .'</h3>
            </div>

            <div class="dhiDifference__list">';

            $html .= '<div class="row">';
            foreach($this->difference_list as $difference_list) {
                $html .= '<div class="col-sm-6"><div class="dhiDifference">';
                $html .= "<figure><img class='box--filled' src='".$difference_list['image']."' /></figure><div class='box'><h4>". $difference_list['title'] ."</h4><div class='description'>". $difference_list['content'] ."</div></div>";
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
new DhiDifference();
