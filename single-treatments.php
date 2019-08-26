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
					<h3 class="text-center">Related Treatments</h3>

					<div class="related__list">
						<div class="row">

							<?php
								$args = array(
									'post_type' => 'treatments',
									'post__not_in'   => array( get_the_ID() ),
									'posts_per_page' => 3,
									'orderby' => 'rand'
								);

								$query1 = new WP_Query( $args );

								if($query1->have_posts()): while($query1->have_posts()): $query1->the_post();
							?>
							

							<div class="col-sm-6 col-md-4">
								<div class="related__treatment">
									<figure>
										<?php if(has_post_thumbnail()) { ?>
											<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="box--filled" />
										<?php } else { ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/upload/img-salon-5.jpg" alt="<?php echo get_the_title(); ?>" class="box--filled" />
										<?php } ?>
										<div class="overlay box--filled">
											<h4><?php echo get_the_title(); ?></h4>
											<p><?php excerpt(12); ?></p>
										</div>
										<?php echo '<a href="'.get_the_permalink().'" class="box--filled">Go</a>'; ?>
									</figure>
									<div class="content">
										<h4><?php echo '<a href="'.get_the_permalink().'">'. get_the_title() .'</a>'; ?></h4>
									</div>
								</div>
							</div>


							<?php endwhile; endif; wp_reset_postdata(); ?>

						</div>
					</div>
			</section>

	</div>

</div>

<?php
// End of the loop.
endwhile;
get_footer();
