<?php
/*
Plugin Name: sCategory Permalink
Plugin URI: http://kpumuk.info/projects/wordpress-plugins/scategory-permalink/
Description: Plugin allows to select category which will be used to generate permalink on post edit page. Use custom permalink option <tt>%scategory%</tt> on <a href="options-permalink.php">Permalinks</a> options page.
Version: 0.4.0
Author: Dmytro Shteflyuk
Author URI: http://kpumuk.info/
*/
/*  Copyright 2006-2009  Dmytro Shteflyuk  (email: kpumuk@kpumuk.info)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/** Instance of plugin */
$sCategoryPermalink = new sCategoryPermalink();

/** Register plugin actions */

/** Admin pages */
add_action('admin_head', array(&$sCategoryPermalink, 'addOptions'));
add_action('admin_footer', array(&$sCategoryPermalink, 'addCurrentCategory'));

/** Filters */
add_filter('post_link', array(&$sCategoryPermalink, 'parseLink'), 10, 2);
add_filter('init', array(&$sCategoryPermalink, 'addRewriteRules'));
add_filter('post_rewrite_rules', array(&$sCategoryPermalink, 'setVerbosePageRules'));

/** Actions */
add_action('edit_post', array(&$sCategoryPermalink, 'savePost'));
add_action('publish_post', array(&$sCategoryPermalink, 'savePost'));
add_action('save_post', array(&$sCategoryPermalink, 'savePost'));

unset ($sCategoryPermalink);

/** sCategory plugin class */
class sCategoryPermalink {
  function parseLink($permalink, $post) {
    $rewritecode = array(
      '%scategory%',
    );

    if ('' != $permalink && 'draft' != $post->post_status) {
      $category = '';
      if (strstr($permalink, '%scategory%')) {
        $cat = null;
        $category_permalink = $post->ID ? get_post_meta($post->ID, '_category_permalink', true) : null;

        if ($category_permalink) $cat = get_category($category_permalink);
        if (!$cat) {
          $cats = get_the_category($post->ID);
          $cat = $cats[0];
        }

        $category = $cat->category_nicename;
        if ($parent=$cat->category_parent)
          $category = get_category_parents($parent, FALSE, '/', TRUE) . $category;
      }
      $rewritereplace = array(
        $category
      );
      return str_replace($rewritecode, $rewritereplace, $permalink);
    }
    return $permalink;
  }

  function addRewriteRules() {
    global $wp_rewrite;
    $wp_rewrite->add_rewrite_tag('%scategory%', '(.+?)', 'category_name=');
  }

  function setVerbosePageRules($post_rewrite) {
    global $wp_rewrite;
    if (preg_match("/^[^%]*%scategory%/", $wp_rewrite->permalink_structure) )
      $wp_rewrite->use_verbose_page_rules = true;

    return $post_rewrite;
  }

  function addOptions() {
    if ($this->isOnThePostPage()) {
      $url = plugins_url(basename(dirname(__FILE__)) . '/scategory_permalink.js');
      echo "<script type=\"text/javascript\" src=\"$url\"></script>\n";
    }
  }

  function addCurrentCategory() {
    if ($this->isOnThePostPage()) {
      global $post;

      $post_ID = $post->ID;
      $post_init = '';
      if ($post_ID) {
        $category_permalink = get_post_meta($post_ID, '_category_permalink', true);
        $post_init = 'var sCategoryPermalinkCurrent="' . $category_permalink . '";';
      }
      echo '<script type="text/javascript">' , $post_init , 'sCategoryPermalinkInit();</script>', "\n";
    }
  }

  function savePost($post_ID) {
    /* Modified by Caio Proiete on 2007-03-25.
     * Are we inside post.php or post-new.php?
     */
    if (!$this->isOnThePostPage()) return;

    $category_permalink = $_POST['category_permalink'];

    $post_category = function_exists('wp_get_post_categories') ? wp_get_post_categories($post_ID) : wp_get_post_cats('', $post_ID);
    if (isset($category_permalink)) {
      $found = false;
      foreach ($post_category as $cid)
        if ($cid == $category_permalink) {
          $found = true;
          break;
        }
      if (!$found) $category_permalink = $post_category[0];
    } else {
      $category_permalink = $post_category[0];
    }

    if (!update_post_meta($post_ID, '_category_permalink', $category_permalink))
      add_post_meta($post_ID, '_category_permalink',  $category_permalink, true);
  }

  function isOnThePostPage() {
    return strpos($_SERVER['REQUEST_URI'], '/post.php') || strpos($_SERVER['REQUEST_URI'], '/post-new.php');
  }
}

?>