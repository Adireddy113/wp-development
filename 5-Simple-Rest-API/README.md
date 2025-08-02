
A simple plugin to create a custom REST API endpoint in WordPress.

### Description

This plugin adds a custom REST API endpoint at:

http://your-site.local/wp-json/myplugin/v1/greet

It returns a simple JSON message:
{
  "message": "Hello from REST API!"
}

Useful for learning and testing WordPress REST APIs.

### Installation

1. Upload the plugin to the `/wp-content/plugins/` directory.
2. Activate the plugin from the WordPress admin dashboard.
3. Open the following link in your browser or API tool:

   http://your-site.local/wp-json/myplugin/v1/greet

