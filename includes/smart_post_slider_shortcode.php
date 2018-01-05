<?php

 //shortcode
   function smart_post_slider_shortcode($atts, $content = null){
  
   global $post;
   $atts = shortcode_atts(array(
       'count'=> 10,
       'category'=> 'all',
   	),$atts);

       if($atts['category']=='all'){
       	$terms = '';
       }else{
       	$terms = array(
            array(
          'taxonomy'=>'category',
          'field'=>'slug',
          'terms'=>$atts['category'],
            	),
       		);
       } 
       
    
        if($atts['count']== 'all'){
       	$count= '';
       }else{
       	$count= $atts['count'];
       }

				// WP_Query arguments
				$args = array (
					'post_type' => array( 'post' ),
					'posts_per_page'=>$atts['count'],
                'tax_query'=>$terms
				);

         $slider = new WP_Query($args);

       if($slider->have_posts()){
       	echo '<div id="slider">';
       	while($slider->have_posts()):$slider->the_post(); ?>
				 <div class="item">
					<div class="owl-content">
				 	<?php the_post_thumbnail('slide-image'); ?>
       		<h4 class="owl-header text-center"><a href="<?php the_permalink(); ?>">
       		<?php if(get_option('title')==1){ ?>
       			<?php the_title(); ?>
       				<?php } ?>
       			</a></h4> 
					</div>
				</div>

             <?php
       endwhile;

       	echo '</div>'; 
       }else{
       	return '<p>No Slider</p>';
       } 
}
add_shortcode( 'post_slider', 'smart_post_slider_shortcode');
