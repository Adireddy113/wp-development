# Admin View – WordPress Plugin

The plugin adds a new menu item in the WordPress admin sidebar called **Form Data** When clicked, it opens a page where you can see the data stored in a custom table in the WordPress database

## Features

1. Adds a new admin menu page.
2. Displays stored values from a custom table
3. Only admin users can access the page
4. Data is shown in a simple HTML table format

## Why I made this

1. Creating custom admin pages using `add_menu_page`
2. Fetching data using the `$wpdb` object
3. Sanitizing and escaping output before displaying it
4. Understanding how admin pages work in WordPress
5. Using multiple helper functions

## How to use

1. Activate the plugin from the Plugins section
2. A new menu item will appear called **Form Data**
3. Open that page to view the stored data

## Errors I Faced

1. Firstly using same form names and same name attributes in different plugins causes database errors
2. And also some confusion while using multiple helper functions