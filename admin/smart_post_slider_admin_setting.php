<?php
 
  //add setting menu
	 add_action('admin_menu','smart_slider_setting');
	 function smart_slider_setting()
	 {
	 	add_menu_page( 'Smart Slider Setting', 'Smart Slider Setting', 'manage_options','qsd-slider-settting', 'smart_slider_menu_callback','dashicons-slides');
	 }
	 function smart_slider_menu_callback()
	 {
	 	if( isset( $_GET[ 'tab' ] ) ) 
	 	  {  
            $active_tab = $_GET[ 'tab' ];  
        } else 
        {
            $active_tab = 'one';
        }
	  ?>

		   <div class="wrap">
		       <h2>Smart Owl Slider Settings</h2>
		        <h4 style="background-color:#000;height:40px;"><p style="font-weight:bold;font-size:15px;color:orange;font-size:20px;padding:5px;text-align: center;"> Shortcode : [post_slider category="all" count="10"]</p></h4>
		         <?php settings_errors(); ?> 
		       
		       <h2 class="nav-tab-wrapper">  
		       <a href="?page=qsd-slider-settting&tab=one" class="nav-tab <?php echo $active_tab == 'one' ? 'nav-tab-active' : ''; ?>"><?php _e('General Settings', 'qsd_owl_slider'); ?></a>  
		       <a href="?page=qsd-slider-settting&tab=two" class="nav-tab <?php echo $active_tab == 'two' ? 'nav-tab-active' : ''; ?>"><?php _e('style Settings', 'qsd_owl_slider'); ?></a>  
		      </h2>  

		         <form method="post" action="options.php"> 
		         <?php
	             if( $active_tab == 'one' )
	              {  
	                settings_fields( 'general_setting_gruop' );
	                 do_settings_sections( 'qsd-slider-settting' );
	              } elseif( $active_tab == 'two' )
	              {
	                 settings_fields( 'style_setting_gruop' );
	                 do_settings_sections( 'qsd-slider-settting' );
	              }
		           ?>
					<?php submit_button(); ?> 
		        </form> 
			</div>
			 <?php
	}

	  add_action('admin_init','display_smart_slider_settings');
	  function display_smart_slider_settings()
	  {
	  	  register_setting( 'general_setting_gruop', 'title');
	  	  register_setting( 'general_setting_gruop', 'speed');
	  	  register_setting( 'general_setting_gruop', 'item');
	  	  register_setting( 'general_setting_gruop', 'singleitem');
	  	  register_setting( 'general_setting_gruop', 'stop');
	     register_setting( 'style_setting_gruop', 'bg_color');
	     register_setting( 'style_setting_gruop', 'height');
	     register_setting( 'style_setting_gruop', 'pagination');
	     register_setting( 'style_setting_gruop', 'pnumber');
	     register_setting( 'style_setting_gruop', 'navigation');

	     if(isset($_GET["tab"]))
	     {
	     	if($_GET["tab"] == "one")
	     	 {
	     	 	add_settings_section( 'general_section', ' ', 'general_section_calback', 'qsd-slider-settting');
	     	 	add_settings_field( 'titleid', 'Show Title', 'title_callback', 'qsd-slider-settting', 'general_section');
	     	 	add_settings_field( 'field_id', 'Sliding Speed', 'field_callback', 'qsd-slider-settting', 'general_section');
	     	 	add_settings_field( 'itemid', 'Slide Item', 'item_callback', 'qsd-slider-settting', 'general_section');
	     	 	add_settings_field( 'singelitma', 'Single Silde', 'singelitma_callback', 'qsd-slider-settting', 'general_section');
	     	 	add_settings_field( 'stopid', 'Stop On Hover', 'stopcallback', 'qsd-slider-settting', 'general_section');
	     	 }else
	     	 {
	     	 	add_settings_section( 'style_section', ' ', 'style_section_calback', 'qsd-slider-settting');
	     	 	add_settings_field('backgid','Background Color','bg_calback','qsd-slider-settting','style_section');
	     	 	add_settings_field('height','Image Height','height_calback','qsd-slider-settting','style_section');
	     	 	add_settings_field('pagination','Pagination','pagination_calback','qsd-slider-settting','style_section');
	     	 	add_settings_field('pnumber','Pagination Number','pnumber_calback','qsd-slider-settting','style_section');
	     	 	add_settings_field('navigation','Navigation','navigation_calback','qsd-slider-settting','style_section');
	     	 }
	     }
	     else
	     {
	     	add_settings_section( 'general_section', ' ', 'general_section_calback', 'qsd-slider-settting');
	    	add_settings_field( 'titleid', 'Show Title', 'title_callback', 'qsd-slider-settting', 'general_section');
	     	add_settings_field( 'field_id', 'Sliding Speed', 'field_callback', 'qsd-slider-settting', 'general_section');
	     	add_settings_field( 'itemid', 'Slide Item', 'item_callback', 'qsd-slider-settting', 'general_section');
	     	add_settings_field( 'singelitma', 'Single Silde', 'singelitma_callback', 'qsd-slider-settting', 'general_section');
	 		add_settings_field( 'stopid', 'Stop on hover', 'stopcallback', 'qsd-slider-settting', 'general_section');

	     }
	  }
  
    // general opton

		function title_callback()
	   { ?>
	  	<input name="title" type="checkbox" id="title" value="1" <?php checked('1',get_option('title'),true); ?>
          <p class="description">Show Slider title</p>
          <?php
      }

	  function field_callback()
	   {
	  	echo '<input type="text" name="speed" id="speed" value="'.get_option('speed').'" />
            <p class="description">Set Sliding speed In millisecond</p>';
      }

     function item_callback()
	  {
	  	echo '<input type="text" name="item" id="item" value="'.get_option('item').'" />
            <p class="description">How mutch sliding Item show in one page</p>';
     }

     function singelitma_callback()
	  { ?>
       <select type="text" name="singleitem" id="singleitem" >
       	 <option value="true" <?php echo (get_option('singleitem')=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo (get_option('singleitem')=='false') ? 'selected' : ''  ?>>false</option>	
       </select>
			<p class="description">Slide only one image</p>
	   <?php
     }

     function stopcallback()
	  { ?>
       <select type="text" name="stop" id="stop" >
       	 <option value="true" <?php echo (get_option('stop')=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo (get_option('stop')=='false') ? 'selected' : ''  ?>>false</option>	
       </select>
			<p class="description">Stop Slider on hover it</p>
	   <?php
     }

     //stilish option

	  function bg_calback()
	  {
	  echo '<input class="colorpicker" name="bg_color" type="text" id="bg_color" value="'.get_option('bg_color').'">
	    <p class="description">Background color for slider image</p>';
      }

     function height_calback()
	  {
	  echo '<input  name="height" type="text" id="height" value="'.get_option('height').'"> (px)
	    <p class="description">Set Slider image height</p>';
      }

     function pagination_calback()
	  {
	  ?>
       <select type="text" name="pagination" id="pagination" >
       	 <option value="true" <?php echo (get_option('pagination')=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo (get_option('pagination')=='false') ? 'selected' : ''  ?>>false</option>	
       </select>
			<p class="description">Show or Hide pagination icon</p>
	   <?php
      }

    function pnumber_calback()
	  {
	  ?>
       <select type="text" name="pnumber" id="pnumber" >
       	 <option value="true" <?php echo (get_option('pnumber')=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo (get_option('pnumber')=='false') ? 'selected' : ''  ?>>false</option>	
       </select>
			<p class="description">Show or Hide pagination Number</p>
	   <?php
      }

      function navigation_calback()
	  {
	  ?>
       <select type="text" name=" navigation" id=" navigation" >
       	 <option value="true" <?php echo (get_option(' navigation')=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo (get_option(' navigation')=='false') ? 'selected' : ''  ?>>false</option>	
       </select>

	   <?php
      }
    


	  function general_section_calback(){}
	  function style_section_calback(){}
	 
	  