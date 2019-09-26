<?php
/*
    Element: Testimonials List
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class resultsList {


    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'results_list', array( $this, 'renderHTML' ) );


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
            "name" => __("Results List", 'vc_extend'),
            "description" => __("Results List with categories", 'vc_extend'),
            //"group" => "Custom Elements",
            "base" => "results_list",
            "class" => "",
            "controls" => "full",
            "icon" => get_template_directory_uri().'/images/admin/icon-code.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Custom Elements', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Business in Men Info', 'vc_extend' ),
                    'param_name' => 'result1desc',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Hair Loss in Women Info', 'vc_extend' ),
                    'param_name' => 'result2desc',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Beard Transplant Info', 'vc_extend' ),
                    'param_name' => 'result3desc',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Eyebrow Transplant Info', 'vc_extend' ),
                    'param_name' => 'result4desc',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    //'class' => 'text-class',
                    'heading' => __( 'Other cases Info', 'vc_extend' ),
                    'param_name' => 'result5desc',
                    // 'value' => __( 'Default value', 'vc_extend' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),

                array(
                    'type' => 'textfield',
                    'holder' => 'h1',
                    'class' => 'additional-class',
                    'heading' => __( 'Additional Class', 'vc_extend' ),
                    'param_name' => 'additional_class',
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
                    'additional_class' => '',
                    'result1desc' => '',
                    'result2desc' => '',
                    'result3desc' => '',
                    'result4desc' => '',
                    'result5desc' => '',
                ),
                $atts
            )
        );

        // Fill $html var with data
        $html = '<div class="section__results container container--secondary '. $additional_class .'">

            <nav class="d-flex tab__nav justify-content-center">
                <a tabindex="0" data-type="men" class="tab__link filter__men active">Baldness in Men</a>
                <a tabindex="0" data-type="women" class="tab__link filter__women">Hair Loss in Women</a>
                <a tabindex="0" data-type="beard" class="tab__link filter__beard">Beard Transplant</a>
                <a tabindex="0" data-type="eyebrow" class="tab__link filter__eyebrow">Eyebrow Implants</a>
                <a tabindex="0" data-type="other" class="tab__link filter__other">Other Cases</a>
            </nav>

        <div class="results__content">

        <div class="result__tab tab__men active">

            <nav class="d-flex baldness__nav">
                <a tabindex="0" data-type="all" class="baldness__link filter__all active">All cases</a>
                <a tabindex="0" data-type="norwood-2" class="baldness__link filter__norwood2">Norwood 2</a>
                <a tabindex="0" data-type="norwood-3" class="baldness__link filter__norwood3">Norwood 3</a>
                <a tabindex="0" data-type="norwood-4" class="baldness__link filter__norwood4">Norwood 4</a>
                <a tabindex="0" data-type="norwood-5" class="baldness__link filter__norwood5">Norwood 5</a>
                <a tabindex="0" data-type="norwood-6" class="baldness__link filter__norwood6">Norwood 6</a>
                <a tabindex="0" data-type="norwood-7" class="baldness__link filter__norwood7">Norwood 7</a>
            </nav>

            <div class="content">' . $result1desc . '</div>
            <div class="row list__results">';

                $loop = new WP_Query( array(
                    'post_type' => 'treatment_result',
                    'posts_per_page' => -1,
                    'orderby'		=> 'ID',
                    'order'			=> 'DESC',
                    'cat'			=> 10,
                ));
                if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

                $html .= '<div class="'. join( ' ', get_post_class() ) .'"><div class="box__treatment_result relative">
                            <figure>
                                <img src="'.get_field("front_before_image").'" alt="" />
                                <img src="'.get_field("front_after_image").'" alt="" />
                            </figure>
                            <h4>'. get_the_title() .'</h4>
                            <a href="'.get_the_permalink().'" class="box--filled">'. get_the_title() .'</a>
                        </div>
                    </div>';

                endwhile; endif; wp_reset_postdata();
        $html .= '</div></div>';


        $html .= '<div class="result__tab tab__women">
            <div class="content">' . $result2desc . '</div>
            <div class="row list__results">';

                $loop = new WP_Query( array(
                    'post_type' => 'treatment_result',
                    'posts_per_page' => -1,
                    'orderby'		=> 'ID',
                    'order'			=> 'DESC',
                    'cat'			=> 9,
                ));
                if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

                $html .= '<div class="col-sm-6"><div class="box__treatment_result relative">
                            <figure>
                                <img src="'.get_field("front_before_image").'" alt="" />
                                <img src="'.get_field("front_after_image").'" alt="" />
                            </figure>
                            <h4>'. get_the_title() .'</h4>
                            <a href="'.get_the_permalink().'" class="box--filled">'. get_the_title() .'</a>
                        </div>
                    </div>';

                endwhile; endif; wp_reset_postdata();
        $html .= '</div></div>';


        $html .= '<div class="result__tab tab__beard">
            <div class="content">' . $result3desc . '</div>
            <div class="row list__results">';

                $loop = new WP_Query( array(
                    'post_type' => 'treatment_result',
                    'posts_per_page' => -1,
                    'orderby'		=> 'ID',
                    'order'			=> 'DESC',
                    'cat'			=> 8,
                ));
                if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

                $html .= '<div class="col-sm-6"><div class="box__treatment_result relative">
                            <figure>
                                <img src="'.get_field("front_before_image").'" alt="" />
                                <img src="'.get_field("front_after_image").'" alt="" />
                            </figure>
                            <h4>'. get_the_title() .'</h4>
                            <a href="'.get_the_permalink().'" class="box--filled">'. get_the_title() .'</a>
                        </div>
                    </div>';

                endwhile; endif; wp_reset_postdata();
        $html .= '</div></div>';


        $html .= '<div class="result__tab tab__eyebrow">
            <div class="content">' . $result4desc . '</div>
            <div class="row list__results">';

                $loop = new WP_Query( array(
                    'post_type' => 'treatment_result',
                    'posts_per_page' => -1,
                    'orderby'		=> 'ID',
                    'order'			=> 'DESC',
                    'cat'			=> 7,
                ));
                if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

                $html .= '<div class="col-sm-6"><div class="box__treatment_result relative">
                            <figure>
                                <img src="'.get_field("front_before_image").'" alt="" />
                                <img src="'.get_field("front_after_image").'" alt="" />
                            </figure>
                            <h4>'. get_the_title() .'</h4>
                            <a href="'.get_the_permalink().'" class="box--filled">'. get_the_title() .'</a>
                        </div>
                    </div>';

                endwhile; endif; wp_reset_postdata();
        $html .= '</div></div>';


        $html .= '<div class="result__tab tab__other">
            <div class="content">' . $result4desc . '</div>
            <div class="row list__results">';

                $loop = new WP_Query( array(
                    'post_type' => 'treatment_result',
                    'posts_per_page' => -1,
                    'orderby'		=> 'ID',
                    'order'			=> 'DESC',
                    'cat'			=> 6,
                ));
                if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();

                $html .= '<div class="col-sm-6"><div class="box__treatment_result relative">
                            <figure>
                                <img src="'.get_field("front_before_image").'" alt="" />
                                <img src="'.get_field("front_after_image").'" alt="" />
                            </figure>
                            <h4>'. get_the_title() .'</h4>
                            <a href="'.get_the_permalink().'" class="box--filled">'. get_the_title() .'</a>
                        </div>
                    </div>';

                endwhile; endif; wp_reset_postdata();
        $html .= '</div></div>';


        
            
        $html .= '</div></div>';

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
new resultsList();
