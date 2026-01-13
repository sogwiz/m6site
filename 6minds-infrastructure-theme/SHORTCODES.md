# How to Use Hero and Services Sections on Any Page

There are **three ways** to add the hero and services sections to any page in WordPress:

## Method 1: Using Shortcodes (Easiest - Recommended)

### In the WordPress Editor:

1. **Edit any page or post** in WordPress
2. **Add a Shortcode block** (or type directly in Classic Editor)
3. **Use these shortcodes:**

   **For Hero Section:**
   ```
   [hero_section]
   ```
   or
   ```
   [hero]
   ```

   **For Services Section:**
   ```
   [services_section]
   ```
   or
   ```
   [services]
   ```

   **For Job Categories Browser:**
   ```
   [job_categories_browser]
   ```
   or
   ```
   [browse_job_categories]
   ```

### Example:
```
[hero_section]

Your page content here...

[services_section]

[job_categories_browser]
```

### Where to add shortcodes:
- **Block Editor (Gutenberg)**: Add a "Shortcode" block and paste the shortcode
- **Classic Editor**: Just type the shortcode directly in the content area
- **Widgets**: Can be used in text widgets
- **Anywhere shortcodes are supported**

---

## Method 2: Using Page Templates

### For Hero Section:

1. **Edit the page** in WordPress
2. In the **Page Attributes** box (right sidebar), find **Template**
3. Select **"Page with Hero Section"**
4. The hero section will automatically appear above your page content

**Note:** This template only includes the hero section. To add services, use the shortcode method.

---

## Method 3: Direct Template Editing (Advanced)

If you want to add these sections to specific template files:

### In any template file (like `page.php`, `single.php`, etc.):

Add this code where you want the hero section:
```php
<?php get_template_part('template-parts/hero-section'); ?>
```

Add this code where you want the services section:
```php
<?php get_template_part('template-parts/services-section'); ?>
```

### Example in `page.php`:
```php
<?php
get_header();
?>

<main class="main-content">
    <?php get_template_part('template-parts/hero-section'); ?>
    
    <div class="container">
        <?php the_content(); ?>
    </div>
    
    <?php get_template_part('template-parts/services-section'); ?>
</main>

<?php get_footer(); ?>
```

---

## Quick Reference

| Method | Best For | Difficulty |
|--------|----------|------------|
| **Shortcodes** | Adding to specific pages/posts | ⭐ Easy |
| **Page Templates** | Pages that need hero section | ⭐ Easy |
| **Template Editing** | Site-wide changes | ⭐⭐⭐ Advanced |

---

## Job Categories Browser Options

The job categories browser shortcode supports several parameters:

```
[job_categories_browser title="Browse by Category" show_count="yes" orderby="name" order="ASC"]
```

### Parameters:
- **title**: Widget heading (default: "Browse by Category")
- **show_count**: Display job counts (default: "yes", options: "yes" or "no")
- **orderby**: Sort method (default: "name", options: "name", "count", "id")
- **order**: Sort order (default: "ASC", options: "ASC" or "DESC")

### Examples:

**Sort by most jobs:**
```
[job_categories_browser orderby="count" order="DESC"]
```

**Hide job counts:**
```
[job_categories_browser show_count="no"]
```

**Custom title:**
```
[job_categories_browser title="Find Jobs by Specialty"]
```

---

## Tips

- **Shortcodes work everywhere**: Pages, posts, widgets, even in theme files using `do_shortcode('[hero_section]')`
- **Combine sections**: You can use both `[hero_section]` and `[services_section]` on the same page
- **Customize order**: Place shortcodes anywhere in your content to control where sections appear
- **Multiple times**: You can use the same shortcode multiple times on a page if needed
- **Job categories**: The categories browser is automatically added to job listings pages
- **For detailed job categories info**: See [JOB-CATEGORIES-GUIDE.md](JOB-CATEGORIES-GUIDE.md)

