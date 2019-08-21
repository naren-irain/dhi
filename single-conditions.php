<?php
/**
 * Single
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

get_header();
// Start the loop.
while ( have_posts() ) :
	the_post();
?>

<div class="page page__treatment <?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">

	<div class="page-content">
			<?php the_content( '', true ); ?>

			<section class="related__treatments">
					<h3 class="text-center">Related Conditions</h3>

					<div class="related__list">
						<div class="row">

							<div class="col-sm-6 col-md-4">
								<div class="related__treatment">
									<figure>
										<img src="<?php echo get_template_directory_uri(); ?>/images/upload/related-1.jpg" alt="" />
										<div class="overlay box--filled">
											<h4>Soft Lift</h4>
											<p>Acne scars are the result of inflamed blemishes caused by skin pores clogged with excess oil, dead skin cells, and bacteria.</p>
										</div>
										<a href="" class="box--filled"></a>
									</figure>
									<div class="content">
										<h4><a href="">Soft Lift</a></h4>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4">
								<div class="related__treatment">
									<figure>
										<img src="<?php echo get_template_directory_uri(); ?>/images/upload/related-2.jpg" alt="" />
										<div class="overlay box--filled">
											<h4>Acne Scars</h4>
											<p>Acne scars are the result of inflamed blemishes caused by skin pores clogged with excess oil, dead skin cells, and bacteria.</p>
										</div>
										<a href="" class="box--filled"></a>
									</figure>
									<div class="content">
										<h4><a href="">Acne Scars</a></h4>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4">
								<div class="related__treatment">
									<figure>
										<img src="<?php echo get_template_directory_uri(); ?>/images/upload/related-3.jpg" alt="" />
										<div class="overlay box--filled">
											<h4>Meso LED</h4>
											<p>Acne scars are the result of inflamed blemishes caused by skin pores clogged with excess oil, dead skin cells, and bacteria.</p>
										</div>
										<a href="" class="box--filled"></a>
									</figure>
									<div class="content">
										<h4><a href="">Meso LED</a></h4>
									</div>
								</div>
							</div>

						</div>
					</div>
			</section>

	</div>

</div>

<?php
// End of the loop.
endwhile;
get_footer();
