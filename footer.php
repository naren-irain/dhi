<?php
/**
 * Footer
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

if ( visualcomposerstarter_is_the_footer_displayed() ) : ?>
<?php visualcomposerstarter_hook_before_footer(); ?>
<footer class="footer--main" id="footer">

	<div class="container-fluid footer-conatiner">

		<figure class="text-center">
			<a href="<?php echo esc_url( '/' ); ?>" class="footer--logo">
				<img class=" footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-dhi-gurgaon.jpg" alt="" />
			</a>
		</figure>

		<div class="d-flex footer__flex">
		
			<div class="col__dubai"> 
				<h5>Treatment Areas</h5>
				<nav>
					<ul>
						<li><a href="">Baldness in Men</a></li>
						<li><a href="">Hair Loss in Women</a></li>
						<li><a href="">Beard Transplant</a></li>
						<li><a href="">Eyebrow Implant</a></li>
					</ul>
				</nav>
			</div>

			<div class="col__dubai"> 
				<h5>Useful Links</h5>
				<nav>
					<ul>
						<li><a href="">About DHI</a></li>
						<li><a href="">Results</a></li>
						<li><a href="">Testimonials</a></li>
						<li><a href="">Contact</a></li>
						<li><a href="">Maison Lutetia</a></li>
					</ul>
				</nav>
			</div>

			<div class="col__dubai"> 
				<h5>DUBAI</h5>
				<p class="contact">
					Festival City Mall<br/>
					Dubai<br/>
					UAE<br/>
					<a class="tel" href="tel:+97 1 47 06 40 00">+97 1 47 06 40 00</a><br/>
					<a class="mail" href="mailto:hello@maisonlutetia.com">hello@maisonlutetia.com</a>
				</p>
			</div>
		</div>

	</div>


	<div class="footer__bar">
  	<div class="footer--follow">
    	<ul class="list-unstyled nav--social">
      	<li>
					<a target="_blank" href="https://www.instagram.com/lutetia_dubai/"> 
						<img class="social-icon" src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" title="instagram" />
					</a>
				</li>
      	<li>
					<a target="_blank" href="https://www.facebook.com/lutetiadubai/"> 
						<img class="social-icon" src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" title="facebook" />
					</a>
				</li>
      	<li>
					<a target="_blank" href="https://www.twitter.com/lutetiadubai/"> 
						<img class="social-icon" src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" title="twitter" />
					</a>
				</li>
    	</ul>
  	</div>
	</div>

</footer>
<?php /* do_action( 'visualcomposerstarter_after_footer_copyright' ); */ ?>
<?php visualcomposerstarter_hook_after_footer(); ?>
<?php endif; ?>

<?php wp_footer(); ?>
</div>
</div>
</body>
</html>
