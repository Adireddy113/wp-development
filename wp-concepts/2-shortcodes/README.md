### 🔧 Introduction  
This is a simple learning task on WordPress **Shortcodes**—exploring their types, structure, and practical use in plugin development.

---

### 🎯 Purpose of This Code  
The goal was to understand how shortcodes work, how they’re registered, and how they can be used to inject dynamic content into posts, pages, or widgets. I experimented with static, self-closing, enclosing, and attribute-driven shortcodes to see how they behave and how flexible they are for client-facing features.

---

### 🧠 What Are Shortcodes?  
Shortcodes are placeholders wrapped in square brackets like `[example]`. When WordPress renders the page, it replaces them with dynamic output.  
They’re ideal for embedding functionality without writing HTML or PHP directly in the editor.

---

### ⚙️ Static Shortcode: `[greet]`  
I created a basic shortcode using `add_shortcode('greet', 'func')` that simply returns a static message.  
- No attributes or content  
- Great for reusable snippets like greetings or branding

---

### 🧩 Self-Closing Shortcode with Attributes: `[button text="Buy Now" url="https://..."]`  
This shortcode accepts parameters and returns a styled button.  
- Used `shortcode_atts()` to set defaults  
- Ideal for dynamic UI components

---

### 📚 What I Learned  
I now understand how shortcodes can be structured for flexibility, how attributes enhance usability, and how enclosing shortcodes allow for dynamic content manipulation.
This exercise helped me think about how to build reusable components for clients and how to keep content editors empowered without touching code.

---

### Things to Keep in Mind  
- Use `shortcode_atts()` to set defaults and sanitize input  
- Always escape output (`esc_html`, `esc_url`) for security  

---

### 📝 Final Thoughts  
This was a great intro to shortcode architecture. I’ll continue refining these patterns and start integrating them into plugins and client dashboards—especially for marketing components and analytics blocks.
