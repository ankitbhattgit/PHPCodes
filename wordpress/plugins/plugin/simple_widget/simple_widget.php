<?php
/*
Plugin Name:Widget Plugin
Description:A simple widget plugin
Author:Ankit
*/
?>
<?php
class simple_widget extends WP_Widget
{
	function __construct()
	{
	parent::__construct(
//base id of widget 
		'simple_widget',
//widget name to appear in the ui
__('Simple Widget','simple_widget_domain'),
//widget description
array('description' => __('Sample widget','simple_widget_domain' ), )
);
}
//creating widget front end

public function widget($args,$instance)
{
	$title=apply_filters('widget_title',$instance['title']);
	echo $args['before_widget'];
	if(!empty($title))
		echo $args['before_title'].$title.$args['after_title'];
	echo __('hello world','simple_widget_domain');
		echo $args['after_widget'];
}

//widget backend


public function form($instance)
{
	if (isset($instance['title'])) {
		$title=$instance['title'];
	}
	else{
		$title= __('New title','simple_widget_domain');
//widget admin form
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>">
<?php _e('Title:'); ?>
</label>
<input class="widefat" id="<?php echo $this->get_field_id('title');?>" 
name="<?php echo $this->get_field_name('title');?>" type="text"
value="<?php echo esc_attr($title); ?>" />
</p>
<?php
}
// Updating widget replacing old instances with new
public function update($new_instance,$old_instance)
{
	$instance=array();
	$instance['title']=(!empty($new_instance['title'])) ?
    strip_tags($new_instance['title']) : '';
    return $instance;
}
}
//class ends here

//register and load widget

function simple_load_widget(){
	register_widget('simple_widget');
}
add_action('widget_init','simple_load_widget');
