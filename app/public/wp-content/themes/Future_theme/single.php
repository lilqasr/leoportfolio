<!-- Wrapper -->


<?php get_header(); ?>	

				<!-- Main -->
					<div id="main">

						<!-- Post -->


							<article class="post">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
								<header>
									<div class="title">
										<h2><?php the_title(); ?></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="('F j, Y')"><?php the_time('F j, Y'); ?></time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<span class="image featured"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></span>
								<div class="entry">
									<?php the_content(); ?>
								</div>
								<footer>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon solid fa-heart">28</a></li>
										<li><a href="#" class="icon solid fa-comment">128</a></li>
									</ul>
								</footer>
								<?php endwhile; else : ?>
	         <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
							</article>

					</div>

<?php get_sidebar('second'); ?>	