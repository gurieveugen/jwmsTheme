<?php
/**
 *
 * @package WordPress
 * @subpackage Custom_Theme
 */

get_header(); ?>
<?php if ( single_cat_title( '', false ) != 'Vessels' ) : ?>
<?php get_sidebar(); ?>
<?php endif; ?>
		<div id="content" role="main">
			<!--
			<h1 class="page-title">
				Category Archives: <span><?php echo single_cat_title( '', false ) ?></span>
			</h1>
			-->
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo '<div class="archive-meta">' . $category_description . '</div>';
                if ( single_cat_title( '', false ) == 'Vessels' ) :
                    include('loop-vessels.php');
                else:
				    include('loop.php');
                endif;
			?>
		</div>


<?php get_footer(); ?>
