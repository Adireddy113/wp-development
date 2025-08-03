<?php
/*
Plugin Name: AJAX Call Form
Description: This is a simple ajax call plugin which shows results instantly.
Version: 1.0
Author: Adireddy
Text Domain: ajax-call-form
*/

defined('ABSPATH') or die('U cant access this from browser');

add_shortcode('ajax_call', 'ac');

function ac() {
ob_start();
ajax_form();
return ob_get_clean();
}

function ajax_form() {
?>
<style>
form {
text-align: center;
}
h2 {
text-align: center;
}
</style>

<h2>Ajax Form Testing</h2>
<form id="ajax_form">
<label for="ac_name">Name</label><br>
<input type="text" id="ac_name" name="ac_name" required><br><br>
<label for="ac_address">Address</label><br>
<textarea id="ac_address" name="ac_address" rows="5" cols="30" required></textarea><br><br>
<input type="submit" value="Submit">
</form>

<div id="result" style="text-align:center; margin-top:10px;"></div>

<script>

jQuery(document).ready(function($) {
$('#ajax_form').on('submit',function(e) {
e.preventDefault();

$.ajax( {
url: '<?php echo admin_url("admin-ajax.php"); ?>',
type: 'POST',
data: {
action: 'ajax_handler',
name: $('#ac_name').val(),
address: $('#ac_address').val()
},
success: function(response) {
$('#result').html(response);
}
});
});
});
</script>
<?php
}

add_action('wp_ajax_ajax_handler', 'my_ajax_handler');
add_action('wp_ajax_nopriv_ajax_handler', 'my_ajax_handler');

function my_ajax_handler() {
$name=sanitize_text_field($_POST['name']);
$address=sanitize_textarea_field($_POST['address']);

echo "<strong>Name: </strong>$name<br><strong>Address: </strong> $address";
wp_die();
}