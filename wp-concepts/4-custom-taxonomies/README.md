# 🧩 WordPress Custom Taxonomies – Simple Guide

This plugin demonstrates how to register a **custom taxonomy** in WordPress and attach it to a Custom Post Type (CPT). In this example, we create a taxonomy called `Genre` for a CPT called `Book`.

---

## 📚 What Is a Taxonomy?

In WordPress, a **taxonomy** is a way to group and organize content.

### Built-in Taxonomies:
- `category` – hierarchical (can have parent/child)
- `post_tag` – flat (no hierarchy)

### Custom Taxonomies:
You can create your own taxonomies like:
- `Genre` (for books or movies)
- `Author` (for books)
- `Topic`, `Skill`, `Brand`, etc.

---

## 🛠️ How to Register a Custom Taxonomy

Use the function:

```php
register_taxonomy( $taxonomy, $object_type, $args );
function register_genre_taxonomy() {
    register_taxonomy('genre', 'book', array(
        'label' => 'Genres',
        'hierarchical' => true, // behaves like categories
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'genre'),
    ));
}
add_action('init', 'register_genre_taxonomy');
```

##  When to Use Custom Taxonomies
### Use them when:

You want to group CPTs by meaningful labels.
You need archive pages or filtering by those labels.

### Avoid them when:

You only need a few static fields → use custom fields instead.
You’re not planning to reuse or filter by those labels.