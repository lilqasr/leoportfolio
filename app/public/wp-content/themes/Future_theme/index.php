<?php get_header(); ?>	
				<!-- Main -->
		
				<div id="main">

								
					<!-- Post -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post">
	<header>
		<div class="title">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>		
		</div>
		<div class="meta">
			<time class="published" datetime="('F j, Y')"><?php the_time('F j, Y'); ?></time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt=""></a>
		</div>
	</header>
		<a href="<?php the_permalink() ?>" class="image featured"><img src="<?php echo the_post_thumbnail( array(711,400) ); ?>"></a>
		<p><?php the_excerpt(); ?></p>
		<footer>
			<ul class="actions">
				<li><a href="single.html" class="button large">Continue Reading</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">General</a></li>
				<li><a href="#" class="icon solid fa-heart">28</a></li>
				<li><a href="#" class="icon solid fa-comment">128</a></li>
			</ul>
		</footer>
</article>		
	<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>							
				</div>


<?php get_sidebar('primary'); ?>



				<!-- Scripts -->
				<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/browser.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/breakpoints.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/util.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>