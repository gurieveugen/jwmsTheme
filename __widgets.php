<?php 
class Our_Vessels_Widget extends WP_Widget {

	function Our_Vessels_Widget() {
		$widget_ops = array('classname' => 'from_blog_widget', 'description' => __('Vessels Posts'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('from_blog_widget', __('Our Vessels'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'from_blog_widget', $instance['text'], $instance );
		$num_posts = apply_filters( 'from_blog_widget', $instance['num_posts'], $instance );
		
		if(empty($num_posts)){ $num_posts = 2; }
		$cat_id = 5;
		
		$the_query = new WP_Query(array('post_per_page' => $num_posts, 'cat' => $cat_id));
		
		?>
		<div class="column">
		<?php if ( !empty( $title ) ) { echo '<h3  class="widget-title">'.$title.'</h3>';} ?>
			<ul>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
			<?php endwhile;	?>
			</ul>
			<a href="<?php echo get_category_link($cat_id);?>" class="btn-more cf">SEE ALL</a>
		</div>
		<?php	
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['num_posts'] = strip_tags($new_instance['num_posts']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'our vessels', 'text' => '', 'num_posts' => 2 ) );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
		$num_posts = strip_tags($instance['num_posts']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Num posts:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" type="text" value="<?php echo esc_attr($num_posts); ?>" /></p>		
		<?php 
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Our_Vessels_Widget");'));

class Our_Vessels_Widget2 extends WP_Widget {

	function Our_Vessels_Widget2() {
		$widget_ops = array('classname' => 'from_blog_widget', 'description' => __('Vessels Posts with Thumb'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('from_blog_widget2', __('Our Vessels  with Thumb'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );		
		$num_posts = apply_filters( 'from_blog_widget', $instance['num_posts'], $instance );
		
		if(empty($num_posts)){ $num_posts = 2; }
		$cat_id = 5;
		
		$the_query = new WP_Query(array('post_per_page' => $num_posts, 'cat' => $cat_id));
		
		?>
        <div class="popular-vessels-box">		
		<?php if ( !empty( $title ) ) { echo $before_title.$title.$after_title;} ?>
			<ul>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                
                <li>
                    <?php $featured_image_id = get_featured_image_id(get_the_ID());
                    
                	if(!empty($featured_image_id)){
                		$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');                		
                        $featured_image_src = get_thumb($featured_image[0], 64, 45, 1);
                        ?>
                        <div class="img"><img src="<?php echo $featured_image_src; ?>" alt=" " /></div>		
                	<?php } ?>
    
	
				  <div class="txt">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    <?php if (get_field( 'extra_information' )) : ?>
                        <p><?php the_field( 'extra_information' ); ?></p>
                    <?php endif; ?>					
				  </div>
				</li>
                
			<?php endwhile;	?>
			</ul>
			<a href="<?php echo get_category_link($cat_id);?>" class="btn-more cf">More</a>
		</div>
		<?php	
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['num_posts'] = strip_tags($new_instance['num_posts']);		
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'our vessels', 'text' => '', 'num_posts' => 2 ) );
		$title = strip_tags($instance['title']);		
		$num_posts = strip_tags($instance['num_posts']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Num posts:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" type="text" value="<?php echo esc_attr($num_posts); ?>" /></p>		
		<?php 
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Our_Vessels_Widget2");'));

class Featured_Project_Widget extends WP_Widget {

	function Featured_Project_Widget() {
		$widget_ops = array('classname' => 'featured_project_widget', 'description' => __('Featured Project'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('featured_project_widget', __('Featured Project'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'from_blog_widget', $instance['text'], $instance );
		$project_id = apply_filters( 'from_blog_widget', $instance['project_id'], $instance );
		
		if(!empty($project_id)){
		
		$the_query = new WP_Query(array('ID' => $project_id));
		?>
		<div class="column">
		<?php if ( !empty( $title ) ) { echo '<h3  class="widget-title">'.$title.'</h3>';} ?>		
		<?php
		$featured_image_id = get_featured_image_id($project_id);
		if(!empty($featured_image_id)){
		$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
		$featured_image_src = get_thumb($featured_image[0], 196, 74, 1);
		?>
			<img src="<?php echo $featured_image_src;?>" alt="<?php the_title();?>">
		<?php } ?>	
			<p><?php echo $text;?></p>
			<a href="<?php echo get_permalink($project_id);?>" class="btn-more cf">MORE</a>			
		</div>
		<?php
		}
		
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['project_id'] = strip_tags($new_instance['project_id']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'featured project', 'text' => '', 'project_id' => '' ) );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
		$project_id = strip_tags($instance['project_id']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Featured Project:'); ?></label>
		<?php $the_query = new WP_Query(array('post_per_page' => $num_posts, 'cat' => 1)); ?>
		<select name="<?php echo $this->get_field_name('project_id'); ?>" id="<?php echo $this->get_field_id('project_id'); ?>>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<option value="<?php the_ID();?>"><?php the_title();?></option>
		<?php endwhile;	?>
		</select>		
		
		<textarea class="widefat" rows="5" cols="15" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea> -->
		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.'); ?></label></p>
		
	<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Featured_Project_Widget");'));

class Services_Widget extends WP_Widget {

	function Services_Widget() {
		$widget_ops = array('classname' => 'services_widget', 'description' => __('Services Widget'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('services_widget', __('Services Widget'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		
		$the_query = new WP_Query(array('post_per_page' => '-1', 'post_type' => 'page', 'post_parent' => 7, 'orderby' => 'menu_order', 'order' => 'asc'));		
		?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php 
				$widget_icon_src = get_post_meta(get_the_ID(), 'widget_icon', true);
				if(!empty($widget_icon_src)){
					$widget_icon_html = '<img src="'.$widget_icon_src.'">';
				}else{
					$widget_icon_html = '';
				} 
			?>			
				<h3 class="decor-ttl"><a href="<?php the_permalink();?>"><?php echo $widget_icon_html; ?><?php echo strtoupper(get_the_title());?> +</a></h3>
				<?php
				$sub_services_query = new WP_Query(array('post_per_page' => '-1', 'post_type' => 'page', 'post_parent' => get_the_ID(), 'orderby' => 'menu_order', 'order' => 'asc'));
				if($sub_services_query->have_posts()){ ?>
					<div class="container">
						<ul>
						<?php while ( $sub_services_query->have_posts() ) : $sub_services_query->the_post(); ?>
							<li><?php the_title();?></li>
						<?php endwhile;	?>
						<?php wp_reset_postdata(); ?>
						</ul>
					</div>
					
				<?php }	?>
				
			<?php endwhile;	?>
			<?php wp_reset_postdata(); ?>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance ) {
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<?php 
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Services_Widget");'));

class Front_Page_Widget extends WP_Widget {

	function Front_Page_Widget() {
		$widget_ops = array('classname' => 'front_page_widget', 'description' => __('Front Page'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('front_page_widget', __('Front Page Widget'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'front_page_widget', $instance['text'], $instance );
		$widget_page_id = apply_filters( 'front_page_widget', $instance['widget_page_id'], $instance );
		$widget_cat_id = apply_filters( 'front_page_widget', $instance['widget_cat_id'], $instance );
		$widget_image = apply_filters( 'front_page_widget', $instance['widget_image'], $instance );
		
		if(!empty($widget_page_id)){
		
		$the_query = new WP_Query(array('ID' => $widget_page_id));
		
		if(!empty($widget_cat_id)){
			$more_link = get_category_link($widget_cat_id);			
		}else{
			$more_link = get_permalink($widget_page_id);			
		}
		
		if(!empty($widget_image)){
			$image_src = get_thumb($widget_image, 196, 74, 1);
		}else{
			$featured_image_id = get_featured_image_id($widget_page_id);		
			if(!empty($featured_image_id)){
				$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
				$image_src = get_thumb($featured_image[0], 196, 74, 1);			
			}	
		}
		?>
		<?php echo $before_widget; ?>
		<?php if ( !empty( $title ) ) { echo '<h3  class="widget-title">'.$title.'</h3>';} ?>		
		<?php if(!empty($image_src)){ ?>
			<img src="<?php echo $image_src;?>" alt="<?php the_title();?>">
		<?php } ?>	
			<p><?php echo $text;?></p>
			<a href="<?php echo $more_link;?>" class="btn-more cf">MORE</a>			
		<?php echo $after_widget;
		}
		
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['widget_page_id'] = strip_tags($new_instance['widget_page_id']);
		$instance['widget_cat_id'] = strip_tags($new_instance['widget_cat_id']);
		$instance['widget_image'] = strip_tags($new_instance['widget_image']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'featured project', 'text' => '', 'widget_page_id' => '', 'widget_cat_id' => '', 'widget_image' => '' ) );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
		$widget_page_id = strip_tags($instance['widget_page_id']);
		$widget_cat_id = strip_tags($instance['widget_cat_id']);
		$widget_image = strip_tags($instance['widget_image']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Page:'); ?></label>
		
		<?php/*
		<?php $the_query = new WP_Query(array('post_per_page' => '-1', 'post_type' => 'page')); ?>
		<select name="<?php echo $this->get_field_name('widget_page_id'); ?>" id="<?php echo $this->get_field_id('widget_page_id'); ?>>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php $selected = '';
					if($widget_page_id == get_the_ID()) $selected = 'selected';
			?>
			<option value="<?php the_ID();?>" <?php echo $selected;?>><?php the_title();?></option>
		<?php endwhile;	?>
		</select>		
		*/ ?>
		<?php wp_dropdown_pages( array('name' => $this->get_field_name('widget_page_id'), 'selected' => $widget_page_id) ); ?></p> 
		
		<p><strong>OR</strong></p>
		<p><label for="<?php echo $this->get_field_id('widget_cat_id'); ?>"><?php _e('Category:'); ?></label>
		<?php wp_dropdown_categories( array('show_option_none' => 'or select category','name' => $this->get_field_name('widget_cat_id'), 'selected' => $widget_cat_id)  ); ?>
		<?php if(!empty($widget_image)){ $image_src = get_thumb($widget_image, 196, 74, 1);
		echo '<br><img src="'.$image_src.'">';
		}?>
		</p> 

		<p><label for="<?php echo $this->get_field_id('widget_image'); ?>"><?php _e('Image src:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('widget_image'); ?>" name="<?php echo $this->get_field_name('widget_image'); ?>" type="text" value="<?php echo $widget_image; ?>" /></p>
		
		<textarea class="widefat" rows="5" cols="15" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.'); ?></label></p>
		
	<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Front_Page_Widget");'));

class Photo_Widget extends WP_Widget {

	function Photo_Widget() {
		$widget_ops = array('classname' => 'photo_widget', 'description' => __('Photo Widget'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('photo_widget', __('Photo Widget'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );		
		$widget_page_id = apply_filters( 'photo_widget', $instance['widget_page_id'], $instance );		
		$widget_image = apply_filters( 'photo_widget', $instance['widget_image'], $instance );
		
		if(!empty($widget_page_id)){		
			$the_query = new WP_Query(array('ID' => $widget_page_id));		
			$more_link = get_permalink($widget_page_id);			
		}
		
		if(!empty($widget_image)){
			$image_src = get_thumb($widget_image, 196, 74, 1);
		}else{
			$featured_image_id = get_featured_image_id($widget_page_id);		
			if(!empty($featured_image_id)){
				$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
				$image_src = get_thumb($featured_image[0], 196, 74, 1);			
			}	
		}
		?>
		<?php echo $before_widget; ?>
		<?php if ( !empty( $title ) ) { echo '<h3  class="widget-title">'.$title.'</h3>';} ?>		
		<?php if(!empty($image_src)){ ?>
			<img src="<?php echo $image_src;?>" alt="<?php the_title();?>">
		<?php } ?>	
			<a href="<?php echo $more_link;?>" class="btn-more cf">MORE</a>			
		<?php	echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['widget_page_id'] = strip_tags($new_instance['widget_page_id']);
		$instance['widget_image'] = strip_tags($new_instance['widget_image']);		
		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'widget_page_id' => '', 'widget_image' => '' ) );
		$title = strip_tags($instance['title']);
		$widget_page_id = strip_tags($instance['widget_page_id']);
		$widget_image = strip_tags($instance['widget_image']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Page:'); ?></label>
		
		<?php wp_dropdown_pages( array('name' => $this->get_field_name('widget_page_id'), 'selected' => $widget_page_id) ); ?></p> 		

		<p><label for="<?php echo $this->get_field_id('widget_image'); ?>"><?php _e('Image src:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('widget_image'); ?>" name="<?php echo $this->get_field_name('widget_image'); ?>" type="text" value="<?php echo $widget_image; ?>" /></p>	
		
	<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Photo_Widget");'));