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

<div class="page--post <?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">

	<div class="page-content" style="padding-top: 120px;">
		<div class="container container--post">

			<h1><?php the_title(); ?></h1>


			<div>
				<?php the_field('patient_label'); ?>
			</div>
			<div>
				<?php the_field('patient_details'); ?>
			</div>
			<div>
				<?php the_field('patient_testimonial'); ?>
			</div>

			<div>
				<?php the_field('top_view_label'); ?>
			</div>
			<div>
				<img src="<?php the_field('top_before_image'); ?>" alt="" />
			</div>
			<div>
				<img src="<?php the_field('top_after_image'); ?>" alt="" />
			</div>


			<div>
				<?php the_field('front_view_label'); ?>
			</div>
			<div>
				<img src="<?php the_field('front_before_image'); ?>" alt="" />
			</div>
			<div>
				<img src="<?php the_field('front_after_image'); ?>" alt="" />
			</div>


			<div>
				<?php the_field('back_view_label'); ?>
			</div>
			<div>
				<img src="<?php the_field('back_before_image'); ?>" alt="" />
			</div>
			<div>
				<img src="<?php the_field('back_after_image'); ?>" alt="" />
			</div>


			<div>
				<?php the_field('side_view_label'); ?>
			</div>
			<div>
				<img src="<?php the_field('side_before_image'); ?>" alt="" />
			</div>
			<div>
				<img src="<?php the_field('side_after_image'); ?>" alt="" />
			</div>



			<div class="post-content">
				<?php the_content( '', true ); ?>
			</div>


		</div>
	</div>

</div>

<?php
// End of the loop.
endwhile;
get_footer();
