<?php
/*
Plugin Name: My Simple REST API
Description: A simple custom REST API example
Version: 1.0
Author: Adireddy
Text Domaon: my-simple-rest-api
*/

add_action('rest_api_init', function () {
register_rest_route('myplugin/v1', '/greet/', array(
'methods' => 'GET',
'callback' => function () {
return ['message' => 'Hello from REST API'];
}
));
});