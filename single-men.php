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

<div class="page page__treatment type__men <?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">

	<div class="page-content">
			<?php the_content( '', true ); ?>

	</div>

</div>

<?php
// End of the loop.
endwhile;
get_footer();
