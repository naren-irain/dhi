<?php
/**
 * Header
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

?>
	<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<?php visualcomposerstarter_hook_after_head(); ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php wp_head() ?>
		<script>
				var _config	=	{
						theme_url	: "<?php echo get_template_directory_uri(); ?>",
						site_url	: "<?php echo get_home_url();?>"
				};
		</script>
	</head>
<body <?php body_class(); ?>>
<?php if ( visualcomposerstarter_is_the_header_displayed() ) : ?>
	<?php visualcomposerstarter_hook_before_header(); ?>

	<header class="header--main" id="header">
		
			<div class="header__bar">
				<div class="container d-flex">
					<div class="col col__contact">
						<a href="tel:+97147064000" class="link__tel">+97147064000</a>
						<a href="mailto:hello@dhi.com" class="link__mail">hello@dhi.com</a>
					</div>
					<div class="col col__lang text-right">
						<ul>
							<li><a href="#" target="_blank">Maison Lutétia</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="header__menu">
				<div class="container">

					<div class="d-flex header__flex align-items-center">
						<div class="col__logo">
							<a href="<?php echo esc_url( '/' ); ?>" class="logo__main">
								<img class=" footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-dhi-gurgaon.jpg" alt="Lutetia" />
							</a>
						</div>
			
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<div id="main-menu">
					<div class="button-close"><span class="vct-icon-close"></span></div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav navbar-nav',
						'container'      => '',
					) );
					?>
					<?php if ( is_active_sidebar( 'menu' ) ) : ?>
						<div class="header-widgetised-area">
							<?php dynamic_sidebar( 'menu' ); ?>
						</div>
					<?php endif; ?>
					<?php do_action( 'visualcomposerstarter_after_header_widget_area' ); ?>
				</div><!--#main-menu-->
				<?php endif; ?>

				<?php /* if ( has_custom_logo() ) : the_custom_logo(); */ ?>
			</div><!--#d-flex-->
			</div><!--#main-menu-->
		</div> <!-- .header__menu -->

		<?php do_action( 'visualcomposerstarter_after_header_menu' ); ?>
		<?php /* if ( is_singular() && apply_filters( 'visualcomposerstarter_single_image', true ) ) : ?>
			<div class="header-image">
				<?php visualcomposerstarter_header_featured_content(); ?>
			</div>
		<?php endif; */ ?>
	</header>
	<?php visualcomposerstarter_hook_after_header(); ?>
<div id="parallax__scene" class="site--lutetia">
<div class="parallax--elem parallax--bg" id="parallax__bg" data-start="transform: translateY(0%);" data-end="transform: translateY(-25%);"></div>
<div class="site--main">

<?php endif;

