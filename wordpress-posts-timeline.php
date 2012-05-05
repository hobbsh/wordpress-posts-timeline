<?php
/*
	Plugin Name: WordPress Posts Timeline
	Plugin URI: http://wordpress.org/extend/plugins/
	Description: Outputs WordPress posts in a vertical timeline
	Author: Wylie Hobbs
	Version: 0.2
	Author URI: http:/hackbits.com
	Text Domain: wordpress-posts-timeline
	Domain Path: /lang
 */
 
 
function display_timeline($atts, $content = null){
	extract( shortcode_atts( array(
      'cat' => '0',
      'type' => 'post',
      'show' => 5,
      'date' => 'Y'
     ), $atts ) );

	$args = array(
			'post_type' => $type,
			'numberposts' => $show,
			'category' => $cat,
			'orderby' => 'post_date',
			'order' => 'ASC',
			'post_status' => 'publish'
		);

	
		$posts = get_posts( $args );
		echo '<div id="timeline">';
		echo '<ul>';	
		foreach ( $posts as $post ) : setup_postdata($post);

	        echo '<li><div>';
	        
	                echo '<h3>';
	                the_time($date);
	                echo'</h3>';
	                echo '<p>'.$post->post_content.'</p>';
	        
	        echo '</div></li>';

    	endforeach;

		echo '</ul>';
		echo '</div> <!-- #timeline -->';
		wp_reset_postdata();
}

add_shortcode('wp-timeline', 'display_timeline');

function timeline_scripts() 
{

	wp_register_style($handle = 'timeline', $src = plugins_url('css/timeline.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');
	wp_enqueue_style('timeline');
}

add_action ('wp_enqueue_scripts', 'timeline_scripts');

?>