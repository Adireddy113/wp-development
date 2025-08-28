### 🔧 Introduction  
This is a simple learning task on wordpress **Hooks and Filters**.
---

### 🎯 Purpose of This Code  
The goal was to get hands-on experience with `add_action()`, `add_filter()`, and custom hooks. I wanted to see how they behave, how data flows through them, and how they can be used to modify output or trigger functionality.

---

### 🧠 What Are Hooks and Filters?  
 Mainly these helps to add or change functionality of wordpress without touching wp core.
- **Actions** Run specific code at certain events 
- **Filters** Helps to modify data before displayed or saved

---

### ⚙️ Example Action Hook: `wp_footer`  
I used `add_action('wp_footer', 'func')` to echo a message at the bottom of every page. This helped me understand how actions are triggered during page rendering. And the wp_footer is a built in action hook
---

### 🔥 Filter Hook: `the_title`  
I used `add_filter('the_title','func')`This filter modifies post titles by prepend a 🔥 emoji — but only on the frontend. I used `is_admin()` to make sure it doesn’t affect titles in the dashboard. And the_title is built in filter hook 

---

### 🧪 Custom Filter Inside an Action (`custom_hc` in `wp_head`)  
 I created a custom filter called `custom_hc` and applied it inside the `wp_head` action. 
 - Here action just echo a msg, so when i passed it through a filter we can modify it Whenever we want.
 - And mainly here we can create a custom filter which triggers inside action
 - `apply_filters('hook_name','$data')` to register custom filter
---

### 🧵 Action Inside a Filter (`mca` in `the_content`)  
- This was the reverse: I used a filter (`the_content`) to trigger a custom action (`mca`). 
- I wrapped it in output buffering so the action’s output could be injected before the post content.
- `do_action('hook_name')` to register custom action

---

### 📚 What I Learned  
I now have a much clearer understanding of how WordPress hooks work, how to use them responsibly, and how to structure code that’s both dynamic and extensible.

---

### Things to keep in Mind
- Actions echo data immediately
- Filters always must return the modified data
- Filters inside Actions must modify data before echoing (mostly used for flexibility, reusability, extensible)
- Actions inside Filters must use output buffering because to hold echoed data to use with filter

### 📝 Final Thoughts  
This was a great exercise in understanding WordPress internals. It’s helped me think more like a plugin developer. I’ll keep building on this foundation as I move toward more advanced backend features.
