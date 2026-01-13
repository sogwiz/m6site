# 6Minds Infrastructure WordPress Theme

A custom WordPress theme designed to **emulate and mirror** the styling of the original React-based 6Minds Infrastructure website, specifically built for job posting and resume management functionality.

![Version](https://img.shields.io/badge/version-1.0.0-blue)
![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple)

> **Note**: This WordPress theme is a **child project** of the main React application. It replicates the React site's dark theme and cyan accent design system while adding WordPress-specific job management capabilities.

## 🎯 Project Context

### Parent Project
The **primary project** is a modern React/Vite web application (located in the repository root) featuring:
- React 19 + Vite 4
- Tailwind CSS styling
- Framer Motion animations
- Docker deployment
- Marketing and company information pages

### This WordPress Theme (Child Project)
This theme was created to:
- **Match the React site's visual design** (dark theme, cyan accents, typography)
- **Add job management functionality** not available in the static React site
- **Integrate with WP Job Manager** for job listings and resume submissions
- **Provide a seamless user experience** consistent with the main React site

## 🚀 Overview

This custom WordPress theme provides job search, job listings, and resume submission capabilities while maintaining perfect visual consistency with the parent React application.

## ✨ Key Features

### 🎨 Design Parity
- **React Design Emulation**: CSS carefully crafted to match the React site's Tailwind-based design
- **Consistent Color Scheme**: Same dark navy (#003049) and cyan (#00d4ff) palette
- **Matching Typography**: Font stacks and sizing that mirror the React site
- **Unified Components**: Buttons, cards, and forms styled identically to React counterparts

### 🔍 Job Search & Management
- Homepage job search with keyword filtering
- WP Job Manager integration
- Pre-populated search results
- Advanced filtering (job types, locations, remote)

### 👔 Resume Management
- Resume submission forms
- Multi-step process with preview
- Professional styling matching theme

## 📋 Requirements

- WordPress 6.0+
- PHP 7.4+
- WP Job Manager plugin
- WP Job Manager - Resume Manager plugin

## 🛠️ Installation

See [JOB-SEARCH-SETUP.md](JOB-SEARCH-SETUP.md) for detailed setup instructions.

1. Upload the `6minds-infrastructure-theme` folder to `/wp-content/themes/` directory
2. Activate the theme through the 'Appearance' menu in WordPress
3. Install and activate the WPJobManager plugin (optional but recommended)
4. Go to Appearance > Customize to configure theme settings

## Theme Setup

### Menu Setup
1. Go to Appearance > Menus
2. Create a new menu with links to:
   - Home
   - About
   - Jobs (or use WPJobManager archive link)
3. Assign the menu to "Primary Menu" location

### Logo Setup
1. Go to Appearance > Customize > Site Identity
2. Upload your logo (recommended size: 32x32px or larger)
3. The theme will use the logo from `/assets/images/6-minds-infrastructure-logo.png` as fallback

### WPJobManager Integration
If you're using WPJobManager:
1. Install and activate the WPJobManager plugin
2. The theme includes custom templates:
   - `archive-job_listing.php` - Job listings archive
   - `single-job_listing.php` - Single job page
3. Create a page and use the `[jobs]` shortcode to display job listings
4. Set the page as your Jobs page in WPJobManager settings


## Color Scheme

The theme uses the following color palette:
- **Background**: Dark slate (#020617, #0f172a)
- **Text**: White (#ffffff) and light slate (#cbd5e1, #94a3b8)
- **Accent**: Cyan (#22d3ee, #06b6d4) and Blue (#3b82f6, #2563eb)
- **Gradients**: Cyan to Blue gradients for buttons and highlights

### Changing Colors
Edit the CSS variables in `/assets/css/main.css`:
```css
:root {
    --color-cyan: #22d3ee;
    --color-blue: #3b82f6;
    /* ... other colors ... */
}
```

## 🔧 Customization

### Syncing Design Changes from React Site

1. Identify changed components in React site
2. Extract new styles (colors, spacing, typography)
3. Update CSS variables in `assets/css/main.css`
4. Test responsive breakpoints
5. Clear all caches

## 🔗 Related Documentation

- [Parent Project README](../README.md) - React site documentation
- [SHORTCODES.md](SHORTCODES.md) - WordPress shortcodes
- [JOB-SEARCH-SETUP.md](JOB-SEARCH-SETUP.md) - Job search configuration
- [JOB-CATEGORIES-GUIDE.md](JOB-CATEGORIES-GUIDE.md) - Job categories and view toggle guide

## File Structure

```
6minds-infrastructure-theme/
├── style.css                 # Theme stylesheet with header
├── functions.php             # Theme functions and setup
├── index.php                 # Main template
├── header.php                # Header template
├── footer.php                # Footer template
├── front-page.php            # Homepage template
├── page.php                  # Page template
├── single.php                # Single post template
├── archive-job_listing.php   # Job listings archive (WPJobManager)
├── single-job_listing.php    # Single job page (WPJobManager)
├── searchform.php            # Search form template
├── 404.php                   # 404 error page
├── assets/
│   ├── css/
│   │   └── main.css          # Main stylesheet
│   ├── js/
│   │   └── main.js           # Main JavaScript
│   └── images/
│       └── 6-minds-infrastructure-logo.png
└── README.md                 # This file
```

---

**Last Updated**: January 2026
**Theme Version**: 1.0.0
**Designed to Match**: React 19 + Tailwind CSS parent site