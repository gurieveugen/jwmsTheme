<?php
/**
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>
<?php get_header(); ?>
            
			<div class="top-home-box cf">
			
				<div id="content" class="post-home-page">
                    <?php if ( have_posts() ) : the_post(); ?>
            			<?php the_content(); ?>
            		<?php endif; ?>                    
				</div>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Page Main Sidebar') ) : ?>	 

                <?php endif; ?>
			
			</div>
			
			<div class="bottom-home-content cf">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Page Sidebar') ) : ?>	 

                <?php endif; ?>
				
				<div class="right-bottom-home">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Page 2nd Sidebar') ) : ?>	 

                    <?php endif; ?>					
				</div>	
			</div>
            
<?php /* ?>
	<div class="columns">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar') ) : ?>	 

		<?php endif; ?>
		<div class="column">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Page Sidebar') ) : ?>	 

		<?php endif; ?>
		</div>
	</div>
	<div id="content">
		<?php if ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endif; ?>
		<?php <a href="#" class="btn-more cf">MORE</a> ?>
	</div> <?php */ ?>
<?php get_footer(); ?>
