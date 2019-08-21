<?php
// Template Name: Plain

get_header(); 

while( have_posts() ) { the_post();
?>


<div class="page page-empty-header <?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">

	<div class="page-header">
		<h1><?php the_title(); ?></h1>
	</div>

	<div class="page-content">
		<?php the_content( '', true ); ?>
	</div>

</div>

<?php 
}
get_footer();
