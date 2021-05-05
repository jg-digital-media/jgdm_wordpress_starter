<?php 

/**
* Plugin Name: JGDM Development Plugin
* Plugin URI: https://wordpress.jonniegrieve.co.uk
* Description: JGDM Development Plugin - The goal of this plugin is to answer the problem of using a custom post type to handle post pagination correctly.
* Version: 1.0.0
* Author: Jonathan Grieve @jg_digitalMedia
* Author URI: https://www.jonniegrieve.co.uk
* License: GPL2
* Text Domain: jgdm_wordpress_starter
*/


//define( 'jgdm-plugin-dev', '1.0.0' );

/***

Plugin Assets

****/


add_action( 'admin_menu', 'jgdm__add_admin_menu' );
add_action( 'admin_init', 'jgdm__settings_init' );


function jgdm__add_admin_menu(  ) { 

	add_menu_page( 
        'JGDM Development Plugin', 
        'JGDM Development Plugin', 
        'manage_options', 
        'jgdm_development_plugin', 
        'jgdm__options_page' );

}


function jgdm__settings_init(  ) { 

	register_setting( 'pluginPage', 'jgdm__settings' );

	add_settings_section(
		'jgdm__pluginPage_section', 
		__( 'Your section description', 'jgdm_wordpress_starter' ), 
		'jgdm__settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'jgdm__text_field_0', 
		__( 'Settings field description', 'jgdm_wordpress_starter' ), 
		'jgdm__text_field_0_render', 
		'pluginPage', 
		'jgdm__pluginPage_section' 
	);

	add_settings_field( 
		'jgdm__text_field_1', 
		__( 'Settings field description', 'jgdm_wordpress_starter' ), 
		'jgdm__text_field_1_render', 
		'pluginPage', 
		'jgdm__pluginPage_section' 
	);

	add_settings_field( 
		'jgdm__text_field_2', 
		__( 'Settings field description', 'jgdm_wordpress_starter' ), 
		'jgdm__text_field_2_render', 
		'pluginPage', 
		'jgdm__pluginPage_section' 
	);


}


function jgdm__text_field_0_render(  ) { 

	$options = get_option( 'jgdm__settings' );
	?>
	<input type='text' name='jgdm__settings[jgdm__text_field_0]' value='<?php echo $options['jgdm__text_field_0']; ?>'>
	<?php

}


function jgdm__text_field_1_render(  ) { 

	$options = get_option( 'jgdm__settings' );
	?>
	<input type='text' name='jgdm__settings[jgdm__text_field_1]' value='<?php echo $options['jgdm__text_field_1']; ?>'>
	<?php

}


function jgdm__text_field_2_render(  ) { 

	$options = get_option( 'jgdm__settings' );
	?>
	<input type='text' name='jgdm__settings[jgdm__text_field_2]' value='<?php echo $options['jgdm__text_field_2']; ?>'>
	<?php

}


function jgdm__settings_section_callback(  ) { 

	echo __( 'This section description', 'jgdm_wordpress_starter' );

}


function jgdm__options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>JGDM Development Plugin</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
