# Job Categories Guide

Complete guide for using job categories in the 6Minds Infrastructure WordPress theme.

## 🎯 Overview

The theme now includes full support for WP Job Manager job categories, allowing you to:
- Display categories on job listing cards
- Show categories on job detail pages
- Browse jobs by category
- Filter jobs using category URLs
- Toggle between list and grid views

## 📋 Table of Contents

1. [Category Display Locations](#category-display-locations)
2. [Browse by Category Widget](#browse-by-category-widget)
3. [List/Grid View Toggle](#listgrid-view-toggle)
4. [Category URL Structure](#category-url-structure)
5. [Customization Options](#customization-options)

## 🏷️ Category Display Locations

### 1. Job Listing Cards

Categories appear as clickable badges on each job card in the job listings page.

**Features:**
- Cyan-colored badges with hover effects
- Clickable links to category archive pages
- Displayed next to job type badges
- Responsive design

**Example:**
```
[Job Title]
Location: Texas
[Full Time] [Electrical] <- Category badge
View Details
```

### 2. Job Detail Page

Categories are shown in two locations on single job pages:

**A. Job Header (Below Title)**
- Large, prominent category badges
- Displayed alongside job type and location
- Hover effect transforms badge to solid cyan

**B. Job Sidebar (Job Details Card)**
- Listed under "Category:" label
- Multiple categories shown as comma-separated links
- Styled consistently with other job details

**Example:**
```
Job Title
📍 Location | [Full Time] | [Electrical]

Job Details
Location: Texas
Type: Full Time
Category: Electrical, Project Management
```

## 🔍 Browse by Category Widget

A beautiful, interactive widget that displays all job categories with job counts.

### Usage

#### As a Shortcode

Add to any page or the job listings page:

```php
[job_categories_browser]
```

**Alternate shortcode:**
```php
[browse_job_categories]
```

#### Automatic Display

The widget is automatically included at the bottom of:
- Job archive page (`archive-job_listing.php`)
- Job search results page (`page-jobs-search.php`)

### Shortcode Parameters

Customize the widget with these parameters:

```php
[job_categories_browser 
    title="Browse by Category" 
    show_count="yes" 
    orderby="name" 
    order="ASC"
]
```

**Parameters:**
- `title` - Widget heading (default: "Browse by Category")
- `show_count` - Show job count (default: "yes", options: "yes" or "no")
- `orderby` - Sort method (default: "name", options: "name", "count", "id")
- `order` - Sort order (default: "ASC", options: "ASC" or "DESC")

**Examples:**

Sort by most jobs:
```php
[job_categories_browser orderby="count" order="DESC"]
```

Hide job counts:
```php
[job_categories_browser show_count="no"]
```

Custom title:
```php
[job_categories_browser title="Find Jobs by Specialty"]
```

### Widget Features

- **Grid Layout**: Responsive cards arranged in a grid
- **Job Counts**: Shows number of jobs in each category
- **Hover Effects**: Cards lift and highlight on hover
- **Icon Design**: Category icons with smooth animations
- **Cyan Accents**: Matches theme's color scheme
- **Click Navigation**: Links directly to category archive pages

### Widget Design

```
┌──────────────────────────────────────┐
│      Browse by Category              │
├──────────────┬──────────────┬────────┤
│ 🔧 Electrical │ 🏗️ Civil     │ ⚡ Energy│
│ 24 jobs →    │ 18 jobs →    │ 32 jobs→│
├──────────────┼──────────────┼────────┤
│ 📊 Project   │ 🔌 Mechanical│ 💻 IT   │
│ 15 jobs →    │ 21 jobs →    │ 12 jobs→│
└──────────────┴──────────────┴────────┘
```

## 📊 List/Grid View Toggle

Switch between grid and list layouts for job listings.

### Features

- **Grid View**: Cards arranged in responsive columns (default)
- **List View**: Full-width rows with optimized layout
- **Persistent Preference**: Choice saved in browser localStorage
- **Responsive**: Adapts to mobile screens
- **Auto-restore**: View preference restored on page reload

### Location

Toggle buttons appear at the top-right of the job listings area:

```
[Grid Icon] [List Icon]
```

### View Modes

#### Grid View (Default)
- Multi-column card layout
- Compact, visual design
- Best for browsing many jobs
- Responsive: 1-3 columns based on screen size

```
┌─────────┐ ┌─────────┐ ┌─────────┐
│ Job 1   │ │ Job 2   │ │ Job 3   │
│ Details │ │ Details │ │ Details │
└─────────┘ └─────────┘ └─────────┘
```

#### List View
- Full-width row layout
- More content visible per job
- Easier to scan details
- Better for detailed comparison

```
┌────────────────────────────────────────┐
│ Job 1 | Location | Type | View Details │
│ Description...                         │
└────────────────────────────────────────┘
┌────────────────────────────────────────┐
│ Job 2 | Location | Type | View Details │
│ Description...                         │
└────────────────────────────────────────┘
```

### JavaScript Implementation

The toggle automatically:
1. Creates toggle buttons dynamically
2. Saves user preference to localStorage
3. Restores preference on page load
4. Re-initializes after AJAX filtering
5. Applies appropriate CSS classes

## 🔗 Category URL Structure

Categories use WP Job Manager's standard taxonomy structure:

### URL Format

```
https://yoursite.com/job-category/category-slug/
```

### Examples

Based on your site ([6mindsinfrastructure.com](https://6mindsinfrastructure.com)):

- Electrical jobs: `https://6mindsinfrastructure.com/job-category/electrical/`
- Project Management: `https://6mindsinfrastructure.com/job-category/project-management/`
- Mechanical: `https://6mindsinfrastructure.com/job-category/mechanical/`
- Civil Engineering: `https://6mindsinfrastructure.com/job-category/civil-engineering/`

### How It Works

1. **Category Badge Click**: User clicks a category badge
2. **Navigate to Archive**: Redirects to category-specific URL
3. **Filtered Results**: WordPress displays only jobs in that category
4. **Category Widget**: Highlights current category (if viewing)

### WordPress Query

Categories use the `job_listing_category` taxonomy:

```php
// Get jobs in a specific category
$args = array(
    'post_type' => 'job_listing',
    'tax_query' => array(
        array(
            'taxonomy' => 'job_listing_category',
            'field' => 'slug',
            'terms' => 'electrical'
        )
    )
);
$jobs = new WP_Query($args);
```

## 🎨 Customization Options

### Styling Categories

Edit `assets/css/main.css` to customize category appearance:

**Listing Card Categories:**
```css
.job_listing-category {
    background: rgba(0, 212, 255, 0.1);
    color: var(--color-secondary);
    border: 1px solid rgba(0, 212, 255, 0.3);
    /* Customize colors, padding, border-radius */
}
```

**Detail Page Categories:**
```css
.job-category {
    background: rgba(0, 212, 255, 0.1);
    color: var(--color-secondary);
    /* Larger padding for emphasis */
}
```

**Category Browser Cards:**
```css
.job-category-card {
    background: rgba(0, 48, 73, 0.5);
    border: 1px solid rgba(0, 212, 255, 0.2);
    /* Customize card appearance */
}
```

### Changing Widget Layout

Modify grid columns in CSS:

```css
.job-categories-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    /* Change minmax() for different card sizes */
}
```

**Examples:**
- 2 columns: `repeat(2, 1fr)`
- 4 columns: `repeat(4, 1fr)`
- Larger cards: `minmax(350px, 1fr)`
- Smaller cards: `minmax(220px, 1fr)`

### Custom Category Icons

Replace the default icon in `functions.php`:

```php
<div class="job-category-icon">
    <!-- Replace with your custom SVG or icon -->
    <svg>...</svg>
</div>
```

### Removing Features

#### Remove Category Browser from Specific Pages

Edit the template file and remove:
```php
echo do_shortcode('[job_categories_browser]');
```

#### Disable View Toggle

Comment out in `main.js`:
```javascript
// initViewToggle();
```

Or hide with CSS:
```css
.job-view-toggle {
    display: none;
}
```

## 📱 Responsive Behavior

### Mobile Adaptations

**Category Browser:**
- Single column layout on mobile
- Touch-optimized cards
- Increased tap target size

**View Toggle:**
- Centered on mobile
- Larger buttons for touch
- Grid view defaults to single column

**Category Badges:**
- Wrap to multiple lines if needed
- Maintain readable font size
- Touch-friendly spacing

### Breakpoints

```css
@media (max-width: 768px) {
    /* Mobile styles */
}

@media (min-width: 769px) and (max-width: 1023px) {
    /* Tablet styles */
}

@media (min-width: 1024px) {
    /* Desktop styles */
}
```

## 🔧 Technical Details

### Files Modified

1. **content-job_listing.php** - Added category display to listing cards
2. **single-job_listing.php** - Added categories to detail page header and sidebar
3. **functions.php** - Added `job_categories_browser` shortcode
4. **assets/js/main.js** - Added view toggle functionality
5. **assets/css/main.css** - Added all styling for categories and toggle
6. **archive-job_listing.php** - Added category browser widget
7. **page-jobs-search.php** - Added category browser widget

### Taxonomy Details

- **Taxonomy Name**: `job_listing_category`
- **Post Type**: `job_listing`
- **Hierarchical**: Yes (supports parent/child categories)
- **Public**: Yes
- **Rewrite**: `/job-category/`

### JavaScript Events

**View Toggle Events:**
```javascript
// Listen for view changes
document.addEventListener('jobViewChanged', function(e) {
    console.log('View changed to:', e.detail.view);
});

// Manually set view
setView('list');  // or 'grid'
```

**AJAX Integration:**
```javascript
jQuery(document).on('updated_results', function() {
    // View toggle re-initializes automatically
});
```

## 🚀 Best Practices

### Category Setup

1. **Clear Naming**: Use descriptive, searchable category names
2. **Consistent Hierarchy**: Keep structure simple (avoid deep nesting)
3. **SEO-Friendly Slugs**: Use lowercase, hyphenated slugs
4. **Icon Consistency**: Use similar icon styles across categories

### Usage Recommendations

1. **Assign Categories**: Always assign at least one category per job
2. **Avoid Over-Categorization**: 1-3 categories per job is ideal
3. **Update Regularly**: Keep categories current and relevant
4. **Monitor Counts**: Remove/merge categories with few jobs

### Performance Tips

1. **Cache Category Counts**: Use WordPress transients for heavy traffic
2. **Optimize Images**: If using custom icons, optimize SVGs
3. **Lazy Load**: Consider lazy loading for many categories
4. **Database Indexing**: Ensure taxonomy tables are indexed

## 🆘 Troubleshooting

### Categories Not Showing

1. **Check if assigned**: Edit job and verify category is selected
2. **Verify taxonomy**: Ensure `job_listing_category` taxonomy exists
3. **Clear cache**: Clear WordPress and server caches
4. **Check permissions**: Verify category URLs are accessible

### Widget Not Displaying

1. **Check for categories**: Widget hides if no categories exist
2. **Verify shortcode**: Ensure `[job_categories_browser]` is correct
3. **Check template**: Confirm widget is in the template
4. **JavaScript errors**: Check browser console for errors

### View Toggle Not Working

1. **Check JavaScript**: Ensure main.js is loaded
2. **jQuery dependency**: Verify jQuery is loaded
3. **Clear localStorage**: Clear browser localStorage
4. **Cache**: Clear all caches and test in incognito mode

### Styling Issues

1. **CSS specificity**: Add `!important` if needed
2. **Cache**: Clear browser and server caches
3. **Inspect element**: Use browser DevTools to debug
4. **Load order**: Ensure main.css loads after plugin styles

---

**Last Updated**: January 2026
**Theme Version**: 1.0.0
**Compatible with**: WP Job Manager 1.x
