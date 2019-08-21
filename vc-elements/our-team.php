<?php
/*
    Element: Our Team
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class ourTeam {

    public $block_settings_id = 585;
    public $members = array();


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'our_team', array( $this, 'renderHTML' ) );

        $this->members = get_field("member", $this->block_settings_id);
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
            "name" => __("Our Team", 'vc_extend'),
            "description" => __("Our Team", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "our_team",
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
                    'block_id'    => 585,
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
        <section class="our__team">
            <div class="nav--category nav--team">
                <ul class="list-unstyled d-flex justify-content-center">
                    <li><a tabindex="0" data-type="doctors" class="active">Doctors</a></li>
                    <li><a tabindex="0" data-type="practitioners">Practitioners</a></li>
                    <li><a tabindex="0" data-type="operations">Operations</a></li>
                    <li><a tabindex="0" data-type="hair">Hair Experts</a></li>
                    <li><a tabindex="0" data-type="stylists">Stylists</a></li>
                </ul>
            </div>

            <div class="container">
            <div class="row team__list">';
                            
              foreach($this->members as $member) {
                  $html .= '<div class="col-sm-6 col__team col__team-'.$member['category'].'"><div class="team section__content-boxed"><div class="d-flex">';
                    $html .= "<div class='image-box'><figure><img src='".$member['profile_image']."' /></figure></div>";
                    $html .= "<div class='border-box'><h4>".$member['name']."</h4>";
                    $html .= "<h5>".$member['job_title']."</h5>";
                    $html .= "<div class='wpc-directory-text'>".$member['job_description']."</div>";
                $html .= "</div></div></div></div>";
              }

        $html .= '
            </div>
            <div class="empty__team text-center" style="display: none;">No list available</div>
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
new ourTeam();
