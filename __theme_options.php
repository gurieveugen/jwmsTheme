<?php
function hivista_admin_add_options_page() {
	add_theme_page(
		'Theme Options', // meta title
		'Theme Options', // admin menu title
		7,
		'theme-options',
		'hivista_theme_options_page'
	);
}

function hivista_theme_options_page() {
	$hivista_action_message = '';
	$hivista_theme_options = get_option("hivista_theme_options");
	if (!$hivista_theme_options) {
		$hivista_theme_options['contact_phone'] = '';
		$hivista_theme_options['contact_fax'] = '';
		$hivista_theme_options['contact_email'] = '';
		update_option("hivista_theme_options", $hivista_theme_options);
		$hivista_theme_options = get_option("hivista_theme_options");
	}
	if ($_POST['hivista_form_submit'] == 'submit') {
		foreach($_POST as $pkey => $pval) { $_POST[$pkey] = str_replace('\"', '"', $pval); }
		foreach($_POST as $pkey => $pval) { $_POST[$pkey] = str_replace("\'", "'", $pval); }
		$hivista_theme_options['contact_phone'] = $_POST["contact_phone"];
		$hivista_theme_options['contact_fax'] = $_POST["contact_fax"];
		$hivista_theme_options['contact_email'] = $_POST["contact_email"];
		update_option("hivista_theme_options", $hivista_theme_options);
		$hivista_action_message = 'Options Saved.';
	}
?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php echo __('Theme Options'); ?></h2><br>
		<form method="post" method="POST">
		<input type="hidden" name="hivista_form_submit" value="submit">
		<?php if(strlen($hivista_action_message)) { ?><div id="message" class="updated fade"><p><?php _e($hivista_action_message) ?></p></div><?php } ?>
		<table style="width:auto;">
		  <tr>
			<td>Phone:&nbsp;</td>
			<td><input type="text" name="contact_phone" value="<?php echo htmlspecialchars($hivista_theme_options['contact_phone']); ?>" style="width:400px;"></td>
		  </tr>
		  <tr>
			<td>Fax:&nbsp;</td>
			<td><input type="text" name="contact_fax" value="<?php echo htmlspecialchars($hivista_theme_options['contact_fax']); ?>" style="width:400px;"></td>
		  </tr>
		  <tr>
			<td>Email:&nbsp;</td>
			<td><input type="text" name="contact_email" value="<?php echo htmlspecialchars($hivista_theme_options['contact_email']); ?>" style="width:400px;"></td>
		  </tr>		  
		</table>
		<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Save') ?>" /></p>
		</form>
	</div>
<?php
}

add_action('admin_menu', 'hivista_admin_add_options_page');
?>