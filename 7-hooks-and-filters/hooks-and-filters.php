<?php
/*
Plugin Name: Hooks and Filters
Description: This plugin helps to understand the hooks and filters from end to end.
Version: 1.0
Author: Adireddy
Text Domain: hooks-and-filters
*/

defined('ABSPATH') or die ('No Access');

class handf {
public function foot() {
echo "Thanks for visiting my site";
}

public function tit($title) {
if(!is_admin()) {
return "🔥".$title;
}
return $title;
}


}

function comeact() {
$myH = new handf();
$myH->foot();
}
add_action('wp_footer','comeact');

function comefil($title) {
$myH = new handf();
return $myH->tit($title);
}

add_filter('the_title','comefil');