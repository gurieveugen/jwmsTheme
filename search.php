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

			<?php if ( have_posts() ) : ?>
				<h1 class="page-title">Search Results for: <span> <?php echo get_search_query() ?></span></h1>
				<?php include('loop.php');	?>
			<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title">Nothing Found</h2>
					<div class="entry-content">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						<?php get_search_form(); ?>
					</div>
				</div>
			<?php endif; ?>
			</div>


<?php get_footer(); ?>
