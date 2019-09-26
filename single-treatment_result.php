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
			<h1><?php the_title(); ?></h1>
			<div class="d-flex result--head align-items-center">
				<div class="col">
					<h3><?php the_field('patient_label'); ?></h3>
				</div>
				<div class="col">
					<p><b><?php the_field('patient_details'); ?></b></p>
					<blockquote><?php the_field('patient_testimonial'); ?></blockquote>
				</div>
			</div>
		</div>

		<div class="results-image-grid">
            <div class="d-flex">
                <div class="main-grid">
					<div class="result-before-after result-banners-1 active">
						<div class="title"><?php the_field('front_view_label'); ?></div>
						<div class="before-after-wrapper">
							<img src="<?php the_field('front_before_image'); ?>" alt="" />
							<img src="<?php the_field('front_after_image'); ?>" alt="" />
						</div>
					</div>
					<div class="result-before-after result-banners-2">
						<div class="title"><?php the_field('top_view_label'); ?></div>
						<div class="before-after-wrapper">
							<img src="<?php the_field('top_before_image'); ?>" alt="" />
							<img src="<?php the_field('top_after_image'); ?>" alt="" />
						</div>
					</div>
					<div class="result-before-after result-banners-3">
						<div class="title"><?php the_field('back_view_label'); ?></div>
						<div class="before-after-wrapper">
							<img src="<?php the_field('back_before_image'); ?>" alt="" />
							<img src="<?php the_field('back_after_image'); ?>" alt="" />
						</div>
					</div>
					<div class="result-before-after result-banners-4">
						<div class="title"><?php the_field('side_view_label'); ?></div>
						<div class="before-after-wrapper">
							<img src="<?php the_field('side_before_image'); ?>" alt="" />
							<img src="<?php the_field('side_after_image'); ?>" alt="" />
						</div>
					</div>
                    <input type="hidden" class="active-grid-index" value="1" />
				</div>
				
                <div class="grid-thumbnails">
					<div class="result-thumbnail result-thumbnail-1 active" data-id="1">
						<div class="title"><?php the_field('front_view_label'); ?></div>
						<div class="before-after-thumbnail">
							<img src="<?php the_field('front_before_image'); ?>" alt="" />
							<img src="<?php the_field('front_after_image'); ?>" alt="" />
						</div>
					</div>
					<div class="result-thumbnail result-thumbnail-2" data-id="2">
						<div class="title"><?php the_field('top_view_label'); ?></div>
						<div class="before-after-thumbnail">
							<img src="<?php the_field('top_before_image'); ?>" alt="" />
							<img src="<?php the_field('top_after_image'); ?>" alt="" />
						</div>
					</div>
					<div class="result-thumbnail result-thumbnail-3" data-id="3">
						<div class="title"><?php the_field('back_view_label'); ?></div>
						<div class="before-after-thumbnail">
							<img src="<?php the_field('back_before_image'); ?>" alt="" />
							<img src="<?php the_field('back_after_image'); ?>" alt="" />
						</div>
					</div>
					<div class="result-thumbnail result-thumbnail-4" data-id="4">
						<div class="title"><?php the_field('side_view_label'); ?></div>
						<div class="before-after-thumbnail">
							<img src="<?php the_field('side_before_image'); ?>" alt="" />
							<img src="<?php the_field('side_after_image'); ?>" alt="" />
						</div>
					</div>
					<p><?php the_field('disclaimer_text'); ?></p>
                </div>
            </div>
        </div>


		<div class="clearfix">
			<?php the_content( '', true ); ?>
		</div>

		<div class="container container--post">
			<div class="navigation d-flex justify-content-between">
				<?php
				$prev_post = get_previous_post();
				if($prev_post) {
				$prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
				echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="result-link-previous">Previous post <strong>&quot;'. $prev_title . '&quot;</strong></a>' . "\n";
				}

				$next_post = get_next_post();
				if($next_post) {
				$next_title = strip_tags(str_replace('"', '', $next_post->post_title));
				echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="result-link-next">Next post<strong>&quot;'. $next_title . '&quot;</strong></a>' . "\n";
				}
				?>
			</div>
		</div>


</div>
</div>

</div>

<script>
( function($) {
    $(document).ready(function(){
	
		$('.result-thumbnail').click(function(){
			var gridElem = $(this).parents('.results-image-grid'), index = $(this).data('id');
			gridElem.find('.result-before-after').removeClass( 'active' );
			gridElem.find('.result-banners-' + index).addClass( 'active' );
			gridElem.find('.active-grid-index').val( index );
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
		});

	});
})( jQuery );
</script>

<?php
// End of the loop.
endwhile;
get_footer();
