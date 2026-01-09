# 6Minds Infrastructure

A comprehensive recruiting and workforce solutions platform for AI infrastructure, featuring both a modern React web application and a WordPress theme for job management.

![React](https://img.shields.io/badge/React-19.0.0-blue)
![Vite](https://img.shields.io/badge/Vite-4.4.5-purple)
![Docker](https://img.shields.io/badge/Docker-Ready-blue)
![WordPress](https://img.shields.io/badge/WordPress-Theme-blue)

## 🏗️ Project Architecture

This repository contains **two complementary projects**:

### 1️⃣ **React Web Application** (Parent/Primary)
Modern, responsive website built with React 19, Vite, Tailwind CSS, and Framer Motion. Features beautiful animations, dark theme design, and optimized performance.

- **Location**: Root directory
- **Purpose**: Marketing site, company information, service showcase
- **Stack**: React, Vite, Tailwind CSS, Framer Motion, Radix UI
- **Deployment**: Dockerized for easy deployment

### 2️⃣ **WordPress Theme** (Child/Extension)
Custom WordPress theme that **emulates and mirrors** the styling of the original React site, specifically designed for job posting and resume management functionality.

- **Location**: `6minds-infrastructure-theme/`
- **Purpose**: Job listings, candidate search, resume submissions
- **Stack**: WordPress, PHP, WP Job Manager, custom CSS/JS
- **Design**: Matches React site's dark theme with cyan accents

## 🚀 Quick Start

### Option A: Run React Site (Docker)

```bash
# Build and start the container
docker-compose up

# Access at http://localhost:3000
```

See [DOCKER_SETUP.md](DOCKER_SETUP.md) for detailed Docker instructions.

### Option B: Run React Site (Local)

```bash
# Install dependencies
npm install

# Start development server
npm run dev

# Build for production
npm run build
```

### Option C: Deploy WordPress Theme

See [`6minds-infrastructure-theme/README.md`](6minds-infrastructure-theme/README.md) for WordPress installation and configuration.

## 📁 Project Structure

```
6minds-infrastructure/
├── src/                          # React application source
│   ├── components/               # React components
│   ├── App.jsx                   # Main app component
│   ├── main.jsx                  # App entry point
│   └── index.css                 # Global styles
├── public/                       # Static assets
│   ├── 6-minds-infrastructure-logo.png
│   └── favicon.svg
├── 6minds-infrastructure-theme/  # WordPress theme (child project)
│   ├── assets/                   # Theme CSS, JS, images
│   ├── template-parts/           # Reusable PHP components
│   ├── functions.php             # Theme setup and configuration
│   ├── header.php, footer.php    # Theme structure
│   └── README.md                 # WordPress-specific docs
├── wp-job-manager-resumes/       # WP Job Manager plugin
├── docker-compose.yml            # Docker configuration
├── Dockerfile                    # Docker build instructions
├── vite.config.js                # Vite build configuration
├── tailwind.config.js            # Tailwind CSS configuration
└── package.json                  # Node dependencies
```

## 🎨 Design System

Both projects share a unified design language:

### Color Palette
```css
Primary:   #003049  (Dark Navy Blue)
Secondary: #00d4ff  (Cyan)
Dark:      #001a2e  (Darker Navy)
Light:     #f5f5f5  (Off-White)
```

### Typography
- **React Site**: System fonts via Tailwind CSS
- **WordPress**: Matching font stack in custom CSS

### Components
- Dark-themed interfaces
- Cyan accent colors for CTAs and highlights
- Smooth hover transitions and animations
- Responsive grid layouts
- Professional card-based designs

## 🔧 Technology Stack

### React Application
- **Framework**: React 19 + Vite 4
- **Styling**: Tailwind CSS + Custom CSS
- **Animations**: Framer Motion
- **UI Components**: Radix UI primitives
- **Icons**: Lucide React
- **Routing**: React Router v6
- **Containerization**: Docker + Docker Compose

### WordPress Theme
- **CMS**: WordPress 6.0+
- **Language**: PHP 7.4+
- **Job Management**: WP Job Manager + Resume Manager
- **Styling**: Custom CSS (2400+ lines)
- **Interactivity**: Vanilla JavaScript + jQuery
- **Features**: Custom shortcodes, template parts, AJAX search

## 🌟 Features

### React Site Features
- ✨ Modern, animated landing page
- 🎨 Dark theme with cyan accents
- 📱 Fully responsive design
- 🚀 Optimized performance with Vite
- 🎭 Smooth transitions with Framer Motion
- 🧩 Reusable component architecture
- 🐳 Docker-ready for deployment

### WordPress Theme Features
- 🔍 Advanced job search with keyword filtering
- 📝 Resume submission and management
- 💼 Job listing cards and detail pages
- 🎯 Pre-populated search results
- 📱 Mobile-optimized navigation
- 🔗 SEO-friendly permalinks
- 🎨 Matches React site design perfectly

## 🌐 Use Cases

### When to Use React Site
- Marketing and branding pages
- Company information and about pages
- Service showcases
- Contact forms
- Blog content (future)

### When to Use WordPress Theme
- Job postings and listings
- Candidate applications
- Resume submissions
- Job search functionality
- Employer/recruiter portals

## 📖 Documentation

- **[DOCKER_SETUP.md](DOCKER_SETUP.md)** - Docker development guide
- **[6minds-infrastructure-theme/README.md](6minds-infrastructure-theme/README.md)** - WordPress theme documentation
- **[6minds-infrastructure-theme/SHORTCODES.md](6minds-infrastructure-theme/SHORTCODES.md)** - WordPress shortcode reference
- **[6minds-infrastructure-theme/JOB-SEARCH-SETUP.md](6minds-infrastructure-theme/JOB-SEARCH-SETUP.md)** - Job search configuration

## 🔄 Development Workflow

### Working on React Site

```bash
# Start Docker container
docker-compose up

# Or run locally
npm run dev
```

Changes to React components will hot-reload automatically.

### Working on WordPress Theme

1. Set up WordPress installation (local or hosted)
2. Copy `6minds-infrastructure-theme/` to `wp-content/themes/`
3. Activate theme in WordPress admin
4. Install required plugins (WP Job Manager, Resume Manager)
5. Configure settings per theme README

### Design Consistency

When modifying designs:
1. **Primary Changes**: Make in React site first
2. **Mirror to WordPress**: Update CSS in `6minds-infrastructure-theme/assets/css/main.css`
3. **Test Both**: Ensure visual consistency across platforms

## 🚢 Deployment

### React Site Deployment

**Docker (Recommended):**
```bash
docker-compose up -d
```

**Static Hosting:**
```bash
npm run build
# Deploy dist/ folder to Netlify, Vercel, or static host
```

### WordPress Theme Deployment

1. Upload theme folder to production server
2. Activate in WordPress admin
3. Configure cache settings (see WordPress README)
4. Test job search functionality
5. Configure LiteSpeed/caching rules if needed

## 🛠️ Maintenance

### Updating Dependencies

**React Site:**
```bash
npm update
npm audit fix
```

**WordPress Theme:**
- Update WordPress core via admin
- Update WP Job Manager plugins
- Test thoroughly after updates

### Syncing Design Changes

1. Identify changed components in React site
2. Export relevant styles to WordPress CSS
3. Test responsive behavior on both platforms
4. Update documentation if needed

## 🐛 Troubleshooting

### React Site Issues

**Port Already in Use:**
```bash
# Change port in docker-compose.yml or vite.config.js
```

**Dependencies Not Installing:**
```bash
docker-compose down -v
docker-compose up --build
```

### WordPress Issues

**Job Search Page Reloads:**
- Check LiteSpeed Cache settings
- Verify jQuery dependency in functions.php
- Clear all caches (plugin, server, browser)

**Styling Doesn't Match React Site:**
- Compare CSS color variables
- Check responsive breakpoints
- Verify custom CSS loads after plugin styles

See [WordPress README](6minds-infrastructure-theme/README.md) for detailed troubleshooting.

## 📋 Requirements

### React Application
- Node.js 20+
- npm or yarn
- Docker + Docker Compose (optional)

### WordPress Theme
- WordPress 6.0+
- PHP 7.4+
- WP Job Manager plugin
- WP Job Manager - Resume Manager plugin

## 🤝 Contributing

1. **React changes**: Test in Docker container
2. **WordPress changes**: Test in local WordPress install
3. **Design changes**: Update both projects for consistency
4. Document significant changes in respective READMEs
5. Test across devices and browsers


---

## 🗺️ Roadmap


### WordPress Theme
- [ ] Enhanced candidate profiles
- [ ] Email notifications for applications
- [ ] Advanced search filters
- [ ] Employer dashboard

---

**Last Updated**: January 2026
**React Version**: 19.0.0
**WordPress Theme Version**: 1.0.0
**Docker**: ✅ Ready
