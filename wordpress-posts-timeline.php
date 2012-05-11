<?php
/*
	Plugin Name: WordPress Posts Timeline
<<<<<<< HEAD
<<<<<<< HEAD
	Plugin URI: http://wordpress.org/extend/plugins/wordpress-posts-timeline
	Description: Outputs WordPress posts in a vertical timeline
	Author: Wylie Hobbs
	Version: 1.0
	Author URI: http:/hackbits.com/demos/wordpress-posts-timeline
=======
	Plugin URI: http://wordpress.org/extend/plugins/
=======
	Plugin URI: http://hackbits.com/plugins/wp-posts-timeline
>>>>>>> added short code function
	Description: Outputs WordPress posts in a vertical timeline
	Author: Wylie Hobbs
	Version: 0.2
	Author URI: http:/hackbits.com
>>>>>>> Initial Commit
	Text Domain: wordpress-posts-timeline
	Domain Path: /lang
 */
 
<<<<<<< HEAD
<<<<<<< HEAD
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : wylie@hackbits.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//example usage: [wp-timeline cat="5" date='F j, Y' show="15"] - show 15 posts in category-ID 5 with date format May 1, 2012
function timeline_shortcode($atts){
	$args = shortcode_atts( array(
      'cat' => '0',
      'type' => 'post',
      'show' => 5,
      'date' => 'Y',
      'length' => 100,
      'images' => 'no'
     ), $atts );
     
     return display_timeline($args);
 }
 
add_shortcode('wp-timeline', 'timeline_shortcode');

//display the timeline
function display_timeline($args){

	$post_args = array(
			'post_type' => $args['type'],
			'numberposts' => $args['show'],
			'category' => $args['cat'],
=======
 
function display_timeline($atts, $content = null){
	extract( shortcode_atts( array(
=======
//example usage: [wp-timeline cat="5" date='F j, Y' show="15"] - show 15 posts in category-ID 5 with date format May 1, 2012
function timeline_shortcode($atts){
	$args = shortcode_atts( array(
>>>>>>> added short code function
      'cat' => '0',
      'type' => 'post',
      'show' => 5,
      'date' => 'Y'
     ), $atts );
     
     return display_timeline($args);
 }
 
add_shortcode('wp-timeline', 'timeline_shortcode');

<<<<<<< HEAD
	$args = array(
			'post_type' => $type,
			'numberposts' => $show,
			'category' => $cat,
>>>>>>> Initial Commit
=======
function display_timeline($args){

	$post_args = array(
			'post_type' => $args['type'],
			'numberposts' => $args['show'],
			'category' => $args['cat'],
>>>>>>> added short code function
			'orderby' => 'post_date',
			'order' => 'ASC',
			'post_status' => 'publish'
		);

	
<<<<<<< HEAD
<<<<<<< HEAD
		$posts = get_posts( $post_args );
		echo '<div id="timeline">';
		echo '<ul>';
		foreach ( $posts as $post ) : setup_postdata($post);

	        echo '<li><div>';
	            echo '<h3 class="timeline-date">';
				echo get_the_time($args['date'], $post->ID);
				echo '</h3>';
				if ( $args['images'] == 'yes' ){
					if ( featured_image() == true && has_post_thumbnail( $post->ID ) ){
						echo '<span class="timeline-image">' . get_the_post_thumbnail( $post->ID, 'timeline-thumb' ) . '</span>';
					}
				}
				echo timeline_text($args['length']);
				echo '</div></li>';
=======
		$posts = get_posts( $args );
=======
		$posts = get_posts( $post_args );
>>>>>>> added short code function
		echo '<div id="timeline">';
		echo '<ul>';	
		foreach ( $posts as $post ) : setup_postdata($post);

	        echo '<li><div>';
	        
	                echo '<h3>';
	                the_time($args['date']);
	                echo'</h3>';
	                echo '<p>'.$post->post_content.'</p>';
	        
	        echo '</div></li>';
>>>>>>> Initial Commit

    	endforeach;

		echo '</ul>';
		echo '</div> <!-- #timeline -->';
		wp_reset_postdata();
}

<<<<<<< HEAD
<<<<<<< HEAD
//trim text function
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

//is shortcode active on page? if so, add styles to header
function has_timeline_shortcode( $posts ) {

        if ( empty($posts) )
            return $posts;

        $shortcode_found = false;

        foreach ($posts as $post) {

            if ( !( stripos($post->post_content, '[wp-timeline') === false ) ) {
                $shortcode_found = true;
                break;
            }
        }

        if ( $shortcode_found ) {
            add_timeline_styles();
        }
        return $posts;
    }

add_action('the_posts', 'has_timeline_shortcode');

//add styles to header
function add_timeline_styles(){
	add_action('wp_print_styles', 'timeline_styles');
}
function timeline_styles(){

		wp_register_style($handle = 'timeline', $src = plugins_url('css/timeline.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');
		wp_enqueue_style('timeline');
}


//check featured image theme support, add
function featured_image(){
	if ( !current_theme_supports( 'post_thumbnails' ) ) {
		if ( function_exists( 'add_theme_support' ) ) { 
			
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'timeline-thumb', 80, auto ); //300 pixels wide (and unlimited height)
			return true;
		}
	}
	else{
		
		add_image_size( 'timeline-thumb', 80, auto ); //300 pixels wide (and unlimited height)
		return true;
	}

}
add_filter('get_the_content', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');
=======
add_shortcode('wp-timeline', 'display_timeline');

=======
>>>>>>> added short code function
function timeline_scripts() 
{

	wp_register_style($handle = 'timeline', $src = plugins_url('css/timeline.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');
	wp_enqueue_style('timeline');
}

add_action ('wp_enqueue_scripts', 'timeline_scripts');

>>>>>>> Initial Commit
?>