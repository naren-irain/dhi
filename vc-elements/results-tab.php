<?php
/*
    Element: ResultsTab
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class resultsTab {

    public $block_settings_id = 174;
    public $results_men = array();
    public $results_women = array();
    public $results_beard = array();
    public $results_eyebrow = array();


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'results_tab', array( $this, 'renderHTML' ) );

        $this->results_men = get_field('results_men', $this->block_settings_id);
        $this->results_women = get_field('results_women', $this->block_settings_id);
        $this->results_beard = get_field('results_beard', $this->block_settings_id);
        $this->results_eyebrow = get_field('results_eyebrow', $this->block_settings_id);
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
            "name" => __("Results Tab", 'vc_extend'),
            "description" => __("Results Tab", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "results_tab",
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
                    'disclaimer' => ''
                ),
                $atts
            )
        );


        // Fill $html var with data
        $html = '
        <section class="treatment__results">

        <div class="results__wrapper container">

            <div class="section-title">
                <h3 class="text-center">'. $title .'</h3>

                <nav class="d-flex tab__nav justify-content-center">
                    <a tabindex="0" data-type="men" class="tab__link filter__men active">Baldness in Men</a>
                    <a tabindex="0" data-type="women" class="tab__link filter__women">Hair Loss in Women</a>
                    <a tabindex="0" data-type="beard" class="tab__link filter__beard">Beard Transplant</a>
                    <a tabindex="0" data-type="eyebrow" class="tab__link filter__eyebrow">Eyebrow Implants</a>
                </nav>
            </div>

            <div class="tab__content">';

            $html .= '<div class="tab__item tab__men active"><div class="results__slider">';
            foreach($this->results_men as $results_men) {
                $html .= '<div class="slick-slide"><div class="before-after-wrapper">';
                $html .= "<img src='".$results_men['before_image']."' /> <img src='".$results_men['after_image']."' />";
                $html .= "</div></div>";
            }
            $html .= '</div><div class="disclaimer-text text-center">'. $disclaimer .'</div></div>';

            $html .= '<div class="tab__item tab__women"><div class="results__slider">';
            foreach($this->results_women as $results_women) {
                $html .= '<div class="slick-slide"><div class="before-after-wrapper">';
                $html .= "<img src='".$results_women['before_image']."' /> <img src='".$results_women['after_image']."' />";
                $html .= "</div></div>";
            }
            $html .= '</div><div class="disclaimer-text text-center">'. $disclaimer .'</div></div>';

            $html .= '<div class="tab__item tab__beard"><div class="results__slider">';
            foreach($this->results_beard as $results_beard) {
                $html .= '<div class="slick-slide"><div class="before-after-wrapper">';
                $html .= "<img src='".$results_beard['before_image']."' /> <img src='".$results_beard['after_image']."' />";
                $html .= "</div></div>";
            }
            $html .= '</div><div class="disclaimer-text text-center">'. $disclaimer .'</div></div>';

            $html .= '<div class="tab__item tab__eyebrow"><div class="results__slider">';
            foreach($this->results_eyebrow as $results_eyebrow) {
                $html .= '<div class="slick-slide"><div class="before-after-wrapper">';
                $html .= "<img src='".$results_eyebrow['before_image']."' /> <img src='".$results_eyebrow['after_image']."' />";
                $html .= "</div></div>";
            }
            $html .= '</div><div class="disclaimer-text text-center">'. $disclaimer .'</div></div>';

        
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
new resultsTab();
