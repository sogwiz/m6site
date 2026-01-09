# Job Search Setup Guide

This guide explains how to set up the job search functionality that allows candidates to search from the homepage and get redirected to a pre-populated jobs search page.

## Overview

The system works as follows:
1. **Homepage**: Contains a job search form in the hero section
2. **Search Form**: Submits to a jobs search page with `search_keywords` parameter
3. **Jobs Search Page**: Contains the `[jobs]` shortcode and automatically triggers search with the keyword
4. **JavaScript**: Pre-fills and triggers WPJobManager's AJAX search

## Setup Steps

### Step 1: Create the Jobs Search Page

1. Go to **Pages > Add New** in WordPress admin
2. Create a new page (e.g., "Job Search" or "Find Jobs")
3. In the page content, add the WPJobManager shortcode:
   ```
   [jobs]
   ```
4. In the **Page Attributes** box (right sidebar), select **"Jobs Search Page"** as the template
5. **Publish** the page
6. **Copy the page URL** (you'll need it in the next step)

### Step 2: Configure the Jobs Search Page URL

1. Go to **Settings > Reading** in WordPress admin
2. Scroll down to find **"Jobs Search Page"** setting
3. Select the page you created in Step 1 from the dropdown
4. **Save Changes**

**Note**: If you don't see this setting, it means the theme hasn't been activated yet. Activate the theme first.

### Step 3: Verify Homepage Has Search Form

The search form is automatically included in the hero section. If you're using the `[hero]` shortcode on your homepage, the search form will appear automatically.

If you want to add the search form separately, you can use:
```
[job_search_form]
```

### Step 4: Test the Search

1. Go to your homepage
2. Type a job keyword in the search field (e.g., "Engineer", "Data Scientist")
3. Click "Search Jobs"
4. You should be redirected to the jobs search page
5. The search should automatically execute and show results

## How It Works

### URL Flow
```
Homepage → /jobs-search/?search_keywords=Engineer
```

### JavaScript Flow
1. Page loads with `?search_keywords=Engineer` parameter
2. JavaScript detects the parameter
3. Finds WPJobManager's search input field
4. Pre-fills the input with "Engineer"
5. Triggers WPJobManager's AJAX search automatically
6. Results appear without user needing to click search again

### WPJobManager Integration

The JavaScript:
- Waits for WPJobManager to load
- Finds the search form using various selectors (handles different WPJobManager versions)
- Pre-fills the `search_keywords` input field
- Triggers the search button click or form submission
- Works with WPJobManager's AJAX endpoint: `jm-ajax/get_listings/`

## Customization

### Change Search Form Location

The search form is included in:
- `template-parts/hero-section.php` (automatically in hero)
- Can be added anywhere using `[job_search_form]` shortcode

### Customize Search Form Styling

Edit the CSS in `assets/css/main.css`:
- `.job-search-form` - Main form container
- `.job-search-input` - Input field
- `.job-search-button` - Submit button

### Change Jobs Search Page Template

Edit `page-jobs-search.php` to customize the layout of the search results page.

## Troubleshooting

### Search doesn't auto-trigger
- Check browser console for JavaScript errors
- Verify WPJobManager plugin is active
- Check that the `[jobs]` shortcode is on the search page
- Try refreshing the page

### Search form not appearing
- Verify you're using the hero section on homepage
- Check that `template-parts/job-search-form.php` exists
- Try using `[job_search_form]` shortcode directly

### Wrong page redirects
- Go to Settings > Reading
- Verify "Jobs Search Page" is set correctly
- Check the page URL matches your search page

## Files Involved

- `template-parts/job-search-form.php` - Search form template
- `template-parts/hero-section.php` - Hero section (includes search form)
- `page-jobs-search.php` - Jobs search results page template
- `assets/js/main.js` - JavaScript for auto-triggering search
- `assets/css/main.css` - Search form styling
- `functions.php` - Shortcode and settings registration

