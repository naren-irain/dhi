<?php
/*
    Element: Seven Images Grid
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class sevenImagesGrid {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'seven_images_grid', array( $this, 'renderHTML' ) );

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
            "name" => __("Seven Images Grid", 'vc_extend'),
            "description" => __("Banner at the top", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "seven_images_grid",
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
                    'heading' => __( 'Grid Image 1', 'vc_extend' ),
                    'param_name' => 'grid_image_1',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 2', 'vc_extend' ),
                    'param_name' => 'grid_image_2',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 3', 'vc_extend' ),
                    'param_name' => 'grid_image_3',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 4', 'vc_extend' ),
                    'param_name' => 'grid_image_4',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 5', 'vc_extend' ),
                    'param_name' => 'grid_image_5',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 6', 'vc_extend' ),
                    'param_name' => 'grid_image_6',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Grid Image 7', 'vc_extend' ),
                    'param_name' => 'grid_image_7',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
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
                    'grid_image_1' => 'grid_image_1',
                    'grid_image_2' => 'grid_image_2',
                    'grid_image_3' => 'grid_image_3',
                    'grid_image_4' => 'grid_image_4',
                    'grid_image_5' => 'grid_image_5',
                    'grid_image_6' => 'grid_image_6',
                    'grid_image_7' => 'grid_image_7'
                ),
                $atts
            )
        );

        $img1_url = wp_get_attachment_image_src( $grid_image_1, "full");
        $img2_url = wp_get_attachment_image_src( $grid_image_2, "full");
        $img3_url = wp_get_attachment_image_src( $grid_image_3, "full");
        $img4_url = wp_get_attachment_image_src( $grid_image_4, "full");
        $img5_url = wp_get_attachment_image_src( $grid_image_5, "full");
        $img6_url = wp_get_attachment_image_src( $grid_image_6, "full");
        $img7_url = wp_get_attachment_image_src( $grid_image_7, "full");

        // Fill $html var with data
        $html = '
        <div class="seven-image-grid">
            <div class="d-flex">
                <div class="main-grid">
                    <figure>
                        <img src="'. $img1_url[0] .'" class="main-grid-image box--filled main-grid-image-1 active" />
                        <img src="'. $img2_url[0] .'" class="main-grid-image box--filled main-grid-image-2" />
                        <img src="'. $img3_url[0] .'" class="main-grid-image box--filled main-grid-image-3" />
                        <img src="'. $img4_url[0] .'" class="main-grid-image box--filled main-grid-image-4" />
                        <img src="'. $img5_url[0] .'" class="main-grid-image box--filled main-grid-image-5" />
                        <img src="'. $img6_url[0] .'" class="main-grid-image box--filled main-grid-image-6" />
                        <img src="'. $img7_url[0] .'" class="main-grid-image box--filled main-grid-image-7" />
                    </figure>
                    <nav>
                        <a tabindex="0" class="grid-nav grid-nav-prev">prev</a>
                        <a tabindex="0" class="grid-nav grid-nav-next">next</a>
                    </nav>
                    <input type="hidden" class="active-grid-index" value="1" />
                </div>
                <div class="grid-thumbnails">
                    <figure class="grid-thumb grid-thumb-1"><img src="'. $img1_url[0] .'" class="grid-thumb-image" /></figure>
                    <figure class="grid-thumb grid-thumb-2"><img src="'. $img2_url[0] .'" class="grid-thumb-image" /></figure>
                    <figure class="grid-thumb grid-thumb-3"><img src="'. $img3_url[0] .'" class="grid-thumb-image" /></figure>
                    <figure class="grid-thumb grid-thumb-4"><img src="'. $img4_url[0] .'" class="grid-thumb-image" /></figure>
                    <figure class="grid-thumb grid-thumb-5"><img src="'. $img5_url[0] .'" class="grid-thumb-image" /></figure>
                    <figure class="grid-thumb grid-thumb-6"><img src="'. $img6_url[0] .'" class="grid-thumb-image" /></figure>
                    <figure class="grid-thumb grid-thumb-7"><img src="'. $img7_url[0] .'" class="grid-thumb-image" /></figure>
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
new sevenImagesGrid();
