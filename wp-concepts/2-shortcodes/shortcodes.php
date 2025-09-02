<?php
/*
Plugin Name: Shortcodes
Description: This plugin is designed to understand the creation and usage of shortcodes.
Version: 1.0
Author: Adireddy
Text Domain: shortcodes
*/

defined('ABSPATH') or die ('No Access');

function abc() {
return "Hi Everyone, This is Adireddy";
}
add_shortcode("static", "abc");



function cdf($atts) {
$atts = shortcode_atts(
array (
'name' => 'Adireddy',
'age' => 22,
),
$atts,
'greetings'
);

return "Hello "  . esc_html($atts['name']) . " Your Age is " . esc_html($atts['age']) . " as of now";
}

add_shortcode("greeting","cdf");