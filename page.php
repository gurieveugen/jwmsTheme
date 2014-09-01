<?php
/**
 *
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="content" role="main">

<?php if ( have_posts() ) : the_post(); ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>
					<?php edit_post_link('Edit', '<span class="edit-link">', '</span>' ); ?>
				</div>


<?php endif; ?>

		</div>


<?php get_footer(); ?>
