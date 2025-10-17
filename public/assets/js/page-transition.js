/* No-Flash Page Transition JavaScript */
(function($) {
  'use strict';

  // Theme-related constants
  const THEME_DARK = 'dark';
  const THEME_LIGHT = 'light';
  const DARK_BG_COLOR = '#252b3b'; // Match the dark blue in your dashboard
  const LIGHT_BG_COLOR = '#f5f7fb';
  
  // Cache for storing pre-fetched pages
  const pageCache = {};
  
  // Set up theme detection and handling
  function setupThemeHandling() {
    // Get theme from localStorage (same as app.js uses)
    const currentTheme = localStorage.getItem('theme') || THEME_DARK;
    
    // Apply theme to HTML element if not already set
    if (!$('html').attr('data-theme')) {
      $('html').attr('data-theme', currentTheme);
    }
    
    // Set correct background color based on theme
    const bgColor = currentTheme === THEME_DARK ? DARK_BG_COLOR : LIGHT_BG_COLOR;
    document.documentElement.style.backgroundColor = bgColor;
    document.body.style.backgroundColor = bgColor;
  }
  
  // Preload critical assets for performance
  function preloadCriticalAssets() {
    // List of critical assets to preload
    const criticalAssets = [
      '/assets/images/logo.png',
      '/assets/images/logo-light.png',
      '/assets/css/style.css'
    ];
    
    criticalAssets.forEach(src => {
      if (src.endsWith('.png') || src.endsWith('.jpg') || src.endsWith('.svg')) {
        const img = new Image();
        img.src = src;
      } else {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'style';
        link.href = src;
        document.head.appendChild(link);
      }
    });
  }
  
  // Prefetch pages when hovering over links to prevent white flash
  function setupLinkPrefetching() {
    // Prefetch on hover with a delay
    let prefetchTimer;
    
    $(document).on('mouseenter', 'a:not([href^="#"]):not([href^="javascript"]):not([href^="mailto"]):not([href^="tel"])', function() {
      const href = $(this).attr('href');
      
      // Only prefetch internal links that aren't already cached
      if (isInternalLink(href) && !pageCache[href]) {
        prefetchTimer = setTimeout(function() {
          prefetchPage(href);
        }, 100); // Small delay to avoid excessive prefetching
      }
    }).on('mouseleave', 'a', function() {
      clearTimeout(prefetchTimer);
    });
  }
  
  // Check if a URL is an internal link
  function isInternalLink(href) {
    if (!href) return false;
    
    // Check if it's a relative URL or contains the current hostname
    return href.indexOf('http') !== 0 || 
           (href.indexOf('http') === 0 && href.indexOf(window.location.hostname) !== -1);
  }
  
  // Prefetch page content and store in cache
  function prefetchPage(url) {
    if (pageCache[url]) return;
    
    $.ajax({
      url: url,
      method: 'GET',
      dataType: 'html',
      success: function(data) {
        pageCache[url] = data;
      }
    });
  }
  
  // Get content area selector
  function getContentSelector() {
    // Try to identify the main content area
    // The priority order of selectors to look for (most specific to most general)
    const selectors = [
      '.dashboard-main-body',
      '#main-content',
      '.main-content',
      '.content-wrapper',
      '#app-content',
      '#content',
      'main'
    ];
    
    // Return the first selector that exists on the page
    for (let selector of selectors) {
      if ($(selector).length) {
        return selector;
      }
    }
    
    // Default fallback
    return 'body';
  }
  
  // Update sidebar link visually when clicked before the page transition occurs
  function updateSidebarLinkOnClick($clickedLink) {
    // First remove all active classes
    $('ul#sidebar-menu a').removeClass('active-page');
    $('ul#sidebar-menu li').removeClass('active-page');
    
    // Don't remove show/open classes to prevent menu collapse during transition
    
    // Add active class to clicked link and its parent
    $clickedLink.addClass('active-page');
    $clickedLink.parent('li').addClass('active-page');
    
    // Expand parent menus if they aren't already
    let $parent = $clickedLink.parent().parent();
    while ($parent.length && !$parent.is('#sidebar-menu')) {
      if ($parent.is('ul')) {
        $parent.addClass('show');
        $parent.parent('li').addClass('open');
      }
      $parent = $parent.parent();
    }
  }

  // Initialize page transition
  function initPageTransition() {
    const contentSelector = getContentSelector();
    const $mainContent = $(contentSelector);
    
    // Initialize page
    $mainContent.css('opacity', '1');
    $('body').removeClass('page-transitioning');
    
    // Setup initial page state
    setupPageStyles();
    
    // Initialize prefetching
    setupLinkPrefetching();
    
    // Handle navigation for smoother transitions
    $(document).on('click', 'a:not([href^="#"]):not([href^="javascript"]):not([href^="mailto"]):not([href^="tel"]):not([target="_blank"]):not(.no-transition)', function(e) {
      const $this = $(this);
      const href = $this.attr('href');
      
      // Skip special links
      if ($this.attr('href') === 'javascript:void(0)' || 
          $this.attr('href') === '#' || 
          $this.parent().hasClass('dropdown') ||
          $this.data('toggle') || 
          $this.attr('target')) {
        return true;
      }
      
      // Only handle internal links
      if (!isInternalLink(href)) {
        return true; // External link, normal behavior
      }
      
      // Prevent default navigation
      e.preventDefault();
      
      // Update sidebar active state immediately for better UX
      if ($this.parents('#sidebar-menu').length) {
        updateSidebarLinkOnClick($this);
      }
      
      // Check if we have this page cached
      if (pageCache[href]) {
        performSmoothTransition(href, pageCache[href]);
      } else {
        // Add transitioning class without flashing white
        $('body').addClass('page-transitioning');
        
        // Load page content
        $.ajax({
          url: href,
          method: 'GET',
          dataType: 'html',
          success: function(data) {
            pageCache[href] = data;
            performSmoothTransition(href, data);
          },
          error: function() {
            // On error, fall back to normal navigation
            window.location.href = href;
          }
        });
      }
      
      return false;
    });
  }
  
  // Perform smooth transition without flash
  function performSmoothTransition(url, html) {
    const contentSelector = getContentSelector();
    
    // Get current theme from localStorage (matching app.js behavior)
    const currentTheme = localStorage.getItem('theme') || THEME_DARK;
    
    // Set background color based on theme
    const bgColor = currentTheme === THEME_DARK ? DARK_BG_COLOR : LIGHT_BG_COLOR;
    document.documentElement.style.backgroundColor = bgColor;
    document.body.style.backgroundColor = bgColor;
    
    // Parse the HTML response
    const $parsedHTML = $('<div></div>').append($.parseHTML(html));
    const $newContent = $parsedHTML.find(contentSelector).length ? 
                        $parsedHTML.find(contentSelector) : 
                        $parsedHTML.find('body').children();
    
    // Get current scroll position
    const scrollPosition = $(window).scrollTop();
    
    // Fade out current content slightly
    $(contentSelector).css('opacity', '0.8');
    
    // Update page content
    setTimeout(function() {
      // Replace content
      $(contentSelector).html($newContent.html());
      
      // Update page title
      document.title = $parsedHTML.filter('title').text() || document.title;
      
      // Update browser history
      window.history.pushState({path: url}, document.title, url);
      
      // Setup any new scripts and styles
      setupPageAfterChange();
      
      // Remove transitioning class
      $('body').removeClass('page-transitioning');
      
      // Restore opacity
      $(contentSelector).css('opacity', '1');
      
      // Ensure sidebar is updated to reflect new URL
      setTimeout(updateSidebarActiveState, 10);
      
      // Scroll to top for new pages, stay in place for filtered content
      if (url.indexOf('#') === -1 && url.indexOf('?') === -1) {
        $(window).scrollTop(0);
      } else {
        $(window).scrollTop(scrollPosition);
      }
    }, 50);
  }
  
  // Setup page styles to prevent flash
  function setupPageStyles() {
    // Add a style element if it doesn't exist
    if (!$('#no-flash-styles').length) {
      // Add style element that will update dynamically with theme changes
      const styles = `
        /* Smoother animations for content */
        .card, .panel, .widget {
          transition: opacity 0.2s ease-out, transform 0.2s ease-out;
        }

        /* Theme-aware transitions with CSS variables */
        html[data-theme="dark"], 
        html[data-theme="dark"] body,
        html[data-theme="dark"] .page-transitioning {
          background-color: ${DARK_BG_COLOR} !important;
        }

        html[data-theme="light"], 
        html[data-theme="light"] body,
        html[data-theme="light"] .page-transitioning {
          background-color: ${LIGHT_BG_COLOR} !important;
        }
        
        /* Default style if attribute not yet applied */
        html:not([data-theme]), body:not([data-theme]) {
          background-color: ${DARK_BG_COLOR} !important;
        }
      `;
      
      $('head').append('<style id="no-flash-styles">' + styles + '</style>');
    }
    
    // Set up a mutation observer to track theme changes
    if (!window.themeObserver) {
      window.themeObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
          if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
            const theme = document.documentElement.getAttribute('data-theme');
            const bgColor = theme === THEME_DARK ? DARK_BG_COLOR : LIGHT_BG_COLOR;
            document.documentElement.style.backgroundColor = bgColor;
            document.body.style.backgroundColor = bgColor;
          }
        });
      });
      
      window.themeObserver.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-theme']
      });
    }
  }
  
  // Setup page after content change
  function setupPageAfterChange() {
    // Re-initialize any scripts that need to run on the new page content
    
    // Update sidebar active state
    updateSidebarActiveState();
    
    // Re-apply any card/widget animations
    $('.card, .panel, .widget').each(function(index) {
      $(this).css('animation-delay', (0.05 + (index * 0.05)) + 's');
    });
    
    // If you use any plugins that need re-initialization, do it here
    // Example: reinitialize tooltips, datepickers, etc.
    if ($.fn.tooltip) {
      $('[data-toggle="tooltip"]').tooltip();
    }
    
    // Dispatch an event that other scripts can listen for
    $(document).trigger('page:updated');
  }
  
  // Update sidebar active state based on current URL
  function updateSidebarActiveState() {
    // First, remove all active classes
    $('ul#sidebar-menu a').removeClass('active-page');
    $('ul#sidebar-menu li').removeClass('active-page open show');
    
    // Get the current URL
    const currentUrl = window.location.href;
    
    // Find the matching sidebar link
    const $activeLink = $('ul#sidebar-menu a').filter(function() {
      // Check for exact match or if the href is part of the current URL
      return this.href === currentUrl || 
             (currentUrl.indexOf(this.href) > -1 && this.href !== window.location.origin + '/');
    });
    
    // Add active class to the matching link and its parents
    if ($activeLink.length) {
      // Add active-page class to the anchor
      $activeLink.addClass('active-page');
      
      // Add active-page class to parent li
      let $parent = $activeLink.parent();
      $parent.addClass('active-page');
      
      // Go up the DOM and add necessary classes to parent elements
      while ($parent.length && !$parent.is('#sidebar-menu')) {
        if ($parent.is('li')) {
          $parent.addClass('active-page');
        }
        
        if ($parent.is('ul') && !$parent.is('#sidebar-menu')) {
          $parent.addClass('show');
          $parent.parent('li').addClass('open');
        }
        
        $parent = $parent.parent();
      }
    }
  }

  // Handle browser back/forward buttons
  $(window).on('popstate', function(e) {
    if (e.originalEvent.state && e.originalEvent.state.path) {
      const url = e.originalEvent.state.path;
      
      if (pageCache[url]) {
        performSmoothTransition(url, pageCache[url]);
      } else {
        // No cache, do normal load but try to avoid flash
        $('body').addClass('page-transitioning');
        window.location.href = url;
      }
    } else {
      // If no state exists but URL changed, update sidebar anyway
      updateSidebarActiveState();
    }
  });

  // Initialize when document is ready
  $(document).ready(function() {
    // Historically this script handled no-flash page transitions by
    // intercepting link clicks and swapping page content via AJAX.
    // That interferes with some page-level initializers (charts/graphs)
    // which expect a full page load. To avoid breaking dashboard graphs
    // we disable the navigation interception while keeping the code
    // in place so it can be re-enabled later if desired.

    // Apply theme handling and styles (safe to run on initial load)
    setupThemeHandling();
    preloadCriticalAssets();
    setupPageStyles();

    // Do NOT call initPageTransition() to avoid intercepting clicks.
    // initPageTransition();

    // Clean up any overlays and ensure sidebar state is correct
    $('#page-transition-overlay').remove();
    updateSidebarActiveState();

    // Store current page in cache (optional)
    const currentUrl = window.location.href;
    pageCache[currentUrl] = $('html').html();

    // Do not replace history state or pushState; allow normal navigation
    // window.history.replaceState({path: currentUrl}, document.title, currentUrl);
  });

})(jQuery);