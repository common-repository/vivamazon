<?php
/*
Plugin Name: Vivamazon
Plugin URI: http://steamsigs.com    
Description: A brief description of the Plugin.
Version: 1.0
Author: Gayan Mudalige
Author URI: http://mudali.blogspot.com
License: GPL2
*/
?>
<?php
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
register_activation_hook( __FILE__, 'vivamazon_install' );
add_action('admin_menu', 'vivamazon_plugin_menu');

function vivamazon_plugin_menu() {
  add_options_page('Vivamazon Options', 'Vivamazon', 'manage_options', 'vivamazon-general', 'vivamazon_plugin_options');
}

function vivamazon_plugin_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
  
  include 'vivamazon_admin.php';
}

function vivamazon_install()
{
   global $wpdb;
   $table_name = $wpdb->prefix."vivamazon_main";
   
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
   	return 0;
   }
   
   $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  asin VARCHAR(15) NOT NULL,
	  post mediumint(5) DEFAULT '0' NOT NULL,
	  last_update bigint(11) DEFAULT '0' NOT NULL,
	  UNIQUE KEY id (id)
	);";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
?>