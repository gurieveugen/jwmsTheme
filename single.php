<?php
/**
 *
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>
<?php get_header(); ?>
<?php //get_sidebar(); ?>
			<div id="content" role="main" >

<?php if ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="info"><?php the_field( 'extra_information' ); ?></div>
					
		

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"> Pages:', 'after' => '</div>' ) ); ?>
					</div>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ),  60  ); ?>
						</div>
						<div id="author-description">
							<h2>About <?php the_author() ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									View all posts by <?php the_author() ?> <span class="meta-nav">&rarr;</span>
								</a>
							</div>
						</div>
					</div>
				<?php endif; ?>

				



				</div>

				<div id="nav-below" class="navigation">
					<div class="nav-next"><?php next_post_link( '%link', '%title &gt;&gt;' ); ?></div>
					<div class="nav-previous"><?php previous_post_link( '%link', '&lt;&lt; %title'); ?></div>					
				</div>

<?php endif; ?>

			</div>


<?php get_footer(); ?>
