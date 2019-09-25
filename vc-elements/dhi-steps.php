<?php
/*
    Element: Dhi Steps
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class DhiSteps {

    public $block_settings_id = 219;
    public $steps_list = array();


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dhi_steps', array( $this, 'renderHTML' ) );

        $this->steps_list = get_field('steps_list', $this->block_settings_id);
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
            "name" => __("Dhi Steps", 'vc_extend'),
            "description" => __("Dhi Steps", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "dhi_steps",
            "class" => "",
            "controls" => "full",
            "icon" => get_template_directory_uri().'/images/admin/icon-code.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Custom Elements', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

                array(
                    'type'        => 'setting_block_id',
                    'param_name'  => 'setting_block_id',
                    'block_id'    => 219,
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
        <section class="dhi__steps">

        <div class="container--mid">

            <div class="dhiSteps__list">';

            $html .= '<div class="dhiSteps__slider">';
            foreach($this->steps_list as $steps_list) {
                $html .= '<div class="slick-slide"><div class="dhiSteps">';
                $html .= '<hgroup class="section-title"><h3>'. $steps_list['step_title'] .'</h3><h4>'. $steps_list['step_link_title'] .'</h4></hgroup>';
                $html .= "<div class='d-flex'><div class='col'><div class='content'>". $steps_list['content'] ."</div></div>";
                $html .= "<div class='col'><figure><img class='box--filled' src='".$steps_list['image']."' /></figure></div></div>";
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
new DhiSteps();
