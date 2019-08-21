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

	<div class="page-content">
		<div class="container container--post">

			<time><?php echo get_the_date('dS F Y'); ?></time>
			<h1><?php the_title(); ?></h1>
			<a href="<?php echo get_home_url();?>/blogs/" class="btn--lutetia btn--back"><i></i> <span>Back</span></a>

			<?php if(has_post_thumbnail()) { ?>
				<figure class="post-banner">
					<img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="<?php echo get_the_title(); ?>" />
				</figure>
			<?php } ?>
			
			<div class="post-content">
				<?php the_content( '', true ); ?>
			</div>
			
			<div class="clearfix">
				<?php echo do_shortcode( '[blog_contact_section setting_block_id=""]' ); ?>
			</div>


		</div>
	</div>

</div>

<?php
// End of the loop.
endwhile;
get_footer();
