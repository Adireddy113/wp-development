<?php
/*
Plugin Name: Custom Post Type Admin
Description: This is a simple CPT plugin maostly helps for admin to categorize the content
Version: 1.0
Author: Adireddy
Text Domain: custom-post-type-admin
*/

defined('ABSPATH') or die('u can not access this file from browser');

function cpta() {
register_post_type('movie',array(
'labels'=> array(
'name'=>'Movies',
'singular_name'=>'Movie',
'add_new_item'=>'Add New Movie',
'edit_item'=>'Edit Movie'
),

'public'=>true,
'has_archive'=>true,
'menu_icon'=>'dashicons-video-alt2',
'supports'=>array('title','editor'),
'rewrite'=>array('slug'=>'movies'),
));
}

add_action('init','cpta');

function meta_field() {
add_meta_box(
'smp_release_year_box',
'Release Year',
'smp_callback',
'movie',
'side',
'default'
);
}
add_action('add_meta_boxes','meta_field');

function smp_callback($post) {
$value=get_post_meta($post->ID,'_smp_release_year',true);

echo '<label for="smp_release_year">Year:</label>';
echo '<input type="number" id="smp_release_year" name="smp_release_year" value="'.esc_attr($value).'" />';
}

function smp_save($post_id) {
if(array_key_exists('smp_release_year',$_POST)) {
update_post_meta($post_id,'_smp_release_year', sanitize_text_field($_POST['smp_release_year'])
);
}
}
add_action('save_post','smp_save');