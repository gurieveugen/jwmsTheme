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
					  <h1>OUR VESSELS</h1>
                      <?php /* ?>
                        <div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_01.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Maddison</a> <span>Utility Vessel</span></h3>
							  <ul>
							    <li>LOA | 24M</li>
							    <li>BEAM | 9.5M</li>
							    <li>DRAFT | 1.7M</li>
							    <li>DECK LOAD | 35 Ton </li>
							  </ul>
							  <ul>
							    <li>15 Ton Crane</li>
							    <li>10 Ton Tugger Winch</li>
							    <li>Crash Rails</li>
							    <li>Sprint Speed 16 Knots</li>
							  </ul>
							  <ul>
							    <li>12 & 24 PAX</li>
							    <li>OVID & IMCA Compliant</li>
							    <li>Bollard Pull 10 Ton</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_02.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Escape</a> <span>Utility Vessel</span></h3>
							  <ul>
							    <li>LOA | 24M</li>
							    <li>BEAM | 6.5M</li>
							    <li>DRAFT | 1.4M</li>
							    <li>DECK LOAD | 20 Ton</li>
							  </ul>
							  <ul>
							    <li>3 Ton Crane</li>
							    <li>Stern Roller</li>
							    <li>10 Ton Tugger Winch</li>
							    <li>Crash Rails</li>
							  </ul>
							  <ul>
							    <li>Sprint Speed 20 Knots</li>
							    <li>18 & 36 PAX</li>
							    <li>OVID & IMCA</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>	
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_03.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Fine Time</a> <span>Moon Pool</span></h3>
							  <ul>
							    <li>LOA | 19.1M</li>
							    <li>BEAM | 5.95M</li>
							    <li>DRAFT | 1.2M</li>
							    <li>DECK LOAD | 10 Ton </li>
							  </ul>
							  <ul>
							    <li>Sprint Speed 22 Knots</li>
							    <li>Bow & Stern Loading</li>
							    <li>3 Ton Crane</li>
							    <li>5 Ton Tugger Crane</li>
							  </ul>
							  <ul>
							    <li>42 PAX</li>
							    <li>OVID Compliant</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_04.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Prime</a> <span>Utility / Crew Vessel</span></h3>
							  <ul>
							    <li>LOA | 14.85M</li>
							    <li>BEAM | 6M</li>
							    <li>DRAFT | 1.2M</li>
							    <li>DECK LOAD | 6 Ton </li>
							  </ul>
							  <ul>
							    <li>Sprint Speed 26 Knots</li>
							    <li>Medivac Stretcher</li>
							    <li>42 PAX</li>
							    <li>Bow & Stern Loading</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_05.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Warrior</a> <span>Shallow Draft Jet Utility Vessel</span></h3>
							  <ul>
							    <li>LOA | 14.9M</li>
							    <li>BEAM | 5.5M</li>
							    <li>DRAFT | .5M</li>
							    <li>DECK LOAD | 10 Ton </li>
							  </ul>
							  <ul>
							    <li>3 Ton Crane Deck</li>
							    <li>Moon Pool</li>
							    <li>Sprint Speed 22 Knots</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_06.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Bedouin</a> <span>FRC & Water Taxi</span></h3>
							  <ul>
							    <li>LOA | 8M</li>
							    <li>BEAM | 3M</li>
							    <li>DRAFT | .4M</li>
							    <li>SPEED | 35 Knots</li>
							  </ul>
							  <ul>
							    <li>Sprint Speed 32 Knots</li>
							    <li>Bow Loading</li>
							    <li>Rescue Door</li>
							    <li>Medivac Stretcher</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_07.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Sustainable</a> <span>Shallow Draft Jet Utility Vessel</span></h3>
							  <ul>
							    <li>LOA | 9.9M</li>
							    <li>BEAM | 4M</li>
							    <li>DRAFT | .4M</li>
							    <li>Information needed</li>
							  </ul>
							  <ul>
							    <li>Sprint Speed 16 Knots</li>
							    <li>Bow & Stern Loading</li>
							    <li>Rescue Door</li>
							    <li>Medivac Stretcher</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_08.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Don</a> <span>Ocean Tug</span></h3>
							  <ul>
							    <li>LOA | 32M</li>
							    <li>BEAM | 9.15M</li>
							    <li>DRAFT | 3.85M</li>
							    <li>B PULL | 40 Ton</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_09.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Shooter</a> <span>Utility Vessel</span></h3>
							  <ul>
							    <li>LOA | 28M</li>
							    <li>BEAM | 8.5M</li>
							    <li>DRAFT | 1.4M</li>
							    <li>SPEED | 26 Knots</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_10.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Trident</a> <span>Crew Vessel / FRC</span></h3>
							  <ul>
							    <li>l LOA | 7.5M</li>
							    <li>BEAM | 2.4M</li>
							    <li>DRAFT | .3M</li>
							    <li>SPEED | 28 Knots</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_11.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Pearl</a> <span>Accommodation Barge</span></h3>
							  <ul>
							    <li>LOA | 26M</li>
							    <li>BEAM | 8M</li>
							    <li>DRAFT | .8M</li>
							    <li>PAX | 26 Guests</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_12.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Orcadia</a> <span>Multi Cat</span></h3>
							  <ul>
							    <li>LOA | 23.33M</li>
							    <li>BEAM | 9M</li>
							    <li>DRAFT | .8M</li>
							    <li>B PULL | 23 Ton </li>
							  </ul>							  
							  <ul>
							    <li>Crane 6.5 Ton at 14.10M</li>
							    <li>Crane 1.6 Ton at 12.50M</li>
							    <li>30 Ton Tugger Winch</li>
							    <li>Bow & Stern LRoller</li>
							  </ul>							  
							  <ul>
							    <li>Sprint Speed 11 Knots</li>
							    <li>Moon Pool</li>
							    <li>OVID & IMCA</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
						
						<div id="post-67" class="post-vesswls-new cf">							
							<div class="img">
								<a href="#">
								  <img src="<?php bloginfo('template_directory'); ?>/images/img_vessels_13.jpg">
								</a>
							</div>
							<div class="txt">
							  <h3><a href="#">Jetwave Barge</a> <span>Dumb Barge</span></h3>
							  <ul>
							    <li>LOA | 43.89M</li>
							    <li>BEAM | 15.24M</li>
							    <li>DRAFT | 2.414M</li>
							    <li>DECK LOAD | 8 Ton/M2</li>
							  </ul>
							</div> 
							<a href="#" class="btn-pdf">PDF</a>
							<a href="#" class="more">VIEW <span>MORE</span></a>
						</div>
                        <?php */ ?>

		<?php while ( have_posts() ) : the_post(); ?>
        
            <div id="post-<?php the_ID(); ?>" class="post-vesswls-new cf">
                <?php 
				$featured_image_id = get_featured_image_id(get_the_ID());
				if(!empty($featured_image_id)){
					$featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
					$featured_image_src = get_thumb($featured_image[0], 189, 135, 1);
				?>
				<div class="img">
					<a href="<?php the_permalink();?>">
						<img src="<?php echo $featured_image_src; ?>" alt="<?php the_title();?>" width="189" height="135" />
					</a>
				</div>
				<?php } ?>
                
				<div class="txt">
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php the_field( 'extra_information' ); ?></span></h3>
                  <?php the_field( 'description' ); ?>				  
				</div>
                <?php if (get_field('pdf')) : ?>
                    <a href="<?php the_field('pdf'); ?>" class="btn-pdf">PDF</a>
                <?php endif; ?>
				<a href="<?php the_permalink(); ?>" class="more">VIEW <span>MORE</span></a>
			</div>
            
        
		<?php endwhile; ?>
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
