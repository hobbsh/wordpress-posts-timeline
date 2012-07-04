<?php
/* CURRENT OPTIONS:

timeline_post_category - select post category from current category dropdown
timeline_post_type - select post type from post type dropdown
timeline_show_posts - input integer for number of posts to show
timeline_date_format - select from date formats dropdown
timeline_text_length - input integer for timeline text length
timeline_include_images - select 'yes' or 'no' from dropdown
timeline_order_posts - select ASC or DESC for post output order

*/

//returns assoc array of all categories
function timeline_get_categories(){

	$cats = get_categories();
	$categories = array();
	
	$i = 0;
	
	foreach($cats as $cat) {
  		$categories[$cat->cat_name] = $cat->cat_ID;
	}	
	
    return $categories;
    
}

//returns assoc array of output date and corresponding PHP the_date() format
function timeline_date_formats(){
		$date_formats = array(
			'March 10, 2012' => 'F j, Y',
			'03.10.2012' => 'm.d.y',
			'2012' => 'Y',
			'March, 2012' => 'F, Y'
		);
		
		return $date_formats;
			
}

//returns all registered post types
function timeline_get_post_types(){
	$post_types = get_post_types('','names'); 
	
	return $post_types;
}

/*set options

each option needs a name, default value, description, and input_type (dropdown or text)
dropdown options need a data field that takes a single dimensional associative array as its value

*/
function set_options(){
	
	$cat_data = timeline_get_categories();
	$post_type_data = timeline_get_post_types();
	$date_data = timeline_date_formats();
	
	$options = array(
		'post_category' => array ( //option 'slug'
			'name' => 'timeline_post_category', 
			'default' => '0', 
			'desc' => 'Select a post category for your timeline:', 
			'input_type' => 'dropdown', 
			'data' => $cat_data //data should be single dimensional assoc array
			),
		'post_type' => array ( 
			'name' => 'timeline_post_type' , 
			'default' => 'post', 
			'desc' => 'Select the post type', 
			'input_type' => 'dropdown', 
			'data' => $post_type_data
			),
		'show_posts' => array ( 
			'name' => 'timeline_show_posts', 
			'default' => '5', 
			'desc' => 'How many posts do you want to show?', 
			'input_type' => 'text'
			),
		'date_format' => array (
			'name' => 'timeline_date_format' , 
			'default' => 'F j, Y', 
			'desc' => 'What date format do you want to use?', 
			'input_type' => 'dropdown', 
			'data' => $date_data
			),
		'text_length' => array ( 
			'name' => 'timeline_text_length' , 
			'default' => 10, 
			'desc' => 'How many words do you want to show for each post?', 
			'input_type' => 'text', 
			),
		'include_images' => array ( 
			'name' => 'timeline_include_images', 
			'default' => 'no', 
			'desc' => 'Do you want to include featured image thumbnails?', 
			'input_type' => 'dropdown', 
			'data' => array( //manual dropdown options
				'yes' => 'yes', 
				'no' => 'no')
				),
		'post_order' => array ( 
			'name' => 'timeline_order_posts' , 
			'default' => 'DESC', 
			'desc' => 'How do you want to order your posts?', 
			'input_type' => 'dropdown', 
			'data' => array(
				'Ascending' => 'ASC', 
				'Descending' => 'DESC') 
			)
	);

	return $options;
	
}

//create settings page
function wptimeline_settings() {
	?>
		<div class="wrap">	
			<h2><?php _e('Timeline Settings', WPTIMELINE_UNIQUE); ?></h2>
			<div id="timeline_quick_links">
				<?php /*include('inc/timeline_links.php'); */?>
			</div>
		<?php
		if (isset($_GET['updated']) && $_GET['updated'] == 'true') {
			?>
			<div id="message" class="updated fade"><p><strong><?php _e('Settings Updated', WPTIMELINE_UNIQUE); ?></strong></p></div>
			<?php
		}
		?>
			<form method="post" action="<?php echo esc_url('options.php');?>">
				<div>
					<?php settings_fields('timeline-settings'); ?>
				</div>
				
				<?php
					$options = set_options();
					
					?>
				<table class="form-table">
				<?php foreach($options as $option){ ?>
					<?php 
						//if option type is a dropdown, do this
						if ( $option['input_type'] == 'dropdown'){ ?>
							<tr valign="top">
				        		<th scope="row"><?php _e($option['desc'], WPTIMELINE_UNIQUE); ?></th>
				        			<td><select id="<?php echo $option['name']; ?>" name="<?php echo $option['name']; ?>">
				        					<?php foreach($option['data'] as $opt => $value){ ?>
												<option <?php if(get_option($option['name']) == $value){ echo 'selected="selected"';}?> name="<?php echo $option['name']; ?>" value="<?php echo $value; ?>"><?php echo $opt ; ?></option>
												<? } //endforeach ?>
										</select>
									</td>
					        </tr>
				    <?php 
				    	//if option type is text, do this
				    	}elseif ( $option['input_type'] == 'text'){ ?>
				    		<tr valign="top">
				        		<th scope="row"><?php _e($option['desc'], WPTIMELINE_UNIQUE); ?></th>
				        			<td><input id="<?php echo $option['name']; ?>" name="<?php echo $option['name']; ?>" value="<?php echo get_option($option['name']); ?>" />
									</td>
					        </tr>
			     <?php 
			     		
			     		}else{} //endif
			     		
			     	} //endforeach ?>
			        
			    </table>
			    <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Update', WPTIMELINE_UNIQUE); ?>" /></p>
			</form>
		</div>
	<?php
}

//register settings loops through options
function timeline_register_settings()
{
	$options = set_options(); //get options array
	
	foreach($options as $option){
		register_setting('timeline-settings', $option['name']); //register each setting with option's 'name'
		
		if (get_option($option['name']) === false) {
			add_option($option['name'], $option['default'], '', 'yes'); //set option defaults
		}
	}

	if (get_option('timeline_promote_plugin') === false) {
		add_option('timeline_promote_plugin', '0', '', 'yes');
	}

}
add_action( 'admin_init', 'timeline_register_settings' );


//add settings page
function timeline_settings_page() {	
	add_options_page('Timeline Settings', 'Timeline Settings', 'manage_options', WPTIMELINE_UNIQUE, 'wptimeline_settings');
}
add_action("admin_menu", 'timeline_settings_page');

?>