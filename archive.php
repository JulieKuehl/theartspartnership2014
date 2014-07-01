<?php get_header(); ?>

	<!--ads_309x180-->

<!-- 	<div class="home_box">
		<img src="http://placehold.it/309x180">
	</div>

	<div class="home_box">
		<img src="http://placehold.it/309x180">
	</div>

	<div class="home_box home_box_last">
		<img src="http://placehold.it/309x180">
	</div>

	<div class="clear"></div> -->

	<!--//ads_309x180-->


	<div id="content">

		<?php if(is_category()) { ?>

		<!--archive_title-->

		<div class="archive_title">

			<?php printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>

		</div>

		<!--//archive_title-->

		<?php } ?>



		<?php

		global $wp_query;

			$args = array_merge( $wp_query->query, array( 'posts_per_page' => 7 ) );

			query_posts( $args );

		while (have_posts()) : the_post(); ?>

			<!--home_wide_box-->
			<div class="home_wide_box">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<!--home_wide_box_img-->
				<div class="home_wide_box_img">

					<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>

						<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>

					<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>

						<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=085e17" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

					<?php } else { ?>

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-box-wide'); ?></a>

					<?php } ?>

				</div>
				<!--//home_wide_box_img-->

				<!--home_wide_box_right-->
				<div class="home_wide_box_right">

					<div class="left">

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<p class="post_meta">By <?php the_author(); ?> | <?php the_time('F jS, Y'); ?> | <?php the_category(', '); ?> |  <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></p>

						<p><?php echo ds_get_excerpt('328'); ?></p>

					</div>

					<a class="right" href="<?php the_permalink(); ?>">

						<div class="link_cont">

							<p class="link_inside_cont">&gt;</p>

						</div>

					</a>

					<div class="clear"></div>

				</div>
				<!--//home_wide_box_right-->

				<div class="clear"></div>

			</div>
			</div>
			<!--//home_wide_box-->

		<?php endwhile; ?>


		</div>
		<!--//content-->


		<!--load_more_cont-->
		<div class="load_more_cont">

			<?php next_posts_link('LOAD MORE'); ?>

		</div>
		<!--//load_more_cont-->


		<div class="clear"></div>


<?php get_footer(); ?>