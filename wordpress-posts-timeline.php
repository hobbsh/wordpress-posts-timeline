<?php
/*
	Plugin Name: WordPress Posts Timeline
	Plugin URI: http://hackbits.com/plugins/wp-posts-timeline
	Description: Outputs WordPress posts in a vertical timeline
	Author: Wylie Hobbs
	Version: 0.2
	Author URI: http:/hackbits.com
	Text Domain: wordpress-posts-timeline
	Domain Path: /lang
 */
 
//example usage: [wp-timeline cat="5" date='F j, Y' show="15"] - show 15 posts in category-ID 5 with date format May 1, 2012
function timeline_shortcode($atts){
	$args = shortcode_atts( array(
      'cat' => '0',
      'type' => 'post',
      'show' => 5,
      'date' => 'Y',
      'length' => 100
     ), $atts );
     
     return display_timeline($args);
 }
 
add_shortcode('wp-timeline', 'timeline_shortcode');

function display_timeline($args){

	$post_args = array(
			'post_type' => $args['type'],
			'numberposts' => $args['show'],
			'category' => $args['cat'],
			'orderby' => 'post_date',
			'order' => 'ASC',
			'post_status' => 'publish'
		);

	
		$posts = get_posts( $post_args );
		echo '<div id="timeline">';
		echo '<ul>';
		foreach ( $posts as $post ) : setup_postdata($post);

	        echo '<li><div>';
	            echo '<h3 class="timeline-date">';
				echo get_the_time($args['date'], $post->ID);
				echo '</h3>';
				echo timeline_text($args['length']);
				echo '</div></li>';

    	endforeach;

		echo '</ul>';
		echo '</div> <!-- #timeline -->';
		wp_reset_postdata();
}

function timeline_text($charlength){
	
	$raw_text = get_the_content('', true, '');

	if ( mb_strlen( $raw_text ) > $charlength ) {
		$subex = strip_tags(mb_substr( $raw_text, 0, $charlength - 5 ));
		return '<p>'.$subex.'</p>';
	}
	else{
		return '<p>'.$raw_text.'</p>';
	}
}


function timeline_scripts() 
{

	wp_register_style($handle = 'timeline', $src = plugins_url('css/timeline.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');
	wp_enqueue_style('timeline');
}

add_action ('wp_enqueue_scripts', 'timeline_scripts');
add_theme_support('post-thumbnails');
add_filter('get_the_content', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');
?>