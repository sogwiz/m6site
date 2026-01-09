/**
 * 6 Minds Infrastructure Theme - Main JavaScript
 */

(function() {
    'use strict';

    // Mobile Menu Toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileNav = document.getElementById('mobile-nav');

    if (mobileMenuToggle && mobileNav) {
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileNav.classList.toggle('active');
        });

        // Mobile menu link handling with submenu support
        const mobileNavLinks = mobileNav.querySelectorAll('a');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Check if THIS link is the direct parent of a submenu
                const parentLi = this.parentElement;
                const hasSubmenu = parentLi.classList.contains('menu-item-has-children') && 
                                   parentLi.querySelector('.sub-menu');
                
                if (hasSubmenu) {
                    // This is a parent link with children
                    const isExpanded = parentLi.classList.contains('active');
                    
                    if (!isExpanded) {
                        // First click: expand submenu, don't navigate
                        e.preventDefault();
                        parentLi.classList.add('active');
                        return;
                    }
                    // Second click or already expanded: allow navigation and close menu
                    // (fall through to close menu below)
                }
                
                // For all other clicks (child links, regular links, or expanded parent re-clicks):
                // Close the mobile menu and allow navigation
                mobileMenuToggle.classList.remove('active');
                mobileNav.classList.remove('active');
            });
        });
    }

    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    let lastScroll = 0;

    if (navbar) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });
    }

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Add active class to current menu item
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-menu a, .mobile-nav-menu a');
    
    navLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        if (linkPath === currentPath || (currentPath === '/' && linkPath === currentPath)) {
            link.closest('li')?.classList.add('current-menu-item');
        }
    });

    // Job Listing Enhancements (if WPJobManager is active)
    if (typeof jQuery !== 'undefined' && jQuery('.job_listings').length) {
        // Add hover effects and animations
        jQuery('.job_listing').on('mouseenter', function() {
            jQuery(this).css('transform', 'translateY(-4px)');
        }).on('mouseleave', function() {
            jQuery(this).css('transform', 'translateY(0)');
        });
    }

    // Reset form buttons on page load (fixes back button issue)
    function resetFormButtons() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            // Skip WPJobManager resume forms - they handle their own state
            if (form.classList.contains('resume-manager-form') ||
                form.id === 'submit-resume-form' ||
                form.id === 'resume_preview') {
                return;
            }
            
            const submitButton = form.querySelector('button[type="submit"], input[type="submit"]');
            if (submitButton && submitButton.disabled) {
                submitButton.disabled = false;
                
                // Restore original button text
                if (submitButton.classList.contains('job-search-button')) {
                    const span = submitButton.querySelector('span');
                    if (span) {
                        span.textContent = 'Search Jobs';
                    }
                } else if (submitButton.dataset.originalText) {
                    submitButton.textContent = submitButton.dataset.originalText;
                } else if (submitButton.textContent === 'Submitting...') {
                    submitButton.textContent = 'Submit';
                }
            }
        });
    }

    // Reset on page load and when navigating back/forward
    resetFormButtons();
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            resetFormButtons();
        }
    });

    // Resume form error handling - display any hidden error messages
    const resumePreviewForm = document.getElementById('resume_preview');
    if (resumePreviewForm) {
        // Make sure error messages are visible if they exist
        const errorMessages = document.querySelectorAll('.job-manager-error, .wpjm-error, .error');
        if (errorMessages.length > 0) {
            errorMessages.forEach((msg) => {
                msg.style.display = 'block';
                msg.style.color = '#ff0000';
                msg.style.background = 'rgba(255, 0, 0, 0.1)';
                msg.style.padding = '1rem';
                msg.style.marginBottom = '1rem';
                msg.style.borderRadius = '8px';
            });
        }
    }

    // Form Enhancements
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        // Skip WPJobManager forms - they handle their own submissions
        if (form.classList.contains('job_search_form') || 
            form.classList.contains('job-manager-form') ||
            form.classList.contains('wpjm-search-form') ||
            form.classList.contains('resume-manager-form') ||
            form.id === 'submit-resume-form' ||
            form.id === 'resume_preview') {
            return;
        }
        
        form.addEventListener('submit', function(e) {
            // Add loading state to submit button
            const submitButton = this.querySelector('button[type="submit"], input[type="submit"]');
            if (submitButton) {
                // Store original text
                if (submitButton.classList.contains('job-search-button')) {
                    // Don't change the button, let it submit naturally
                } else {
                    submitButton.dataset.originalText = submitButton.textContent;
                    submitButton.disabled = true;
                    submitButton.textContent = 'Submitting...';
                }
            }
        });
    });

    // Lazy Loading Images (if Intersection Observer is supported)
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Remove top padding from main-content when hero section is present
    const mainContent = document.querySelector('.main-content');
    const heroWrapper = document.querySelector('.hero-section-wrapper');
    
    if (mainContent && heroWrapper) {
        // Check if hero is first child or in page-content
        const isFirstChild = heroWrapper === mainContent.firstElementChild || 
                            heroWrapper === mainContent.querySelector('.page-content')?.firstElementChild;
        
        if (isFirstChild) {
            mainContent.classList.add('no-top-padding');
            // Also hide page-header if it exists before hero
            const pageHeader = mainContent.querySelector('.page-header');
            if (pageHeader && pageHeader.previousElementSibling === null) {
                pageHeader.style.display = 'none';
            }
        }
    }

    // WPJobManager Search Pre-population
    // Populates the search field when search_keywords parameter is present in URL
    function initWPJobManagerSearch() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchKeywords = urlParams.get('search_keywords');
        
        if (!searchKeywords) {
            return;
        }

        // Prevent multiple initializations
        if (window.wpjmSearchInitialized) {
            return;
        }
        window.wpjmSearchInitialized = true;

        let attempts = 0;
        const maxAttempts = 50;

        // Wait for WPJobManager search input to appear
        const checkWPJM = setInterval(function() {
            attempts++;
            
            const searchInput = document.querySelector('input[name="search_keywords"]');
            
            if (searchInput || (attempts >= maxAttempts)) {
                clearInterval(checkWPJM);
                
                if (!searchInput) {
                    return;
                }
                
                // Populate the search field
                searchInput.value = searchKeywords;
                
                if (typeof jQuery !== 'undefined') {
                    jQuery(searchInput).val(searchKeywords);
                }
            }
        }, 100);
    }

    // Initialize search pre-population
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWPJobManagerSearch);
    } else {
        initWPJobManagerSearch();
    }
    
    // Also try after a delay in case WPJobManager loads late
    setTimeout(initWPJobManagerSearch, 1000);

})();

