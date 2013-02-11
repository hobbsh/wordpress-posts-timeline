=== WordPress Posts Timeline ===
Contributors: hobbsh
Donate Link: http://www.wyliehobbs.com/donate/
Tags: posts timeline, css timeline, vertical timeline, timeline
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.7
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

The date is pulled from your posts published date. If you need to backdate, you can change it there. There are currently four date options on the settings page. If you wish to see more formats, please suggest one or edit the source yourself.

== Screenshots ==

1. The timeline

== Changelog ==

= 1.7 =
* Changed set_options function name to timeline_set_options as it would break some installations
* Fixed more css bugs, re: alingment issues and clearfixes

= 1.5 =
* Added link to post option
* Fixed some CSS bugs and image issues

= 1.3 =
* Added link to post option
* Fixed some CSS bugs and image issues

= 1.2 = 
* Add post sort option

= 1.1 =
* Added options page, all options now managed here, not through shortcode
* Updated custom text function to work with whole words instead of fragments (characters)


= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.7 =
* Changed set_options function name to timeline_set_options as it would break some installations
* Fixed more css bugs, re: alingment issues and clearfixes

= 1.3 =
Made some changes to CSS to fix some styling and image issues. You can also now add a link to the post on the timeline. 

= 1.2 = 
Added post sort option, please update to obtain this feature.

= 1.1 = 
Added options page and fixed core functionality. Shortcodes are simplified to [wp-timeline], options managed through settings page.

== A brief Markdown Example ==

**Default Usage**

*[wp-timeline]*
Displays posts in post uncategorized category, showing 5 posts, 10 words per post, no images and year only date format.

The date is from your post's published date - you can modify it to change your timeline date.

Change default settings on the settings page.


**SHORTCODE OPTIONS NO LONGER WORK - USE SETTINGS PAGE**
