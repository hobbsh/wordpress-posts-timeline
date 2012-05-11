=== WordPress Posts Timeline ===
Contributors: hobbsh
Donate Link: http://www.hackbits.com/
Tags: posts timeline, css timeline, vertical timeline, timeline
Requires at least: 3.1
Tested up to: 3.4.3 beta
Stable tag: `trunk`
License: GPLv2

Output your WordPress posts or custom post types as a timeline with a few options.

== Description ==

The WordPress Posts Timeline Plugin uses only css to create a vertical timeline for a post category or custom taxonomy. The CSS is very flexible so it should look good in small or large sizes. 

It will pull uncategorized posts by default.

== Installation ==

1. Unzip `wordpress-posts-timeline.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use shortcode [wp-timeline] in page or template to display timeline.
4. See 'other notes' for syntax options

== Frequently Asked Questions ==

= How do I change the date format? =

To change the date format (maybe to use a MM DD, YYYY format), pass the appropriate PHP the_time() syntax in the shortcode with the **date** option. See usage for more details.


== Screenshots ==


== Changelog ==



= 1.0 =
* Initial Release

== Upgrade Notice ==


== A brief Markdown Example ==

**Default Usage**

*[wp-timeline cat="5"]*
Display posts in post category "5" (category ID). If no category is specified, it will pull uncategorized posts.


**Other Options**

* *cat* – specify a category ID, default is 0
* *show* – show a certain number of posts, default is 10
* *date* – specify a date format (see http://php.net > the_time()), default is year only
* *type* – specify a custom post type, default is post
* *length* – specify text length, default is 100 words
* *images* – output post’s featured image (yes or no), default is no

**Change date format** - 

*[wp-timeline cat="5" date='F j, Y']*
Timeline dates will show up like "April 20, 2012"

**Show more posts**

*[wp-timeline cat="5" date='F j, Y' show="15"]*
Show 15 posts in category 5. Use "-1" to show all.