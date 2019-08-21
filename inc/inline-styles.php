<?php

/**
 * Inline styles.
 */
function visualcomposerstarter_inline_styles() {
	wp_register_style( 'visualcomposerstarter-custom-style', get_template_directory_uri() . '/css/customizer-custom.css', array(), false );
	wp_enqueue_style( 'visualcomposerstarter-custom-style' );
	$css = '';

	// Fonts and style.
	$css .= '
	/*Body fonts and style*/
	body,
	#main-menu ul li ul li,
	.comment-content cite,
	.entry-content cite,
	#add_payment_method .cart-collaterals .cart_totals table small,
	.woocommerce-cart .cart-collaterals .cart_totals table small,
	.woocommerce-checkout .cart-collaterals .cart_totals table small,
	.visualcomposerstarter.woocommerce-cart .woocommerce .cart-collaterals .cart_totals .cart-subtotal td,
	.visualcomposerstarter.woocommerce-cart .woocommerce .cart-collaterals .cart_totals .cart-subtotal th,
	.visualcomposerstarter.woocommerce-cart .woocommerce table.cart,
	.visualcomposerstarter.woocommerce .woocommerce-ordering,
	.visualcomposerstarter.woocommerce .woocommerce-result-count,
	.visualcomposerstarter legend,
	.visualcomposerstarter.woocommerce-account .woocommerce-MyAccount-content a.button
	 { font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_font_family', 'Roboto' ) ) . '; }
	 body,
	 .sidebar-widget-area a:hover, .sidebar-widget-area a:focus,
	 .sidebar-widget-area .widget_recent_entries ul li:hover, .sidebar-widget-area .widget_archive ul li:hover, .sidebar-widget-area .widget_categories ul li:hover, .sidebar-widget-area .widget_meta ul li:hover, .sidebar-widget-area .widget_recent_entries ul li:focus, .sidebar-widget-area .widget_archive ul li:focus, .sidebar-widget-area .widget_categories ul li:focus, .sidebar-widget-area .widget_meta ul li:focus, .visualcomposerstarter.woocommerce-cart .woocommerce table.cart .product-name a { color: ' . get_theme_mod( 'vct_fonts_and_style_body_primary_color', '#555555' ) . '; }
	  .comment-content table,
	  .entry-content table { border-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_primary_color', '#555555' ) ) . '; }
	  .entry-full-content .entry-author-data .author-biography,
	  .entry-full-content .entry-meta,
	  .nav-links.post-navigation a .meta-nav,
	  .search-results-header h4,
	  .entry-preview .entry-meta li,
	  .entry-preview .entry-meta li a,
	  .entry-content .gallery-caption,
	  .comment-content blockquote,
	  .entry-content blockquote,
	  .wp-caption .wp-caption-text,
	  .comments-area .comment-list .comment-metadata a { color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_secondary_text_color', '#777777' ) ) . '; }
	  .comments-area .comment-list .comment-metadata a:hover,
	  .comments-area .comment-list .comment-metadata a:focus { border-bottom-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_secondary_text_color', '#777777' ) ) . '; }
	  a,
	  .comments-area .comment-list .reply a,
	  .comments-area span.required,
	  .comments-area .comment-subscription-form label:before,
	  .entry-preview .entry-meta li a:hover:before,
	  .entry-preview .entry-meta li a:focus:before,
	  .entry-preview .entry-meta li.entry-meta-category:hover:before,
	  .entry-content p a:hover,
	  .entry-content ol a:hover,
	  .entry-content ul a:hover,
	  .entry-content table a:hover,
	  .entry-content datalist a:hover,
	  .entry-content blockquote a:hover,
	  .entry-content dl a:hover,
	  .entry-content address a:hover,
	  .entry-content p a:focus,
	  .entry-content ol a:focus,
	  .entry-content ul a:focus,
	  .entry-content table a:focus,
	  .entry-content datalist a:focus,
	  .entry-content blockquote a:focus,
	  .entry-content dl a:focus,
	  .entry-content address a:focus,
	  .entry-content ul > li:before,
	  .comment-content p a:hover,
	  .comment-content ol a:hover,
	  .comment-content ul a:hover,
	  .comment-content table a:hover,
	  .comment-content datalist a:hover,
	  .comment-content blockquote a:hover,
	  .comment-content dl a:hover,
	  .comment-content address a:hover,
	  .comment-content p a:focus,
	  .comment-content ol a:focus,
	  .comment-content ul a:focus,
	  .comment-content table a:focus,
	  .comment-content datalist a:focus,
	  .comment-content blockquote a:focus,
	  .comment-content dl a:focus,
	  .comment-content address a:focus,
	  .comment-content ul > li:before,
	  .sidebar-widget-area .widget_recent_entries ul li,
	  .sidebar-widget-area .widget_archive ul li,
	  .sidebar-widget-area .widget_categories ul li,
	  .sidebar-widget-area .widget_meta ul li { color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_active_color', '#557cbf' ) ) . '; }     
	  .comments-area .comment-list .reply a:hover,
	  .comments-area .comment-list .reply a:focus,
	  .comment-content p a,
	  .comment-content ol a,
	  .comment-content ul a,
	  .comment-content table a,
	  .comment-content datalist a,
	  .comment-content blockquote a,
	  .comment-content dl a,
	  .comment-content address a,
	  .entry-content p a,
	  .entry-content ol a,
	  .entry-content ul a,
	  .entry-content table a,
	  .entry-content datalist a,
	  .entry-content blockquote a,
	  .entry-content dl a,
	  .entry-content address a { border-bottom-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_active_color', '#557cbf' ) ) . '; }    
	  .entry-content blockquote, .comment-content { border-left-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_active_color', '#557cbf' ) ) . '; }
	  
	  html, #main-menu ul li ul li { font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_font_size', '16px' ) ) . ' }
	  body, #footer, .footer-widget-area .widget-title { line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_line_height', '1.7' ) ) . '; }
	  body {
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_letter_spacing', '0.01rem' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_font_style', 'normal' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_capitalization', 'none' ) ) . ';
	  }
	  
	  .comment-content address,
	  .comment-content blockquote,
	  .comment-content datalist,
	  .comment-content dl,
	  .comment-content ol,
	  .comment-content p,
	  .comment-content table,
	  .comment-content ul,
	  .entry-content address,
	  .entry-content blockquote,
	  .entry-content datalist,
	  .entry-content dl,
	  .entry-content ol,
	  .entry-content p,
	  .entry-content table,
	  .entry-content ul {
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_body_margin_bottom', '1.5rem' ) ) . ';
	  }
	  
	  /*Buttons font and style*/
	  .comments-area .form-submit input[type=submit],
	  .blue-button { 
			background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_color', '#557cbf' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_color', '#f4f4f4' ) ) . ';
			font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_family', 'Playfair Display' ) ) . ';
			font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_size', '16px' ) ) . ';
			font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_weight', '400' ) ) . ';
			font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_style', 'normal' ) ) . ';
			letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_letter_spacing', '0.01rem' ) ) . ';
			line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_line_height', '1' ) ) . ';
			text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_capitalization', 'none' ) ) . ';
			margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_margin_top', '0' ) ) . ';
			margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_margin_bottom', '0' ) ) . ';
	  }
	  .visualcomposerstarter .products .added_to_cart {
			font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_family', 'Playfair Display' ) ) . ';
	  }
	  .comments-area .form-submit input[type=submit]:hover, .comments-area .form-submit input[type=submit]:focus,
	  .blue-button:hover, .blue-button:focus, 
	  .entry-content p a.blue-button:hover { 
			background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_hover_color', '#3c63a6' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_hover_color', '#f4f4f4' ) ) . '; 
	  }
	  
	  .nav-links.archive-navigation .page-numbers,
	  .visualcomposerstarter.woocommerce nav.woocommerce-pagination ul li .page-numbers {
	        background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_color', '#557cbf' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_color', '#f4f4f4' ) ) . ';
	  }
	  
	  .nav-links.archive-navigation a.page-numbers:hover, 
	  .nav-links.archive-navigation a.page-numbers:focus, 
	  .nav-links.archive-navigation .page-numbers.current,
	  .visualcomposerstarter.woocommerce nav.woocommerce-pagination ul li .page-numbers:hover, 
	  .visualcomposerstarter.woocommerce nav.woocommerce-pagination ul li .page-numbers:focus, 
	  .visualcomposerstarter.woocommerce nav.woocommerce-pagination ul li .page-numbers.current {
	        background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_hover_color', '#3c63a6' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_hover_color', '#f4f4f4' ) ) . '; 
	  }
	  .visualcomposerstarter.woocommerce button.button,
	  .visualcomposerstarter.woocommerce a.button.product_type_simple,
	  .visualcomposerstarter.woocommerce a.button.product_type_grouped,
	  .visualcomposerstarter.woocommerce a.button.product_type_variable,
	  .visualcomposerstarter.woocommerce a.button.product_type_external,
	  .visualcomposerstarter .woocommerce .buttons a.button.wc-forward,
	  .visualcomposerstarter .woocommerce #place_order,
	  .visualcomposerstarter .woocommerce .button.checkout-button,
	  .visualcomposerstarter .woocommerce .button.wc-backward,
	  .visualcomposerstarter .woocommerce .track_order .button,
	  .visualcomposerstarter .woocommerce .vct-thank-you-footer a,
	  .visualcomposerstarter .woocommerce .woocommerce-EditAccountForm .button,
	  .visualcomposerstarter .woocommerce .woocommerce-MyAccount-content a.edit,
	  .visualcomposerstarter .woocommerce .woocommerce-mini-cart__buttons.buttons a,
	  .visualcomposerstarter .woocommerce .woocommerce-orders-table__cell .button,
	  .visualcomposerstarter .woocommerce a.button,
	  .visualcomposerstarter .woocommerce button.button,
	  .visualcomposerstarter #review_form #respond .form-submit .submit
	   {
	  		background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_color', '#557cbf' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_color', '#f4f4f4' ) ) . ';
			font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_family', 'Playfair Display' ) ) . ';
			font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_size', '16px' ) ) . ';
			font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_weight', '400' ) ) . ';
			font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_font_style', 'normal' ) ) . ';
			letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_letter_spacing', '0.01rem' ) ) . ';
			line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_line_height', '1' ) ) . ';
			text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_capitalization', 'none' ) ) . ';
			margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_margin_top', '0' ) ) . ';
			margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_margin_bottom', '0' ) ) . ';
	  }
	  .visualcomposerstarter.woocommerce button.button.alt.disabled {
            background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_color', '#557cbf' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_color', '#f4f4f4' ) ) . ';
	  }
	  .visualcomposerstarter.woocommerce a.button:hover,
	  .visualcomposerstarter.woocommerce a.button:focus,
	  .visualcomposerstarter.woocommerce button.button:hover,
	  .visualcomposerstarter.woocommerce button.button:focus,
	  .visualcomposerstarter .woocommerce #place_order:hover,
	  .visualcomposerstarter .woocommerce .button.checkout-button:hover,
	  .visualcomposerstarter .woocommerce .button.wc-backward:hover,
	  .visualcomposerstarter .woocommerce .track_order .button:hover,
	  .visualcomposerstarter .woocommerce .vct-thank-you-footer a:hover,
	  .visualcomposerstarter .woocommerce .woocommerce-EditAccountForm .button:hover,
	  .visualcomposerstarter .woocommerce .woocommerce-MyAccount-content a.edit:hover,
	  .visualcomposerstarter .woocommerce .woocommerce-mini-cart__buttons.buttons a:hover,
	  .visualcomposerstarter .woocommerce .woocommerce-orders-table__cell .button:hover,
	  .visualcomposerstarter .woocommerce a.button:hover,
	  .visualcomposerstarter #review_form #respond .form-submit .submit:hover
	  .visualcomposerstarter .woocommerce #place_order:focus,
	  .visualcomposerstarter .woocommerce .button.checkout-button:focus,
	  .visualcomposerstarter .woocommerce .button.wc-backward:focus,
	  .visualcomposerstarter .woocommerce .track_order .button:focus,
	  .visualcomposerstarter .woocommerce .vct-thank-you-footer a:focus,
	  .visualcomposerstarter .woocommerce .woocommerce-EditAccountForm .button:focus,
	  .visualcomposerstarter .woocommerce .woocommerce-MyAccount-content a.edit:focus,
	  .visualcomposerstarter .woocommerce .woocommerce-mini-cart__buttons.buttons a:focus,
	  .visualcomposerstarter .woocommerce .woocommerce-orders-table__cell .button:focus,
	  .visualcomposerstarter .woocommerce a.button:focus,
	  .visualcomposerstarter #review_form #respond .form-submit .submit:focus { 
			background-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_background_hover_color', '#3c63a6' ) ) . '; 
			color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_buttons_text_hover_color', '#f4f4f4' ) ) . '; 
	  }
	';

	// Headers font and style.
	$css .= '
	/*Headers fonts and style*/
	.header-widgetised-area .widget_text,
	 #main-menu > ul > li > a, 
	 .entry-full-content .entry-author-data .author-name, 
	 .nav-links.post-navigation a .post-title, 
	 .comments-area .comment-list .comment-author,
	 .comments-area .comment-list .reply a,
	 .comments-area .comment-form-comment label,
	 .comments-area .comment-form-author label,
	 .comments-area .comment-form-email label,
	 .comments-area .comment-form-url label,
	 .comment-content blockquote,
	 .entry-content blockquote { font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_font_family', 'Playfair Display' ) ) . '; }
	.entry-full-content .entry-author-data .author-name,
	.entry-full-content .entry-meta a,
	.nav-links.post-navigation a .post-title,
	.comments-area .comment-list .comment-author,
	.comments-area .comment-list .comment-author a,
	.search-results-header h4 strong,
	.entry-preview .entry-meta li a:hover,
	.entry-preview .entry-meta li a:focus { color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_text_color', '#333333' ) ) . '; }
	
	.entry-full-content .entry-meta a,
	.comments-area .comment-list .comment-author a:hover,
	.comments-area .comment-list .comment-author a:focus,
	.nav-links.post-navigation a .post-title { border-bottom-color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_text_color', '#333333' ) ) . '; }

	 
	 h1 {
		color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_text_color', '#333333' ) ) . ';
		font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_font_family', 'Playfair Display' ) ) . ';
		font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_font_size', '42px' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_font_style', 'normal' ) ) . ';
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_letter_spacing', '0.01rem' ) ) . ';
		line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_line_height', '1.1' ) ) . ';
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_margin_bottom', '2.125rem' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_capitalization', 'none' ) ) . ';  
	 }
	 h1 a {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_active_color', '#557cbf' ) ) . ';}
	 h1 a:hover, h1 a:focus {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h1_active_color', '#557cbf' ) ) . ';}
	 h2 {
		color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_text_color', '#333333' ) ) . ';
		font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_font_family', 'Playfair Display' ) ) . ';
		font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_font_size', '36px' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_font_style', 'normal' ) ) . ';
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_letter_spacing', '0.01rem' ) ) . ';
		line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_line_height', '1.1' ) ) . ';
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_margin_bottom', '0.625rem' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_capitalization', 'none' ) ) . ';  
	 }
	 h2 a {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_active_color', '#557cbf' ) ) . ';}
	 h2 a:hover, h2 a:focus {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h2_active_color', '#557cbf' ) ) . ';}
	 h3 {
		color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_text_color', '#333333' ) ) . ';
		font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_font_family', 'Playfair Display' ) ) . ';
		font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_font_size', '30px' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_font_style', 'normal' ) ) . ';
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_letter_spacing', '0.01rem' ) ) . ';
		line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_line_height', '1.1' ) ) . ';
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_margin_bottom', '0.625rem' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_capitalization', 'none' ) ) . ';  
	 }
	 h3 a {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_active_color', '#557cbf' ) ) . ';}
	 h3 a:hover, h3 a:focus {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h3_active_color', '#557cbf' ) ) . ';}
	 h4 {
		color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_text_color', '#333333' ) ) . ';
		font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_font_family', 'Playfair Display' ) ) . ';
		font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_font_size', '22px' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_font_style', 'normal' ) ) . ';
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_letter_spacing', '0.01rem' ) ) . ';
		line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_line_height', '1.1' ) ) . ';
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_margin_bottom', '0.625rem' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_capitalization', 'none' ) ) . ';  
	 }
	 h4 a {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_active_color', '#557cbf' ) ) . ';}
	 h4 a:hover, h4 a:focus {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h4_active_color', '#557cbf' ) ) . ';}
	 h5 {
		color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_text_color', '#333333' ) ) . ';
		font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_font_family', 'Playfair Display' ) ) . ';
		font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_font_size', '22px' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_font_style', 'normal' ) ) . ';
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_letter_spacing', '0.01rem' ) ) . ';
		line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_line_height', '1.1' ) ) . ';
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_margin_bottom', '0.625rem' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_capitalization', 'none' ) ) . ';  
	 }
	 h5 a {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_active_color', '#557cbf' ) ) . ';}
	 h5 a:hover, h5 a:focus {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h5_active_color', '#557cbf' ) ) . ';}
	 h6 {
		color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_text_color', '#333333' ) ) . ';
		font-family: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_font_family', 'Playfair Display' ) ) . ';
		font-size: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_font_size', '16px' ) ) . ';
		font-weight: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_weight', '400' ) ) . ';
		font-style: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_font_style', 'normal' ) ) . ';
		letter-spacing: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_letter_spacing', '0.01rem' ) ) . ';
		line-height: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_line_height', '1.1' ) ) . ';
		margin-top: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_margin_top', '0' ) ) . ';
		margin-bottom: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_margin_bottom', '0.625rem' ) ) . ';
		text-transform: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_capitalization', 'none' ) ) . ';  
	 }
	 h6 a {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_active_color', '#557cbf' ) ) . ';}
	 h6 a:hover, h6 a:focus {color: ' . esc_html( get_theme_mod( 'vct_fonts_and_style_h6_active_color', '#557cbf' ) ) . ';}
	';

	$header_and_menu_area_background = get_theme_mod( 'vct_header_background', '#ffffff' );
	if ( true === get_theme_mod( 'vct_header_reserve_space_for_header', true ) || '#ffffff' !== $header_and_menu_area_background ) {
		$css .= '
		/*Header and menu area background color*/
		#header .navbar .navbar-wrapper,
		body.navbar-no-background #header .navbar.fixed.scroll,
		body.header-full-width-boxed #header .navbar,
		body.header-full-width #header .navbar {
			background-color: ' . esc_html( $header_and_menu_area_background ) . ';
		}
		
		@media only screen and (min-width: 768px) {
			body:not(.menu-sandwich) #main-menu ul li ul { background-color: ' . esc_html( $header_and_menu_area_background ) . '; }
		}
		body.navbar-no-background #header .navbar {background-color: transparent;}
		';
	}

	$header_and_menu_area_text_color = get_theme_mod( 'vct_header_text_color', '#555555' );
	if ( '#555555' !== $header_and_menu_area_text_color ) {
		$css .= '
		/*Header and menu area text color*/
		#header { color: ' . esc_html( $header_and_menu_area_text_color ) . ' }
		
		@media only screen and (min-width: 768px) {
			body:not(.menu-sandwich) #main-menu ul li,
			body:not(.menu-sandwich) #main-menu ul li a,
			body:not(.menu-sandwich) #main-menu ul li ul li a { color:  ' . esc_html( $header_and_menu_area_text_color ) . ' }
		}
		';
	}

	$header_and_menu_area_text_active_color = get_theme_mod( 'vct_header_text_active_color', '#333333' );
	if ( '#333333' !== $header_and_menu_area_text_active_color ) {
		$css .= '
		/*Header and menu area active text color*/
		#header a:hover {
			color: ' . esc_html( $header_and_menu_area_text_active_color ) . ';
			border-bottom-color: ' . esc_html( $header_and_menu_area_text_active_color ) . ';
		}
		
		@media only screen and (min-width: 768px) {
			body:not(.menu-sandwich) #main-menu ul li a:hover,
			body:not(.menu-sandwich) #main-menu ul li.current-menu-item > a,
			body:not(.menu-sandwich) #main-menu ul li ul li a:focus, body:not(.menu-sandwich) #main-menu ul li ul li a:hover,
			body:not(.menu-sandwich) .sandwich-color-light #main-menu>ul>li.current_page_item>a,
			body:not(.menu-sandwich) .sandwich-color-light #main-menu>ul ul li.current_page_item>a {
				color: ' . esc_html( $header_and_menu_area_text_active_color ) . ';
				border-bottom-color: ' . esc_html( $header_and_menu_area_text_active_color ) . ';
			}
		}
		';
	}

	$header_padding = get_theme_mod( 'vct_header_padding', '25px' );
	if ( '25px' !== $header_padding ) {
		$css .= '
		/* Header padding */

		.navbar-wrapper { padding: ' . esc_html( $header_padding ) . ' 15px; }
		';
	}

	$header_sandwich_icon_color = get_theme_mod( 'vct_header_sandwich_icon_color', '#ffffff' );
	if ( '#ffffff' !== $header_sandwich_icon_color ) {
		$css .= '
			.navbar-toggle .icon-bar {background-color: ' . esc_html( $header_sandwich_icon_color ) . ';}
		';
	}

	$header_and_menu_area_menu_hover_background = get_theme_mod( 'vct_header_menu_hover_background', '#eeeeee' );
	if ( '#eeeeee' !== $header_and_menu_area_menu_hover_background ) {
		$css .= '
		/*Header and menu area menu hover background color*/
		@media only screen and (min-width: 768px) { body:not(.menu-sandwich) #main-menu ul li ul li:hover > a { background-color: ' . esc_html( $header_and_menu_area_menu_hover_background ) . '; } }
		';
	}

	// Featured image custom height.
	$vct_featured_image_custom_height = get_theme_mod( 'vct_overall_site_featured_image_custom_height', '400px' );
	if ( is_numeric( $vct_featured_image_custom_height ) ) {
		$vct_featured_image_custom_height .= 'px';
	}
	if ( get_theme_mod( 'vct_overall_site_featured_image_height', 'auto' ) === 'custom' ) {
		$css .= '
		/*Featured image custom height*/
		.header-image .fade-in-img { height: ' . esc_html( $vct_featured_image_custom_height ) . '; }
		';

	}

	$content_area_background = get_theme_mod( 'vct_overall_site_content_background', '#ffffff' );
	if ( '#ffffff' !== $content_area_background ) {
		$css .= '
		/*Content area background*/
		.content-wrapper { background-color: ' . esc_html( $content_area_background ) . '; }
		';
	}

	$content_area_comments_background = get_theme_mod( 'vct_overall_site_comments_background', '#f4f4f4' );
	if ( '#f4f4f4' !== $content_area_comments_background ) {
		$css .= '
		/*Comments background*/
		.comments-area { background-color: ' . esc_html( $content_area_comments_background ) . '; }
		';
	}

	$footer_area_background = get_theme_mod( 'vct_footer_area_background', '#333333' );
	if ( '#333333' !== $footer_area_background ) {
		// Work out if hash given.
		$hex = str_replace( '#', '', $footer_area_background );

		// HEX TO RGB.
		$rgb = array( hexdec( substr( $hex,0,2 ) ), hexdec( substr( $hex,2,2 ) ), hexdec( substr( $hex,4,2 ) ) );
		// CALCULATE.
		for ( $i = 0; $i < 3; $i++ ) {
			$rgb[ $i ] = round( $rgb[ $i ] * 1.1 );

			// In case rounding up causes us to go to 256.
			if ( $rgb[ $i ] > 255 ) {
				$rgb[ $i ] = 255;
			}
		}
		// RBG to Hex.
		$hex = '';
		for ( $i = 0; $i < 3; $i++ ) {
			// Convert the decimal digit to hex.
			$hex_digit = dechex( $rgb[ $i ] );
			// Add a leading zero if necessary.
			if ( strlen( $hex_digit ) === 1 ) {
				$hex_digit = '0' . $hex_digit;
			}
			// Append to the hex string.
			$hex .= $hex_digit;
		}
		$footer_widget_area_background = '#' . $hex;
		$css .= '
		/*Footer area background color*/
		#footer { background-color: ' . esc_html( $footer_area_background ) . '; }
		.footer-widget-area { background-color: ' . esc_html( $footer_widget_area_background ) . '; }
		';
	}

	$footer_area_text_color = get_theme_mod( 'vct_footer_area_text_color', '#777777' );
	if ( '#777777' !== $footer_area_text_color ) {
		$css .= '
		/*Footer area text color*/
		#footer,
		#footer .footer-socials ul li a span {color: ' . esc_html( $footer_area_text_color ) . '; }
		';
	}

	$footer_area_text_active_color = get_theme_mod( 'vct_footer_area_text_active_color', '#ffffff' );
	if ( '#ffffff' !== $footer_area_text_active_color ) {
		$css .= '
		/*Footer area text active color*/
		#footer a,
		#footer .footer-socials ul li a:hover span { color: ' . esc_html( $footer_area_text_active_color ) . '; }
		#footer a:hover { border-bottom-color: ' . esc_html( $footer_area_text_active_color ) . '; }
		';
	}
	$on_sale_color = get_theme_mod( 'woo_on_sale_color', '#FAC917' );
	if ( '#FAC917' !== $on_sale_color ) {
		$css .= '
		/*Woocommerce*/
		.vct-sale svg>g>g {fill: ' . esc_html( $on_sale_color ) . ';}
		';
	}

	$price_tag_color = get_theme_mod( 'woo_price_tag_color', '#2b4b80' );
	$css .= '
	.visualcomposerstarter.woocommerce ul.products li.product .price,
	.visualcomposerstarter.woocommerce div.product p.price,
	.visualcomposerstarter.woocommerce div.product p.price ins,
	.visualcomposerstarter.woocommerce div.product span.price,
	.visualcomposerstarter.woocommerce div.product span.price ins,
	.visualcomposerstarter.woocommerce.widget .quantity,
	.visualcomposerstarter.woocommerce.widget del,
	.visualcomposerstarter.woocommerce.widget ins,
	.visualcomposerstarter.woocommerce.widget span.woocommerce-Price-amount.amount,
	.visualcomposerstarter.woocommerce p.price ins,
	.visualcomposerstarter.woocommerce p.price,
	.visualcomposerstarter.woocommerce span.price,
	.visualcomposerstarter.woocommerce span.price ins,
	.visualcomposerstarter .woocommerce.widget span.amount,
	.visualcomposerstarter .woocommerce.widget ins {
		color: ' . esc_html( $price_tag_color ) . '
	}
	';

	$old_price_tag_color = get_theme_mod( 'woo_old_price_tag_color', '#d5d5d5' );
	$css .= '
	.visualcomposerstarter.woocommerce span.price del,
	.visualcomposerstarter.woocommerce p.price del,
	.visualcomposerstarter.woocommerce p.price del span,
	.visualcomposerstarter.woocommerce span.price del span,
	.visualcomposerstarter .woocommerce.widget del,
	.visualcomposerstarter .woocommerce.widget del span.amount,
	.visualcomposerstarter.woocommerce ul.products li.product .price del {
		color: ' . esc_html( $old_price_tag_color ) . '
	}
	';

	$cart_color = get_theme_mod( 'woo_cart_color', '#2b4b80' );
	$cart_text_color = get_theme_mod( 'woo_cart_text_color', '#fff' );
	$css .= '
	.visualcomposerstarter .vct-cart-items-count {
	    background: ' . esc_html( $cart_color ) . ';
	    color: ' . esc_html( $cart_text_color ) . ';
	}
	.visualcomposerstarter .vct-cart-wrapper svg g>g {
	    fill: ' . esc_html( $cart_color ) . ';
	}
	';

	$link_color = get_theme_mod( 'woo_link_color', '#d5d5d5' );
	$css .= '
	.visualcomposerstarter.woocommerce div.product .entry-categories a,
	.visualcomposerstarter.woocommerce div.product .woocommerce-tabs ul.tabs li a
	{
		color: ' . esc_html( $link_color ) . ';
	}
	';

	$link_hover_color = get_theme_mod( 'woo_link_hover_color', '#2b4b80' );
	$css .= '
	.visualcomposerstarter.woocommerce div.product .entry-categories a:hover,
	.visualcomposerstarter.woocommerce-cart .woocommerce table.cart .product-name a:hover,
	.visualcomposerstarter.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
	.visualcomposerstarter.woocommerce div.product .entry-categories a:focus,
	.visualcomposerstarter.woocommerce-cart .woocommerce table.cart .product-name a:focus,
	.visualcomposerstarter.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
	{
		color: ' . esc_html( $link_hover_color ) . ';
	}
	';

	$link_active_color = get_theme_mod( 'woo_link_active_color', '#2b4b80' );
	$css .= '
	.visualcomposerstarter.woocommerce div.product .woocommerce-tabs ul.tabs li.active a
	{
		color: ' . esc_html( $link_active_color ) . ';
	}
	.visualcomposerstarter.woocommerce div.product .woocommerce-tabs ul.tabs li.active a:before
	{
		background: ' . esc_html( $link_active_color ) . ';
	}
	';

	$outline_button_color = get_theme_mod( 'woo_outline_button_color', '#4e4e4e' );
	$css .= '
	.woocommerce button.button[name="update_cart"],
    .button[name="apply_coupon"],
    .vct-checkout-button,
    .woocommerce button.button:disabled, 
    .woocommerce button.button:disabled[disabled]
	{
		color: ' . esc_html( $outline_button_color ) . ';
	}';

	$price_filter_widget_color = get_theme_mod( 'woo_price_filter_widget_color', '#2b4b80' );
	$css .= '
	.visualcomposerstarter .woocommerce.widget.widget_price_filter .ui-slider .ui-slider-handle,
	.visualcomposerstarter .woocommerce.widget.widget_price_filter .ui-slider .ui-slider-range
	{
		background-color: ' . esc_html( $price_filter_widget_color ) . ';
	}';

	$widget_links_color = get_theme_mod( 'woo_widget_links_color', '#000' );
	$css .= '
	.visualcomposerstarter .woocommerce.widget li a
	{
		color: ' . esc_html( $widget_links_color ) . ';
	}';

	$widget_links_hover_color = get_theme_mod( 'woo_widget_links_hover_color', '#2b4b80' );
	$css .= '
	.visualcomposerstarter .woocommerce.widget li a:hover,
	.visualcomposerstarter .woocommerce.widget li a:focus
	{
		color: ' . esc_html( $widget_links_hover_color ) . ';
	}';

	$delete_icon_color = get_theme_mod( 'woo_delete_icon_color', '#d5d5d5' );
	$css .= '
	.visualcomposerstarter.woocommerce-cart .woocommerce table.cart a.remove:before,
	.visualcomposerstarter .woocommerce.widget .cart_list li a.remove:before,
	.visualcomposerstarter.woocommerce-cart .woocommerce table.cart a.remove:after,
	.visualcomposerstarter .woocommerce.widget .cart_list li a.remove:after
	{
		background-color: ' . esc_html( $delete_icon_color ) . ';
	}';

	wp_add_inline_style( 'visualcomposerstarter-custom-style', $css );
}
add_action( 'wp_enqueue_scripts', 'visualcomposerstarter_inline_styles' );

?>
