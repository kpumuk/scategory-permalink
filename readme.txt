=== sCategory Permalink ===
Contributors: kpumuk
Tags: category, permalink
Requires at least: 2.0.2
Tested up to: 2.8.2
Stable tag: 0.4.0

Plugin allows to select category which will be used to generate permalink on post edit page. Use custom permalink option %scategory%.

== Description ==

Permalink option of Wordpress <tt>%category%</tt> has one great limitation -- when this option is selected, Wordpress uses category with lowest ID for permalink generation. This plugin is intented to bypass Wordpress permalinks limitation and allows you to select category for permalink generation.

= Changelog =

* v0.4.0 (July 21, 2009)
  * Fixed not-found bug when /%year%/%scategory%/%posttitle% permalink used.
  * Fixed not-found bug when paged comments enabled (/comment-page-N).
  * JavaScript rewritten using jQuery library.
* v0.3.0 (April 4, 2008)
  * Fixed bug when pages was not found in Wordpress 2.5.
* v0.2.2 (May 20, 2007)
  * Sometimes radio buttons was not displayed (thanks to Vince Caughley and <a href="http://codeelements.com/">Sam Keen</a>).

== Installation ==

1. Download and unpack plugin files to <tt>wp-content/plugins/scategory-permalink</tt> directory.
2. Enable <strong>sCategory Permalink</strong> plugin on your <em>Plugins</em> page in <em>Site Admin</em>.
3. Go to the <em>Options/Permalinks</em> page in <em>Site Admin</em> and use <tt>%scategory%</tt> option in Custom text field (you can look <a href="http://codex.wordpress.org/Using_Permalinks">here</a> for other options). For example you could use <tt>/%scategory%/%postname%/</tt>.
4. Now on Write Post page near the categories checkboxes radio button will appear.

== Upgrade ==

1. Download and unpack plugin files to <tt>wp-content/plugins/scategory-permalink</tt> directory.
2. Go to the <em>Options/Permalinks</em> page in <em>Site Admin</em> and click <em>Save Changes</em> to re-generate permalinks.
3. Now on Write Post page near the categories checkboxes radio button will appear.

== Screenshots ==

1. Write Post page with sCategory Permalink enabled.
