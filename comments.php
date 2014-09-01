<?php
/**
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>

<div id="comments">

<?php if ( post_password_required() ) : ?>
		<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
</div>
<?php return; endif; ?>

<?php if ( have_comments() && comments_open()) : ?>
	<h3 id="comments-title">
		<?php comments_number('No Responses to ', 'One Response to ', '% Responses to ') ?>
		<em><?php the_title() ?></em>
	</h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
				<div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>'); ?></div>
			</div> 
	<?php endif; ?>
	<ol class="commentlist">
		<?	wp_list_comments();	?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
				<div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>'); ?></div>
			</div>
	<?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>

</div>
