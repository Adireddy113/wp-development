<?php
/*
Plugin Name: Single Input Database
Description: This is a single input form which stores the data in a database table and display form with help of shortcode.
Author: Adireddy
Version: 1.0
Text Domain: single-input-database
*/

defined('ABSPATH') or die('This doesnt work on browser');

register_activation_hook(__FILE__, 'si_table');

function si_table() {
global $wpdb;
$table_name=$wpdb->prefix . 'single_table';
$charset =$wpdb->get_charset_collate();

$sql ="CREATE TABLE $table_name (
id INT NOT NULL AUTO_INCREMENT,
input TEXT NOT NULL,
submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
)$charset;";

require_once(ABSPATH.'wp-admin/includes/upgrade.php');
dbDelta($sql);
}

add_shortcode('simple_input_form', 'si');

function si() {
ob_start();
form_handle();
return ob_get_clean();
}

function form_handle() {
global $wpdb;
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['my_form'])) {
$sinput=sanitize_text_field($_POST['input']);

if(!empty($sinput)) {
global $wpdb;
$table_name=$wpdb->prefix . 'single_table';
$wpdb->insert($table_name, ['input'=>$sinput]);

echo '<h3> Added successfully</h3>';
}
else {
echo '<h3>Enter the data</h3>';
}
}

echo '<style>
form {
text-align: center;
}
h3 {
text-align:center;
}

</style>';

echo '<form method="POST">
<label for="input">Enter something:</label><br><br>
<input type="text" name="input" id="input" required><br><br>
<input type="submit" name="my_form" value="Submit">
</form>';
    
}