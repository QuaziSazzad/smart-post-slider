<?php
 // add script
if (is_admin()){
 function smart_post_slider_admin_script(){
 	wp_enqueue_style( 'wp-color-picker' ); 
 	wp_enqueue_script('wp-color-picker');
 	wp_enqueue_script('color', plugins_url().'/smart-post-slider/assets/js/color-picker.js');
 }
 add_action('admin_init','smart_post_slider_admin_script');
}
 function smart_post_slider_script(){
 	wp_enqueue_style('owlmain-css', plugins_url().'/smart-post-slider/assets/style/owl.carousel.css');
 	wp_enqueue_style('theme-css', plugins_url().'/smart-post-slider/assets/style/owl.theme.css');
 	wp_enqueue_style('style-css', plugins_url().'/smart-post-slider/assets/style/style.php');
 	wp_enqueue_script('owl-js',plugins_url().'/smart-post-slider/assets/js/owl.carousel.js',array('jquery'));
 }
 add_action('wp_head','smart_post_slider_script');

 

function smart_post_slider_scripts(){ ?>
   
     <script type="text/javascript">
       jQuery(document).ready(function() {
       jQuery("#slider").owlCarousel({
       autoPlay : <?php echo get_option('speed'); ?>,
	    items : <?php echo get_option('item'); ?>,
	    itemsCustom : false,
	    itemsDesktop : [1199,4],
	    itemsDesktopSmall : [980,3],
       itemsTablet: [768,2],
	    itemsTabletSmall: false,
	    itemsMobile : [479,1],
	    singleItem : <?php echo get_option('singleitem'); ?>,
	    itemsScaleUp : true,
	    slideSpeed : 200,
	    paginationSpeed : 800,
	    rewindSpeed : 1000,
	    stopOnHover : <?php echo get_option('stop'); ?>,
	    navigation :<?php echo get_option(' navigation'); ?> ,
	    navigationText : ["prev","next"],
	    rewindNav : true,
	    scrollPerPage : false,
	    pagination : <?php echo get_option('pagination'); ?>,
    	 paginationNumbers: <?php echo get_option('pnumber'); ?>,
    	  // Responsive 
    	 responsive: true,
	    responsiveRefreshRate : 200,
	    responsiveBaseWidth: window,
	     // CSS Styles
	    baseClass : "owl-carousel",
	    theme : "owl-theme",
	        //Lazy load
	    lazyLoad : false,
	    lazyFollow : true,
	    lazyEffect : "fade",
	    //Auto height
	    autoHeight : false,
	     
	      });
	     
	    });


    </script>
  

<?php  }
add_action('wp_footer','smart_post_slider_scripts');