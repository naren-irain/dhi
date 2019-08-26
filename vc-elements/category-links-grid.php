<?php
/*
    Element: Category Links Grid
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class categoryLinksGrid {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'category_links_grid', array( $this, 'renderHTML' ) );

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
            "name" => __("Category Links Grid", 'vc_extend'),
            "description" => __("Face, Body and Hair Links", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "category_links_grid",
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
                    'heading' => __( 'Main Title', 'vc_extend' ),
                    'param_name' => 'title',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Category 1 Image', 'vc_extend' ),
                    'param_name' => 'bgimg1',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Category 1 Title', 'vc_extend' ),
                    'param_name' => 'title1',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => 'title-class',
                    'heading' => __( 'Category 1 content', 'vc_extend' ),
                    'param_name' => 'content1',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'a',
                    'class' => 'title-class',
                    'heading' => __( 'Category 1 Link', 'vc_extend' ),
                    'param_name' => 'link1',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Category 2 Image', 'vc_extend' ),
                    'param_name' => 'bgimg2',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Category 2 Title', 'vc_extend' ),
                    'param_name' => 'title2',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => 'title-class',
                    'heading' => __( 'Category 2 content', 'vc_extend' ),
                    'param_name' => 'content2',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'a',
                    'class' => 'title-class',
                    'heading' => __( 'Category 2 Link', 'vc_extend' ),
                    'param_name' => 'link2',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Category 3 Image', 'vc_extend' ),
                    'param_name' => 'bgimg3',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Category 3 Title', 'vc_extend' ),
                    'param_name' => 'title3',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => 'title-class',
                    'heading' => __( 'Category 3 content', 'vc_extend' ),
                    'param_name' => 'content3',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'a',
                    'class' => 'title-class',
                    'heading' => __( 'Category 3 Link', 'vc_extend' ),
                    'param_name' => 'link3',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'attach_image',
                    'holder' => 'img',
                    //'class' => 'text-class',
                    'heading' => __( 'Category 4 Image', 'vc_extend' ),
                    'param_name' => 'bgimg4',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'title-class',
                    'heading' => __( 'Category 4 Title', 'vc_extend' ),
                    'param_name' => 'title4',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => 'title-class',
                    'heading' => __( 'Category 4 content', 'vc_extend' ),
                    'param_name' => 'content4',
                    'value' => __( '', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'a',
                    'class' => 'title-class',
                    'heading' => __( 'Category 4 Link', 'vc_extend' ),
                    'param_name' => 'link4',
                    'value' => __( '', 'vc_extend' ),
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
                    'title'   => '',
                    'bgimg1' => '',
                    'title1'   => '',
                    'content1'   => '',
                    'link1'   => '',
                    'bgimg2' => '',
                    'title2'   => '',
                    'content2'   => '',
                    'link2'   => '',
                    'bgimg3' => '',
                    'title3'   => '',
                    'content3'   => '',
                    'link3'   => '',
                    'bgimg4' => '',
                    'title4'   => '',
                    'content4'   => '',
                    'link4'   => '',
                ),
                $atts
            )
        );

        $img_url1 = wp_get_attachment_image_src( $bgimg1, "full");
        $img_url2 = wp_get_attachment_image_src( $bgimg2, "full");
        $img_url3 = wp_get_attachment_image_src( $bgimg3, "full");
        $img_url4 = wp_get_attachment_image_src( $bgimg4, "full");

        // Fill $html var with data
        $html = '
        <div class="category-links-grid">
            <div class="section-title text-center">
                <h3>' . $title . '</h3>
            </div>
            <div class="d-flex">
                <div class="category-grid-box">
                    <figure><img src="'. $img_url1[0] .'" class="box--filled" /></figure>
                    <div class="overlay d-flex justify-content-center align-items-end box--filled"><div><h4>' . $title1 . '</h4><p>' . $content1 . '</p></div></div>
                    <a href="' . $link1 . '" class="box--filled">' . $title1 . '</a>
                </div>
                <div class="category-grid-box">
                    <figure><img src="'. $img_url2[0] .'" class="box--filled" /></figure>
                    <div class="overlay d-flex justify-content-center align-items-end box--filled"><div><h4>' . $title2 . '</h4><p>' . $content2 . '</p></div></div>
                    <a href="' . $link2 . '" class="box--filled">' . $title2 . '</a>
                </div>
                <div class="category-grid-box">
                    <figure><img src="'. $img_url3[0] .'" class="box--filled" /></figure>
                    <div class="overlay d-flex justify-content-center align-items-end box--filled"><div><h4>' . $title3 . '</h4><p>' . $content3 . '</p></div></div>
                    <a href="' . $link3 . '" class="box--filled">' . $title3 . '</a>
                </div>
                <div class="category-grid-box">
                    <figure><img src="'. $img_url4[0] .'" class="box--filled" /></figure>
                    <div class="overlay d-flex justify-content-center align-items-end box--filled"><div><h4>' . $title4 . '</h4><p>' . $content4 . '</p></div></div>
                    <a href="' . $link4 . '" class="box--filled">' . $title4 . '</a>
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
new categoryLinksGrid();
