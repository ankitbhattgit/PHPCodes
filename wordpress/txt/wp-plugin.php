



Get Your Most Popular Posts Without A Plug-In


 Just paste the following code anywhere in your theme files (for example, in sidebar.php). To change the number of displayed posts, simply change the "5" on line 3 to your desired number.


<h2>Popular Posts</h2>
<ul>
<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 5");
foreach ($result as $post) {
setup_postdata($post);
$postid = $post->ID;
$title = $post->post_title;
$commentcount = $post->comment_count;
if ($commentcount != 0) { ?>

<li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>">
<?php echo $title ?></a> {<?php echo $commentcount ?>}</li>
<?php } } ?>

</ul>






Display Related Posts... With Thumbnails


Simply paste this code after the the_content() function in your single.php file:


<?php
$original_post = $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
  echo '<h2>Related Posts</h2>';
  $first_tag = $tags[0]->term_id;
  $args=array(
    'tag__in' => array($first_tag),
    'post__not_in' => array($post->ID),
    'showposts'=>4,
    'caller_get_posts'=>1
   );
  $my_query = new WP_Query($args);
  if( $my_query->have_posts() ) {
    echo "<ul>";
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <li><img src="<?php bloginfo('template_directory'); ?>/timthumb/timthumb.php?src=<?php echo get_post_meta($post->ID, "post-img", true); ?>&h=40&w=40&zc=1" alt="" /><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile;
    echo "</ul>";
  }
}
$post = $original_post;
wp_reset_query();
?>





Display Your Most Popular Content In The Sidebar


<h2>Popular Posts</h2>
<ul>
<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 5");
foreach ($result as $post) {
setup_postdata($post);
$postid = $post->ID;
$title = $post->post_title;
$commentcount = $post->comment_count;
if ($commentcount != 0) { ?>
<li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>">

<?php echo $title ?></a> {<?php echo $commentcount ?>}</li>
<?php } } ?>
</ul>





Plug-In To Protect Your Blog From Malicious URL Requests


<?php
/*
Plugin Name: Block Bad Queries
Plugin URI: http://perishablepress.com/press/2009/12/22/protect-wordpress-against-malicious-url-requests/
Description: Protect WordPress Against Malicious URL Requests
Author URI: http://perishablepress.com/
Author: Perishable Press
Version: 1.0
*/

global $user_ID;

if($user_ID) {
  if(!current_user_can('level_10')) {
    if (strlen($_SERVER['REQUEST_URI']) > 255 ||
      strpos($_SERVER['REQUEST_URI'], "eval(") ||
      strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
      strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
      strpos($_SERVER['REQUEST_URI'], "base64")) {
        @header("HTTP/1.1 414 Request-URI Too Long");
	@header("Status: 414 Request-URI Too Long");
	@header("Connection: Close");
	@exit;
    }
  }
}
?>
