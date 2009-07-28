=== sCategory Permalink ===
Contributors: kpumuk
Tags: category, permalink
Requires at least: 2.1.0
Tested up to: 2.8.2
Stable tag: 0.5.0

Plugin allows to select category which will be used to generate permalink on
post edit page. Use custom permalink option %scategory%.

== Description ==

Permalink option of Wordpress `%category%` has one great limitation –
when this option is selected, Wordpress uses category with lowest ID for
permalink generation. This plugin is intented to bypass Wordpress permalinks
limitation and allows you to select category for permalink generation.

== Installation ==

1. Download and unpack plugin files to the `wp-content/plugins/scategory-permalink`
   directory.
2. Enable **sCategory Permalink** plugin on your *Plugins* page in
   *Site Admin*.
3. Go to the *Options/Permalinks* page in *Site Admin* and use `%scategory%`
   option in *Custom text* field (you can look <a href="http://codex.wordpress.org/Using_Permalinks">here</a>
   for other options). For example you could use `/%scategory%/%postname%/`.
4. Now on Write Post page near the categories checkboxes radio button will
   appear.

= Upgrade =

1. Download and unpack plugin files to the `wp-content/plugins/scategory-permalink`
   directory.
2. Go to the *Options/Permalinks* page in *Site Admin* and click *Save Changes*
   to re-generate permalinks.
3. Now on Write Post page near the categories checkboxes radio button will
   appear.

== Frequently Asked Questions ==

= Every page on my site respond with 404 error =

Go to *Options/Permalinks* page in *Site Admin* and click *Save Changes* to
re-generate permalinks.

= First category is used for permalinks instead of selected =

Check the permalinks structure you used (*Options/Permalinks*). You should
use `%scategory%` instead of `%category%`.
 
== Screenshots ==

1. Write Post page with sCategory Permalink enabled.

== Changelog ==

= 0.5.0 (July 28, 2009) =
* Fixed problem with Subscribe2 plugin (thanks to <a href="http://www.synthgear.com/">Paul Wagorn</a>).
* Performance improvement (update meta tags only once per save).

= 0.4.0 (July 21, 2009) =
* Fixed not-found bug when `/%year%/%scategory%/%posttitle%` permalink used.
* Fixed not-found bug when paged comments enabled (`/comment-page-N`).
* JavaScript rewritten using jQuery library.

= 0.3.0 (April 4, 2008) =
* Fixed bug when pages was not found in Wordpress 2.5.

= v0.2.2 (May 20, 2007) =
* Sometimes radio buttons was not displayed (thanks to Vince Caughley and <a href="http://codeelements.com/">Sam Keen</a>).
