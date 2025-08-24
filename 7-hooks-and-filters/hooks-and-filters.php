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
public static function foot() {
echo "Thanks for visiting my site";
}

public static function tit($title) {
if(!is_admin()) {
return "🔥".$title;
}
return $title;
}

}

add_action('wp_footer',array (new handf(),'foot'));
add_filter('the_title',array (new handf(),'tit'));




function ac() {
$msg= apply_filters('custom_hc','Filter inside the Action');
echo "$msg";
}
add_action('wp_head','ac');

function kc($msg) {
return $msg;
}

add_filter('custom_hc', 'kc');



add_filter('the_content', 'bc');
function bc($content) {
ob_start();
do_action('mca');
$extra = ob_get_clean();
return $extra . $content;
}

function zx() {
echo "Action inside the filter";
}
add_action('mca','zx');