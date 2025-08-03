## AJAX Form Plugin

This is a basic plugin I made to practice how **AJAX works** in WordPress


### What It Does

1. Shows a simple form with **Name** and ***Address**
2. When the user submits, it sends data using **jQuery AJAX**
3. WordPress receives it using `admin-ajax.php`
4. The PHP function handles the data and shows the result **without page reload**


### What I Learned

1. How to create a WordPress plugin
2. How to use jQuery to prevent form reload
3. How `admin-ajax.php` works in WordPress while sending a request
4. Using `add_action()` for both logged-in and guest users to run custom function registered with this action name
5. How PHP handles form data using `$_POST`


### Working Flow

1. User submits form
2. jQuery collects the data
3. AJAX sends data to `admin-ajax.php`
4. WordPress finds the action and runs the PHP function
5. PHP sends back result
6. Result is shown on the same page instantly

