<?php
/**
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<!--<div id="nav-above" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts'); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>'); ?>
		</div>
	</div>-->
	
<?php endif; ?>

<?php if ( ! have_posts() ) : ?>

	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<div class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</div>
	</div>
	
<?php endif; ?>

<div class="posts">
	<div class="frame">
		<?php while ( have_posts() ) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<div class="info"><?php the_field( 'extra_information' ); ?></div>
				
				<?php 
				$featured_image_id = get_featured_image_id(get_the_ID());
				if(!empty($featured_image_id)){
					$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
					$featured_image_src = get_thumb($featured_image[0], 190, 72, 1);
				?>
				<div class="feature-img">
					<a href="<?php the_permalink();?>">
						<img src="<?php echo $featured_image_src; ?>" alt="<?php the_title();?>" width="190" height="72" />
					</a>
				</div>
				<?php }?>
				
			<?php if ( is_archive() || is_search() ) : ?>
			
				<div class="entry-summary">
					<?php 
					$cont = get_the_excerpt(); 
					if (!$cont) $cont = short_content(get_the_content()); 					
					echo substr($cont, 0, 200);
					?>
				</div> 
				
			<?php else : ?>
			
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>
				</div>
				
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>" class="btn-more cf">MORE</a>

		</div>
		
		<?php comments_template( '', true ); ?>
		<?php endwhile; ?></div>
</div>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div id="nav-below" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( '<span class="meta-nav">&lt;&lt;</span> Older posts' ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( 'Newer posts <span class="meta-nav">&gt;&gt;</span>' ); ?>
		</div>
	</div>
	
<?php endif; ?>
