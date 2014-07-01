<?php get_header(); ?>

		<?php $shortname = "creative"; ?>

		<?php if(get_option($shortname.'_disable_slideshow','') != "Yes") { ?>

		<div id="slideshow_cont">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide-prev.jpg" alt="prev" class="slide_prev" />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide-next.jpg" alt="next" class="slide_next" />

			<?php

			$slider_arr = array();
			$x = 0;
			$args = array(

				 //'category_name' => 'blog',
				 'post_type' => 'post',
				 'meta_key' => 'ex_show_in_slideshow',
				 'meta_value' => 'Yes',
				 'posts_per_page' => 20
				 );

			query_posts($args);

			while (have_posts()) : the_post(); ?>

				<div class="slide_box <?php if($x == 0) { echo 'slide_box_first'; } ?>">

					<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>

						<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>

					<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>

						<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=085e17" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

					<?php } else { ?>

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image'); ?></a>

					<?php } ?>

				</div><!--//slide_box-->

			<?php array_push($slider_arr,get_the_ID()); ?>

			<?php $x++; ?>

			<?php endwhile; ?>

			<?php wp_reset_query(); ?>

		</div><!--//slideshow_cont-->

		<div class="banner_ad"><?php echo adrotate_group(1); ?>
		</div><!-- Home page banner ads -->

		<?php } ?>


		<div id="content">

		<?php

		$category_ID = get_category_id('blog');
		$args = array(
			 'post_type' => 'post',
			 'posts_per_page' => 7,
			 'post__not_in' => $slider_arr,
			 //'cat' => '-' . $category_ID,
			 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
			 );

		query_posts($args);
		$x = 0;

		while (have_posts()) : the_post(); ?>

			<?php if($x < 3 && !is_paged()) { ?>

			<?php } else { ?>

				<div class="home_wide_box">

					<div class="home_wide_box_img">

						<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>

							<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>" frameborder="0" allowfullscreen></iframe>

						<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>

							<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=085e17" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

						<?php } else { ?>

							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-box-wide'); ?></a>

						<?php } ?>

					</div><!--//home_wide_box_img-->

					<div class="home_wide_box_right">

						<div class="left">

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="post_meta">By <?php the_author(); ?> | <?php the_time('F jS, Y'); ?> | <?php the_category(', '); ?> |  <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></p>

							<p><?php echo ds_get_excerpt('305'); ?></p>

						</div><!--//left-->

						<a class="right" href="<?php the_permalink(); ?>">

							<div class="link_cont">

								<p class="link_inside_cont">&gt;</p>

							</div><!--//link_cont-->

						</a>

						<div class="clear"></div>

					</div><!--//home_wide_box_right-->

					<div class="clear"></div>

				</div><!--//home_wide_box-->

			<?php } ?>

			<?php if($x == 2) { echo '<div class="clear"></div>'; } ?>

			<?php $x++; ?>

			<?php endwhile; ?>

		</div><!--//content-->

		<div class="load_more_cont">

			<?php next_posts_link('LOAD MORE'); ?>

		</div><!--//load_more_cont-->

		<?php wp_reset_query(); ?>

		<div class="clear"></div>

<?php get_footer(); ?>