<?php
/*
    Element: Treatment Reviews
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class treatmentReviews {

    public $block_settings_id = 647;
    public $reviews = array();
    public $bgImg = '';


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'treatment_reviews', array( $this, 'renderHTML' ) );

        $this->reviews = get_field("reviews", $this->block_settings_id);
        $this->bgImg = get_field("bg_image", $this->block_settings_id);
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
            "name" => __("Treatment Reviews", 'vc_extend'),
            "description" => __("Treatment Reviews", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "treatment_reviews",
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
                    'block_id'    => 647,
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
                ),
                $atts
            )
        );

        // Fill $html var with data
        $html = '
        <section class="section__welcome contact__withbg treatment__reviews" style="background-image: url('.$this->bgImg.');">

            <div class="reviews__slider">';

            foreach($this->reviews as $review) {
                $html .= '<div class="slick-slide">';
                $html .= "<div class='box__content'><h3>".$review['title']."</h3>";
                $html .= "<div class='description'>".$review['description']."</div>";
                $html .= "</div></div>";
            }

        $html .= '
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
new treatmentReviews();
