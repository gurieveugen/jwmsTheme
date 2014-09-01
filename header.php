<?php
/**
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/PIE.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/init-pie.js"></script>		
	<![endif]-->
	<?php if(is_front_page()){?>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.2.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/anythingslider.css">
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.anythingslider.min.js"></script>
	<?php 
	$slider_query = new WP_Query(array('post_type'=>'page', 'post_parent'=>7, 'orderby'=>'menu_order', 'order'=>'asc', 'posts_per_page'=>'-1'));

		while ( $slider_query->have_posts() ) : $slider_query->the_post();
			$slider_nav[] =	"'".get_the_title()."'";
		endwhile;
	?>
	<script>
		jQuery(function(){
			jQuery('#slider-front').anythingSlider({
				//resizeContents      : false, // If true, solitary images/objects in the panel will expand to fit the viewport
				navigationSize      : <?php echo $slider_query->post_count; ?>,     // Set this to the maximum number of visible navigation tabs; false to disable
				buildStartStop		: false,
				autoPlay			: true,
				delay				: 4000,
				navigationFormatter : function(index, panel){ // Format navigation labels with text
					return [<?php echo implode(",", $slider_nav); ?>][index - 1];
				},
				onSlideBegin: function(e,slider) {
					// keep the current navigation tab in view
					slider.navWindow( slider.targetPage );
				},
				onInitialized: function(e,slider) {
					sliderAddIcon();
				}
			});		
		});
	</script>	
	<?php }?>	
</head>
<?php if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>

<body <?php body_class($page_slug); ?>>

<div id="wrapper">
	<div id="header">
		<div class="center-section">
			       <div class="top-phone"><?php $contact_options = get_option("hivista_theme_options"); ?>
				<span>T</span> <?php echo $contact_options['contact_phone'];?></div>
			<strong class="logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></strong>
			<div class="right-top">
						<ul class="list-img-top">
              <li><a href="#"><img src="http://jwms.com.au/wp-content/uploads/2013/12/IMCA-Logo.gif" alt=" "></a></li>
              <li><a href="#"><img src="/wp-content/uploads/2012/05/img_01.gif" alt=" "></a></li>
              <li><a href="#"><img src="/wp-content/uploads/2012/05/img_02.gif" alt=" "></a></li>
              <li><a href="#"><img src="/wp-content/uploads/2012/05/img_03.gif" alt=" "></a></li>
            </ul>
			</div>
		</div>
		<div class="nav-holder">
			<div class="center-section">
				<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
			</div>
		</div>
	</div>
	<div id="visual">
		<div class="center-section">
			<?php
				if(is_front_page()){
				$function_sliderAddIcon = '';
					?>
				<div id="slider">
				<?php /* <a href="#" id="btn-prev">prev</a> */ ?>
				<span class="decor-left"></span>
				<span class="decor-right"></span>
				
				<div class="slider-holder">
					<span class="mask"></span>
					<ul id="slider-front">
					<?php $panel_counter = 1;?>
					<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
						<li class="panel<?php echo $panel_counter;?>">
							<?php
							$excerpt = get_the_excerpt();
							$excerpt = substr($excerpt, 0, 150);
							
							$slider_image = get_post_meta(get_the_ID(), 'slider_image', true);
							if(!empty($slider_image)){?>
							<img src="<?php echo $slider_image; ?>" alt="<?php the_title();?>" />
							<?php }?>
							
							<div class="txt">
								<div class="container">
									<p><a href="<?php the_permalink();?>"><?php the_title();?></a> <?php echo $excerpt; ?></p>
									<a href="<?php the_permalink();?>" class="btn-more cf">MORE</a>
								</div>
							</div>
						</li>
						<?php
						$page_icon = get_post_meta(get_the_ID(), 'page_icon', true);						
						if(!empty($page_icon)){						
						$function_sliderAddIcon .= 'jQuery("ul.thumbNav li.tooltip a.panel'.$panel_counter.'").prepend("<img src=\"'.$page_icon.'\">");'."\n\r";						
						} ?>
						<?php $panel_counter++;?>
					<?php endwhile;	?>
					<?php wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
			<script>
				function sliderAddIcon(){
					//jQuery("ul.thumbNav li.tooltip a").prepend('<img src="<?php echo $page_icon;?>">');
					<?php echo $function_sliderAddIcon;?>
				}
			</script>
<?php } else { 
	
	$featured_image_id = get_featured_image_id($post->ID);
	if(!empty($featured_image_id)){
		$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
		if($featured_image[1] == 1000 && $featured_image[2] == 216){
			$featured_image_src = $featured_image[0];
		}else{
			$featured_image_src = get_thumb($featured_image[0], 1000, 216, 1);
		}		
	}else{
		$featured_image_src = get_bloginfo('template_directory')."/images/feature01.jpg";
	}
?>
	<img src="<?php echo $featured_image_src; ?>" alt="<?php echo $post->post_title;?>" />
<?php } ?>			
		</div>
	</div>
	<div class="center-section">
        <?php if(!is_front_page()){?>
		<?php $child_of = $post->ID; if ($post->post_parent) { $child_of = $post->post_parent; } ?>
		<?php $args = array('child_of' => $child_of, 'title_li' => '', 'depth' => 1); ?>
		<ul class="sub-nav">
			<li<?php if (is_page($child_of)) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_permalink($child_of); ?>"><?php echo get_the_title($child_of); ?></a></li>
			<?php wp_list_pages( $args ); ?>
		</ul>
        <?php }?>
		<div id="main">