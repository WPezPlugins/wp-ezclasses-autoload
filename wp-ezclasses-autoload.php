<?php
/*
Plugin Name: WP ezClasses Autoload
Plugin URI: http://WPezClasses.com?source="plugin"
Description: "Wrapper" plugin to autoload the WP ezClasses framework. WP ezClasses (https://github.com/wpezclasses/) is growing collection of classes (and methods) architected and engineered to fulfill the needs of WordPress theme and plugin developers. 
Version: 0.5.0.0
Author: Mark Simchock for Alchemy United (http://AlchemyUnited.com)
Author URI: http://ChiefAlchemist.com?source="plugin"
License: MIT
*/


/** 
 * TODO
 *
 * TODO (@link http://)
 *
 * PHP version 5.3
 *
 * LICENSE: TODO 
 *
 * @package WP ezClasses
 * @author Mark Simchock <mark.simchock@alchemyunited.com>
 * @since 0.5.0
 * @license TODO
 */
 
/*
 * == CHANGE LOG == 
 *
 * == 18 March 2014 ==
 * --- removed: Commented out: add_action('activated_plugin', array(&$this, 'load_this_wp_plugin_first'));
 *
 * == 10 Jan 2014 ==
 * --- added: extends WP_ezClasses_Master_Singleton
 * --- added: class_alias('WP_ezClasses_Methods_Static', 'WP_ezMethods')
 */


if ( !defined('ABSPATH') ) {
	header('HTTP/1.0 403 Forbidden');
    die();
}

if ( ! class_exists('Class_WP_ezClasses_Master_Singleton')){
	require_once('class-wp-ezclasses-master-singleton/class-wp-ezclasses-master-singleton.php');
}

if ( ! class_exists('WP_ezClasses_Autoload')){
	class WP_ezClasses_Autoload extends Class_WP_ezClasses_Master_Singleton{
	
		private $_version;
		private $_url;
		private	$_path;
		private $_path_parent;
		private $_basename;
		private $_file;
		
		protected function __construct() {}
		
		public function ezc_init(){
		
			$this->_version = '0.5.0';
			$this->_url = plugin_dir_url( __FILE__ );
			$this->_path = plugin_dir_path( __FILE__ );
			$this->_path_parent = dirname($this->_path);
			$this->_basename = plugin_basename( __FILE__ );
			$this->_file = __FILE__ ;
		
			//	add_action('activated_plugin', array(&$this, 'load_this_wp_plugin_first'));
		
			spl_autoload_register(null, false);
		
			spl_autoload_extensions('.php');
			
			spl_autoload_register(array($this, 'wp_ezclasses_autoload'));
			
			if ( class_exists('Class_WP_ezClasses_ezCore_Methods_Static') && ! class_exists('WP_ezMethods')){
				class_alias('Class_WP_ezClasses_ezCore_Methods_Static', 'WP_ezMethods');
			}
			if ( class_exists('Class_WP_ezClasses_ezCore_Static_Helpers') && ! class_exists('WPezHelpers')){
				class_alias('Class_WP_ezClasses_ezCore_Static_Helpers', 'WPezHelpers');
			}
		}
	
		/*
		* IMPORTANT: The WP ezClasses library must load first.
		*
		* Thanks => (@link http://wordpress.org/support/topic/how-to-change-plugins-load-order)
		*/
		public function load_this_wp_plugin_first(){
		
			// get the key value for the 'active_plugins' array
			$this_plugin = plugin_basename(trim( __FILE__));
			// get the active plugins
			$active_plugins = get_option('active_plugins');
			// find current plugin within that array
			$this_plugin_key = array_search($this_plugin, $active_plugins);
			 // if it's 0 it's the first plugin already, no need to continue
			if ($this_plugin_key) {
				// remove the plugin from the array of actives
				array_splice($active_plugins, $this_plugin_key, 1);
				// and now add it back to the top
				array_unshift($active_plugins, $this_plugin);
				// update the option 'active_plugins'
				update_option('active_plugins', $active_plugins);
			}
		}
	
		/**
		 * (@link http://www.phpro.org/tutorials/SPL-Autoload.html)
		 *
		 * The classes naming convention allows us to parse the folder struture out of the class / file name. And then use that to define the $file for the require_once()
		 */
		private function wp_ezclasses_autoload($str_class){

			$str_class = trim(str_replace('_', '-', strtolower($str_class)));
			
			// we only want to autoload ezclasses (and myclasses)
			if ( strpos($str_class, 'class-wp-ezclasses-') === 0 ||  strpos($str_class, 'class-wp-myclasses-') === 0 ){
					
				if ( strpos($str_class, 'class-wp-ezclasses-') === 0 ){
					$int_offset = strlen('class-wp-ezclasses-');
					$str_main_folder = 'wp-ezclasses';
				} else {
					$int_offset = strlen('class-wp-myclasses-');
					$str_main_folder = 'wp-myclasses';
				}
			
				$int_pos_directory_lead_underscore = strpos($str_class, '-', $int_offset);
				$int_pos_directory_trail_underscore = strpos($str_class, '-', $int_pos_directory_lead_underscore) + 1;
		
				$str_directory_main = strtolower(substr( $str_class, $int_offset, ($int_pos_directory_lead_underscore - $int_offset) ));
			//	$str_directory_sub = strtolower(substr( $str_class, $int_pos_directory_trail_underscore, strlen($str_class) ));

				$str_filename = $str_class . '.php';
				$str_file =  rtrim($this->_path_parent,'/') . DIRECTORY_SEPARATOR . $str_main_folder . DIRECTORY_SEPARATOR . $str_directory_main . DIRECTORY_SEPARATOR . $str_class . DIRECTORY_SEPARATOR . $str_filename;
				
				// echo '<br> ' . $str_file;
				if ( ! file_exists($str_file)) {
					return false;
				}
							
				require ($str_file);
			}
			
		}
		
		public function get_version() {
			return $this->_version;
		}
	}
}
$init_wp_ezclasses_autoload = WP_ezClasses_Autoload::ezc_get_instance();
?>