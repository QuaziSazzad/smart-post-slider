<?php
/**
* Plugin Name:smart post slider
* Plugin URI:http://me.codeoner.com/
* Description: Smart  owl slider is a super responsive and very advance wordpress slider . You can easily control this slider.Here you'll get  many option to control your slider.It lets your add your latest blog post.
* Author: Quazi Sazzad
* Author URI: http://me.codeoner.com/
* Tested up to: 4.9.1
* Layers Plugin: True
* version:1.5
* Layers Required Version: 1.0
*License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * License: GPL2
 * text domain name:qsd_owl_slider
 * Copyright 2016  quazi sazzad  (email : qsazzad21@gmail.com, skype:quazisazzad)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
**/




if ( ! defined( 'ABSPATH' ) )
 exit;



define( 'SMART_POST_SLIDER_SLIDER_VER' , '1.5' );
define( 'SMART_POST_SLIDER_SLIDER_VER_DIR' , trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'SMART_POST_SLIDER_SLIDER_VERR_URI' , trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'SMART_POST_SLIDER_SLIDER_VER_FILE' , trailingslashit( __FILE__ ) );




require_once(plugin_dir_path(__FILE__).'/includes/smart_post_slider_script.php');
require_once(plugin_dir_path(__FILE__).'/includes/smart_post_slider_shortcode.php');

if(is_admin()){
require_once(plugin_dir_path(__FILE__).'/admin/smart_post_slider_admin_setting.php');

}



  
/**
 * Load plugin textdomain.
 */
add_action( 'plugins_loaded', 'smart_post_slider_textdomain' );

function smart_post_slider_textdomain() {
  load_plugin_textdomain( 'smart_post_slider', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
}


add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'smart_post_slider_settings_link' );
function smart_post_slider_settings_link( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=qsd-slider-settting') ) .'">Settings</a>';
   return $links;
}

 function active_smart_post_slider()
 {
 	add_option('speed', 2000);
 	add_option('item', 1);
 	add_option('singleitem', 'false');
 	add_option('stop', 'false');
 	add_option('bg_color', '#3fbf79');
 	add_option('height', 250);
 	add_option('pagination', 'true');
 	add_option('pnumber', 'false');
 	add_option('navigation', 'true');
 }
 register_activation_hook(__FILE__, 'active_smart_post_slider');
 

  
  function deactive_smart_post_slider()
  {
  	 delete_option('speed');
  	 delete_option('item');
  	 delete_option('singleitem');
  	 delete_option('stop');
  	 delete_option('bg_color');
  	 delete_option('height');
  	 delete_option('pagination');
  	 delete_option('pnumber');
  	 delete_option('navigation');
  }
 register_deactivation_hook(__FILE__, 'deactive_smart_post_slider');