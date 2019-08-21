<?php
// Template Name: Blogs

get_header(); 

while( have_posts() ) { the_post();
?>


<div class="page page-blogs <?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">

	<div class="page-content">
		<?php the_content( '', true ); ?>

		<div class="nav--category">
			<ul class="list-unstyled d-flex justify-content-center">
				<li><a href="<?php echo get_home_url();?>/blogs/" class="active">All</a></li>
				<li><a href="<?php echo get_home_url();?>/category/body/">Treatments</a></li>
				<li><a href="<?php echo get_home_url();?>/category/women/">Women</a></li>
				<li><a href="<?php echo get_home_url();?>/category/men/">Men</a></li>
				<li><a href="<?php echo get_home_url();?>/category/face/">Face</a></li>
				<li><a href="<?php echo get_home_url();?>/category/body/">Body</a></li>
				<li><a href="<?php echo get_home_url();?>/category/hair/">Hair</a></li>
			</ul>
		</div>

		<?php
			$cats = get_the_category();
			$query1 = new WP_Query( array(
				'post_type' => 'post',
				'posts_per_page' => 1,
				'orderby'		=> 'ID',
				'order'			=> 'DESC',
				'cat'			=> 7,
			));
			if($query1->have_posts()): while($query1->have_posts()): $query1->the_post();
		?>
			<div class="container container--secondary">
				<div class="featured__blog box__blog d-flex" id="featured-post-<?php the_ID(); ?>">
					<figure class="post__img">
						<?php if(has_post_thumbnail()) { ?>
							<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" />
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/upload/img-salon-5.jpg" alt="<?php echo get_the_title(); ?>" />
						<?php } ?>
						<?php echo '<a href="'.get_the_permalink().'" class="box--filled"></a>'; ?>
					</figure>
					<div class="content">
						<mark>Featured post</mark>
						<time><?php echo get_the_date('dS F Y'); ?></time>
						<h4><?php echo '<a href="'.get_the_permalink().'">'. get_the_title() .'</a>'; ?></h4>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>



		<div class="recent-blogs">
			<div class="container container--secondary">
				<div class="row list__blogs">
				<?php
					$loop = new WP_Query('showposts=6&orderby=ID&order=DESC');
					if($loop->have_posts()): while($loop->have_posts()): $loop->the_post();
				?>
					<div class="col-md-4 col-sm-6">
						<div class="box__blog" id="recent-post-<?php the_ID(); ?>">
							<figure class="post__img">
								<?php if(has_post_thumbnail()) { ?>
									<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" />
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/upload/img-salon-5.jpg" alt="<?php echo get_the_title(); ?>" />
								<?php } ?>
								<?php echo '<a href="'.get_the_permalink().'" class="box--filled"></a>'; ?>
							</figure>
							<div class="content">
								<time><?php echo get_the_date('dS F Y'); ?></time>
								<h4><?php echo '<a href="'.get_the_permalink().'">'. get_the_title() .'</a>'; ?></h4>
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; else: ?>
					<p>No recent posts yet!</p>
				<?php endif; wp_reset_postdata(); ?>
				</div>

				<div class="btn-block text-center mb-5">
					<a role="button" tabindex="0" class="btn--lutetia">Load more</a>
				</div>

			</div>
		</div>

	</div>

</div>

<?php 
}
get_footer();
