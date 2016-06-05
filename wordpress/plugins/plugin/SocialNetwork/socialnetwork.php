<?php
//This is plugin header
/*
Plugin Name:Social Network
Description:A plugin for providing links to social networks
Author:Ankit
*/
?>

<?php
class social_networks extends WP_Widget
{
	//this is a constructor
	function social_networks()
	{
      $widget_options=array(
      	'classname' => 'social_networks',
      	'description' => __('Displays links to social network')
      	);
  // here we are calling the parent constructor
  parent::WP_Widget('social_networks','Social Network links',$widget_options);

	}
	//used for displaying info in the sidebar
	function widget($args,$instance)
	{
	//EXTR_SKIP takes all the argument passed to the widget and then
		// it is going to seperate them into their own local variable
    extract($args,EXTR_SKIP);
    $title=($instance['title']) ? $instance['title'] : 'Follow Me';
    $facebook= ($instance['facebook']) ? $instance['facebook'] : 'ankitbhatt1';
    $twitter= ($instance['twitter']) ? $instance['twitter'] : 'ankitbha8t';
        ?>
<?php
 echo $before_widget;
 echo $before_title.$title.$after_title;
 ?>
 <?php
$fb_icon=plugins_url('images/fb.png',__FILE__);
$twitter_icon=plugins_url('images/tw.png',__FILE__);
$linkdin_icon=plugins_url('images/in.png',__FILE__);
$pinterest_icon=plugins_url('images/pi.png',__FILE__);
?>
<a href="http://www.twitter.com/<?php echo $twitter;?>">
<img src="<?php echo $twitter_icon; ?>" height="50px" width="50px"></a>

<a href="http://www.facebook.com/<?php echo $facebook;?>">
<img src="<?php echo $fb_icon; ?>" height="50px" width="50px"></a>

<?php echo $after_widget; ?>

<?php
      	}
	function update($new_instance,$old_instance)
	{
		$instance=$old_instance;
		$instance['title']=strip_tags($new_instance['title']);
		$instance['facebook']=strip_tags($new_instance['facebook']);
		$instance['twitter']=strip_tags($new_instance['twitter']);

	}
	function form($instance)
	{

   $default= array(
   	'title' => 'Follow Me',
    'facebook'=>'ankitbhatt1',
    'twitter'=>'ankitbha8t'
   	 );

$instance=wp_parse_args(( array)$instance,$defaults);
$title=$instance['title'];
$facebook=$instance['facebook'];
$twitter=$instance['twitter'];
?>

<p>Title: <input class="sociallinks" name="<?php echo $this->get_field_name('title');?> "
type="text" value="<?php echo esc_attr($title); ?>" /> </p>

<p>Facebook ID: <input class="sociallinks" name="<?php echo $this->get_field_name('facebook');?> "
type="text" value="<?php echo esc_attr($facebook); ?>" /> </p>

<p>Twitter ID: <input class="sociallinks" name="<?php echo $this->get_field_name('twitter');?> "
type="text" value="<?php echo esc_attr($twitter); ?>" /> </p>

<?php
  }
}

function social_networks_init()
{
	register_widget('social_networks');
}
add_action('widgets_init','social_networks_init');
?>