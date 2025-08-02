<?php
/*
Plugin Name:Admin View
Description: This is a simple shortcode based plugin to display users in admin menu item.
Author:Adireddy
Version: 1.0
Text Domain: admin-view
*/

defined('ABSPATH') or die('You do not have access from here');

register_activation_hook(__FILE__,'av_table');

function av_table() {
global $wpdb;
$table_name = $wpdb->prefix .'menu_table';
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
id INT(10) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
)$charset_collate;";

require_once(ABSPATH .'wp-admin/includes/upgrade.php');
dbDelta($sql);
}

add_shortcode('admin_view_items', 'code_display');

function code_display() {
ob_start();
handle_form();
render_form();
return ob_get_clean();
}

function handle_form() {
global $wpdb;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uf_form'])) {
$sname= sanitize_text_field($_POST['uf_name']);
$semail =sanitize_email($_POST['uf_email']);

if(!empty($sname) && !empty($semail)) {
$table_name = $wpdb->prefix .'menu_table';
$wpdb->insert($table_name, [
'name' => $sname,
'email' => $semail
]);
echo '<h3>Data Submitted Successfully</h3>';
} 
else{
echo '<h3>Please fill all details properly</h3>';
}
}
}

function render_form() {

echo '<style>
form { 
text-align:center; 
}
h2 {
text-align: center;
}
h3 {
text-align:center;
}
</style>';

echo '<h2>User Details</h2>';
echo '<form method="post">
<label for="uf_name">Name</label><br>
<input type="text" id="uf_name" name="uf_name" required><br><br>
<label for="uf_email">Email</label><br>
<input type="email" name="uf_email" id="uf_email" required><br><br>
<input type="submit" value="submit" name="uf_form">
</form>';
}

add_action('admin_menu','adminf');

function adminf() {
add_menu_page('Form Submissions', 'Form Data', 'manage_options', 'uf_admin_page', 'uf_admin_page');
}

function uf_admin_page() {
echo '<h2>User Submissions</h2>';
global $wpdb;

$table_name=$wpdb->prefix .'menu_table';
$results=$wpdb->get_results("SELECT * FROM $table_name");

if(!empty($results)) {
echo '<table border="1" cellpadding="10" cellspacing="0">';
echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Submitted At</th></tr>';

foreach ($results as $row) {
echo '<tr>';
echo '<td>'.esc_html($row->id).'</td>';
echo '<td>'.esc_html($row->name) .'</td>';
echo '<td>'.esc_html($row->email) .'</td>';
echo '<td>'.esc_html($row->submitted_at) .'</td>';
echo '</tr>';
}
echo '</table>';
}
else 
{
echo '<p>No data to display</p>';
}
}