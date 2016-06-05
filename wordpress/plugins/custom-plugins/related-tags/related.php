<?php
/*
Plugin Name: Related Posts(Tags)
Description: Show related posts based on tags
*/

function related_posts_tags(){

$orig_post= $post;
global $post;

$tags = wp_get_post_tags($post->ID); // to get tag name
//print_r($tags);
if ($tags) {
	$tag_ids = array();
	foreach ($tags as $individual_tag) $tag_ids[]= $individual_tag->term_id; // to get tag id
	$args = array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page' => 5,
		'caller_get_posts' => 1
		);
	$my_query = new wp_query($args);
	if($my_query->have_posts()) {
		echo '<div id="relatedposts"><h3>Related posts</h3><ul>';
		while($my_query -> have_posts()) {
			$my_query->the_post(); ?>
			<li><div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></div>
            <div><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
			</li>
		<?php } 
		echo '</ul></div>'; 
	}
} 
 $post= $orig_post;
 wp_reset_query();
}


add_shortcode('related_tags','related_posts_tags');

?>