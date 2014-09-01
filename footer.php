<?php
/**
 * @package WordPress
 * @subpackage Custom_Theme
 */
?>
</div>
	</div>
	<div id="footer">
		<div class="center-section">
			<div class="columns">
				<div class="column">
					<?php wp_nav_menu( array( 'menu' => 'LeftFooterMenu','container' =>false ) ); ?>
				</div>
				<div class="column">
					<?php wp_nav_menu( array( 'menu' => 'FooterMenu','container' =>false ) ); ?>
				</div>
				<?php $contact_options = get_option("hivista_theme_options"); ?>
				<div class="column">
					<ul>
						<li>T <?php echo $contact_options['contact_phone'];?></li>
						<li>F <?php echo $contact_options['contact_fax'];?></li>
						<li>E <a href="mailto:<?php echo $contact_options['contact_email'];?>">click here</a></li>
					</ul>
				</div>
				<div class="column">
					<?php wp_nav_menu( array( 'menu' => 'FooterNav','container' =>false,'menu_class' =>'marked-list' ) ); ?>
				</div>
			</div>
			<strong class="footer-logo"><a href="<?php echo home_url('/'); ?>">jwms</a></strong>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
