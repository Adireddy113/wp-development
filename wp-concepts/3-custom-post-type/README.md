## Introduction 
we are going to learn about CPT (custom post types) which is a crucial topic in wordpress development

# What is a Custom Post Type?

* In WordPress, **everything is a post**.

  * Blog posts - "post"
  * Pages - "page"
  * Media - "attachment"
* These are all **post types**.

 A **Custom Post Type (CPT)** is just a new type of content you create.

* **Books** (if you’re making a library site)
* **Movies** (if you’re making a movie database)


# How to Create a Custom Post Type


`register_post_type( $post_type, $args );`

---

## Minimal Example

```php
function create_books_cpt() {
    register_post_type('book', array(
        'labels' => array(
        'name' => 'Books',
        'singular_name' => 'Book'
        ),
        'public' => true, 
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    ));
}
add_action('init', 'create_books_cpt');
```

➡ After adding, you’ll see a **Books menu** in your WP admin.
You can add/edit books like posts.

---


# When to Use CPT?

 Use Custom Post Types when:

* You have content that is **not just blog posts or pages**.
* Example: Portfolio, Events, Testimonials, Recipes, Products, Movies.

❌ Don’t use them if:

* You just want categories/tags (use taxonomies).
* You have only 1-2 pages of content (pages are enough).

