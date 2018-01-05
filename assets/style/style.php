<?php 
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
 header('Content-type: text/css');
header('Cache-control: must-revalidate');

 ?>


#slider .item{
      margin: 3px;
    }

#slider .item img{
      display: block;
      width: 100%;
      height:<?php echo get_option('height'); ?>px;
    }
 
#slider .item{
  background: <?php echo get_option('bg_color'); ?>;
  padding: 30px 0px;
  margin: 10px;
  color: #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
}
.customNavigation{
  text-align: center;
}
//use styles below to disable ugly selection
.customNavigation a{
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

.owl-content{
	position: relative;
}
.owl-header{
	position: absolute;
	margin: 0;
	transition: .4s;
	width: 100%;
	bottom: -27px;

}

.owl-header a{
	color: #fff;
	width: 100%;
	background: rgba(0, 121, 72, 0.71);
	font-size: 24px;
	width: 100%;
	display: block;
	overflow:hidden;
	padding:5px;
}
.about_me{
	margin-top:5px
}