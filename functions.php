<?php
/*
 * @package WordPress
 * @subpackage Custom_Theme
 */

$content_width = 600;				// Defines maximum width of images in posts
add_editor_style();					// Allows editor-style.css to configure editor visual style.
add_theme_support( 'post-thumbnails' );
include('__widgets.php');
include('__theme_options.php');


register_sidebar( array(
	'description' => 'Main sidebar',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Secondary Sidebar',
	'description' => 'Front page widget area',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Front Page Sidebar',
	'description' => '',
	'before_widget' => '<div id="%1$s" class="%2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );
register_sidebar( array(
	'name' => 'Front Page 2nd Sidebar',
	'description' => '',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Front Page Main Sidebar',
	'description' => '',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_nav_menus( array(
	'main' => 'Main Navigation Menu',
	'secondary' => 'Secondary navigation Menu'
) );
wp_create_nav_menu('MainMenu');
wp_create_nav_menu('FooterMenu');

function get_top_menu(){
  wp_nav_menu(array(
  'container'       => 'div', 			// tag name '' - for no container.
  'container_id'    => 'nav-holder',    // tag id
  'menu_class'      => '',				// ul class
  'menu_id'			=> 'nav',			// ul id
  'echo'            => true,
  'theme_location'  => 'main'));		// menu location name ('main' or 'secondary' by default)
}

function get_footer_menu(){
  wp_nav_menu(array(
  'container'       => 'div', 			// tag name '' - for no container.
  'container_id'    => 'nav-holder',    // tag id
  'menu_class'      => '',				// ul class
  'menu_id'			=> 'nav',			// ul id
  'echo'            => true,
  'theme_location'  => 'secondary'));		// menu location name ('main' or 'secondary' by default)
}

/*function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );*/

function show_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

add_theme_support( 'automatic-feed-links' );

function short_content($content,$sz = 500,$more = '...') {
	if (strlen($content)<$sz) return $content;
	$p = strpos($content, " ",$sz);
    if (!$p) return $content;
        $content = strip_tags($content);
        if (strlen($content)<$sz) return $content;
        $p = strpos($content, " ",$sz);
        if (!$p) return $content;
	return substr($content, 0, $p).$more;
}

add_action( 'admin_menu', 'actionHivista');
function actionHivista(){
	global $wpdb;
	$parent_page_id = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID= ".$_GET['post']);
	if($parent_page_id == 7){
	add_meta_box("slider-box", "Slider option", "additional_fields_box", "page", "normal", "high"); 
	}
}	

function additional_fields_box(){
	global $post;
	$custom_fields = get_post_custom($post->ID);
	
	echo '<input type="hidden" name="slide_noncename" id="slide_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';	
	
				
		?>

		<table class="form-table">
			<tr>
				<td>Page icon</td>
				<td><input type="text" size="80" value="<?php echo $custom_fields['page_icon'][0];?>" name="page_icon"></td>
			</tr>	
			<tr>
				<td>Widget icon</td>
				<td><input type="text" size="80" value="<?php echo $custom_fields['widget_icon'][0];?>" name="widget_icon"></td>
			</tr>				
			<tr>
				<td>Slider image</td>
				<td><input type="text" size="80" value="<?php echo $custom_fields['slider_image'][0];?>" name="slider_image"></td>
			</tr>		
		</table>
			
	<?php
		
}


add_action('save_post', 'save_additional_fields'); 

function save_additional_fields($post_id){
	global $post;
	
  if ( !wp_verify_nonce( $_POST['slide_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }
	  
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;	
	
	
	if($post->post_type == 'page' && $_SERVER['REQUEST_METHOD'] == 'POST'){
		
		if(!empty($_POST['page_icon'])){
			update_post_meta($post_id, "page_icon", $_POST["page_icon"]);
		}
		if(!empty($_POST['widget_icon'])){
			update_post_meta($post_id, "widget_icon", $_POST["widget_icon"]);
		}		
		if(!empty($_POST['slider_image'])){
			update_post_meta($post_id, "slider_image", $_POST["slider_image"]);
		}	
				
	}

}

function get_thumb($iurl, $iw = '', $ih = '', $zc = '', $q = 100) {
  $thumb = '';
  if (is_numeric($iurl)) { $iurl = get_attach_url($iurl); }
  if (strlen($iurl)) {
//    $thumb = get_bloginfo('template_url').'/timthumb.php?src='.$iurl;
	$thumb = get_bloginfo('url').'/timthumb.php?src='.$iurl;
    if (strlen($iw)) { $thumb .= '&amp;w='.$iw; }
    if (strlen($ih)) { $thumb .= '&amp;h='.$ih; }
    if (strlen($zc)) { $thumb .= '&amp;zc='.$zc; }
	if (strlen($q)) { $thumb .= '&amp;q='.$q; }
  }
  return $thumb;
}

function get_featured_image_id($pid) {
	return get_post_meta($pid, '_thumbnail_id', true);
}


function my_gallery_shortcode($null, $attr = array( )) {
	global $post, $wpdb;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	$exclude = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_parent = ". $id . " AND menu_order = 0 AND post_type = 'attachment'");
	/*
	echo '<pre>';
	print_r($exclude);
	echo '</pre>';
	*/
	$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit',
	'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order,
	'orderby' => $orderby, 'exclude' => $exclude) );

	if ( empty($attachments) )
		return '';

	if ( is_feed( ) ) {
		$output = "\n";
		foreach ( $attachments as $id => $attachment )
			$output .= wp_get_attachment_link($id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;

	$output = apply_filters('gallery_style', "
	<style type='text/css'>
	.gallery {
		margin: auto;
	}
	.gallery:after {
		content: '.';
		display: block;
		height: 0;
		clear: left;
		visibility: hidden;
	}
	.gallery-item {
		float: left;
		margin-top: 10px;
		text-align: center;
		width: {$itemwidth}%;
	}
	.gallery-caption {
		margin-left: 0;
	}
	</style>
	<!-- see my_gallery_shortcode( ) in {theme_dir}/functions.php -->
	<div class='gallery'>");

	$i = 0;
	if(!empty($attachments)){
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
//echo '<br>'.$link;
		$link = str_replace('<a href', '<a rel="lightbox" href', $link);
		$output .= "";
		$output .= "

		$link
		";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "

			{$attachment->post_excerpt}
			";
		}
		$output .= "";
	}
	}

	$output .= "
	</div>\n";

	return $output;
}
//add_filter('post_gallery', 'my_gallery_shortcode', 10, 2);