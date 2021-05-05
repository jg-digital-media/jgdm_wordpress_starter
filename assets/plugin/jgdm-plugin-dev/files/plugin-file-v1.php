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
$plugin_styling = plugins_url( 'app.css', 'jgdm-plugin-dev.php' );
$plugin_script = plugins_url( 'app.js', 'jgdm-plugin-dev.php' );
//returns full URL to myscript.js, such as example.com/wp-content/plugins/myplugin/myscript.js.



wp_enqueue_script( 'jgdm_plugin_script', $plugin_script, false, false, false );
wp_enqueue_style( 'jgdm_plugin_stylesheet', $plugin_styling, false, false, false );


//activate plugin
function activate_jgdm_plugin() {

    //add_option( 'Activated_Plugin', 'Plugin-Slug' );
  
    /* activation code here */
    var_dump("activation function");
}
  
register_activation_hook( 'activate_jgdm-plugin-dev.php', 'activate_jgdm_plugin' );


//deactivate plugin
function deactivate_jgdm_plugin() {

    //add_option( 'Activated_Plugin', 'Plugin-Slug' );

    /* activation code here */
    var_dump("deactivation function");
}
  
register_activation_hook( 'deactivate_jgdm-plugin-dev.php', 'deactivate_jgdm_plugin' );


//hook to uninstall plugin
function jgdm_uninstall_plugin(){
    //register_uninstall_hook( 'jgdm-plugin-dev', 'jgdm_uninstall_plugin' );
    var_dump("uninstall function");
}

register_uninstall_hook('jgdm-plugin-dev', 'jgdm_uninstall_plugin');


/*********
Main Plugin functionality
*********/


//Creating a Settings Page for a plugin.

function plugin_menu_link() {

	add_menu_page(
        'Message from the Author',    //plugin page title text
        'Message from Author', // plugin menu text
        'administrator', //capability - wordpress user role
        'menu_message',   //plugin_slug
        'my_plugin_settings_page',   //function call for plugin
        'dashicons-admin-generic'   //file path to plugin icon
    );

    //add settings section
    add_settings_section( 
        'string $id', 
        'string $title', 
        'callable $callback', 
        'string $page' );

    //register the plugin settings
    register_setting( 'this_is_a_settings_field_group', 'field_name' );
	register_setting( 'this_is_a_settings_field_group', 'field_phone' );
	register_setting( 'this_is_a_settings_field_group', 'field_email' );

}


add_action('admin_menu', 'plugin_menu_link');

function my_plugin_settings_page() {

    // plugin content
    register_setting('jgdm_option_group', 'field_name_one'); 

    settings_fields( 'this_is_a_settings_field_group' ); 

    echo "<h1>Message</h1>";

    echo "<img src=\"#\" alt=\"alt\" title=\"title\" />";

    echo "<p>Thank you for using my plugin.</p>";

    
    //get form html
    //require("form.php");


    //save settings
    submit_button(); 

}





/* //Run the plugin
function run_jgdm_dev_plugin() {

	$plugin = new Plugin_Name();
	$plugin->run();

}

run_jgdm_dev_plugin();
 */


 /**
  * 
  * Links - 

  http://wpsettingsapi.jeroensormani.com/

  *