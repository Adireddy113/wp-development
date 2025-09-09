<?php
/*
Plugin Name: Sample CPT
Description: Learning how to create a custom post type.
Version: 1.0
Author: Adireddy
Text Domain: sample-cpt
*/

defined('ABSPATH') or die('No Access');


function cpt() {

register_post_type ( 'book', array (
'labels' => array (
'name' => 'Books',
'singular_name' => 'Book',
'add_new_item' => 'Add New Book',
'edit_item' => 'Edit Book'
),

'public' => true,
'has_archive' => true,
'menu_icon' => 'dashicons-video-alt2',
'supports' => array('title','editor'),
'rewrite' => array('slug'=>'books')
));
}

add_action('init', 'cpt');