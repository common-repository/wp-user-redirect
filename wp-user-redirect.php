<?php
/**
 * Plugin Name:       WP User Redirect
 * Plugin URI:        https://duckdev.com
 * Description:       Plugin for redirecting non admin users from wp-admin pages and hide admin bar.
 * Version:           1.0.2
 * Author:            Joel James
 * Author URI:        https://duckdev.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die('Damn it.! Dude you are looking for what?');
}

function js_admin_redirect(){
    if( !current_user_can('activate_plugins') ){
        wp_redirect( get_bloginfo('wpurl') );
        exit;
    }
}
add_action('admin_init','js_admin_redirect');

function js_admin_hide(){
    if( !current_user_can('activate_plugins') ){
		show_admin_bar( false );
        exit;
    }
}
add_action('admin_init','js_admin_hide');
add_filter('show_admin_bar', '__return_false');
?>
