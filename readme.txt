=== WordPress Posts Timeline ===
Contributors: hobbsh
Donate Link: http://www.hackbits.com/
Tags: posts timeline, css timeline, vertical timeline, timeline
Requires at least: 3.1
Tested up to: 3.4.3 beta
<<<<<<< HEAD
Stable tag: 1.1
=======
<<<<<<< HEAD
Stable tag: `trunk`
=======
Stable tag: 1.1
>>>>>>> refs/heads/tags/1.1
>>>>>>> refs/heads/master
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

<<<<<<< HEAD
There are currently four date options on the settings page. If you wish to see more formats, please suggest one or edit the source yourself.
=======
The date is pulled from your posts published date. If you need to backdate, you can change it there. There are currently four date options on the settings page. If you wish to see more formats, please suggest one or edit the source yourself.
>>>>>>> refs/heads/master

== Screenshots ==

1. The timeline

== Changelog ==

= 1.1 =
* Added options page, all options now managed here, not through shortcode
* Updated custom text function to work with whole words instead of fragments (characters)


= 1.0 =
* Initial Release

== Upgrade Notice ==


== A brief Markdown Example ==

**Default Usage**

<<<<<<< HEAD
*[wp-timeline]*
Displays posts in post uncategorized category, showing 5 posts, 10 words per post, no images and year only date format.

Change default settings on the settings page.
=======
<<<<<<< HEAD
*[wp-timeline cat="5"]*
Display posts in post category "5" (category ID). If no category is specified, it will pull uncategorized posts.
>>>>>>> refs/heads/master


**SHORTCODES NO LONGER VALID**

* *cat* – specify a category ID, default is 0
* *show* – show a certain number of posts, default is 10
* *date* – specify a date format (see http://php.net > the_time()), default is year only
* *type* – specify a custom post type, default is post
* *length* – specify text length, default is 100 words
* *images* – output post’s featured image (yes or no), default is no
<<<<<<< HEAD
=======
=======
*[wp-timeline]*
Displays posts in post uncategorized category, showing 5 posts, 10 words per post, no images and year only date format.
>>>>>>> refs/heads/tags/1.1
>>>>>>> refs/heads/master

The date is from your post's published date - you can modify it to change your timeline date.

Change default settings on the settings page.


**SHORTCODE OPTIONS NO LONGER WORK - USE SETTINGS PAGE**
