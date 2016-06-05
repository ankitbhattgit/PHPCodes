<?php
//This is plugin header
/*
Plugin Name:My Plugin
Description:A plugin alternative to the boring hello world
Author:Ankit
*/
?>
<?php
function myplugin_admin_section()
        {
        	//first argument is the title of the page ,
        	//second aregument is the name shown in the dashboard,
        	//third argument is the capability,
        	//the fourth argument is the menus slug , here we are using the magic constant which gives us the file name of the plugin file,
        	//the fifth argument is the function that will display the menu page
        	add_options_page('MyPlugin','My Plugin','manage_options',__FILE__,'myplugin_admin');
        }

add_action('admin_menu','myplugin_admin_section');

function myplugin_admin()
{
?>
            <div class="wrap">
            <h4>Amore interesting hello world plugin</h4>
            <h3>This plugin will search database for all draft posts and display their
            title and ID.</h3>
            <form action="" method="POST">
            <select name="post_value">
            	<option value="published">Published</option>
            	<option value="draft">Draft</option>
            </select>
            <input type="submit" name="search_draft_posts" value="search"
            class="button-primary"/>
            </form>
            <table class="widefat">
            <thead>
	<tr>
		<th>Post Title</th>
		<th>Post ID</th>
                    </tr>
                    </thead>
                    <tfoot>
                    	<tr>
                    		<th>Post Title</th>
                    		<th>Post ID</th>
                    	</tr>
                    </tfoot>
                    <tbody>
                	<?php
                	echo $_POST['post_value'];
                	global $wpdb;
                	//$mytestdrafts=array();

                //empty(var)
                	$value=get_option('myplugin_posts');
                if(empty($value))
                        {
                        	echo "database";
                        	echo $value=get_option('myplugin_posts');
        //$myposts=$wpdb->get_results("SELECT ID,post_title FROM $wpdb->posts WHERE post_type='post' AND post_status='publish'");
        //print_r($myposts);
                         update_option('myplugin_posts',$myposts);
                        }

//elseif (isset($_POST['search_draft_posts']) AND (isset($_POST['post_value'])=='published') AND get_option('myplugin_posts'))
        else
        {
	if(isset($_POST['post_value'])=='published')
                {
                	//echo "options";
                	$myposts=get_option('myplugin_posts');
                	foreach ($myposts as $mypost) {
                		?>
                <tr>
                	<?php
                	echo "here is list of published posts";
                	echo "<td>". $mypost->post_title."</td>";
                	echo "<td>". $mypost->ID."</td>";
                	?>
                </tr>
                <?php
                }
            }
        }
?>


<?php

	$draft=get_option('myplugin_drafts');
            if(empty($draft))
            {
            	echo "database";
            $mydrafts=$wpdb->get_results("SELECT ID,post_title FROM $wpdb->posts WHERE post_type='post' AND post_status='draft'");
            //print_r($myposts);
            update_option('myplugin_drafts',$mydrafts);
            }

          if (isset($_POST['search_draft_posts']) AND (isset($_POST['post_value'])=='draft') AND get_option('myplugin_drafts'))
            {
            	echo $_POST['post_value'];
            	//echo "options";
            	$mydrafts=get_option('myplugin_drafts');
            	echo "here is list of draft";
            	foreach ($mydrafts as $mydraft) {
            ?>
        <tr>
        	<?php

        	echo "<td>". $mydraft->post_title."</td>";
        	echo "<td>". $mydraft->ID."</td>";
        	?>
        </tr>
    <?php
    }
}
?>
    </tbody>
  </table>
</div>
<?php
}
?>