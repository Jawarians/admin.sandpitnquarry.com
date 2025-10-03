// Anti-Flash Theme Detector & Handler
// This script detects the theme and ensures no white flash occurs during transitions

document.addEventListener("DOMContentLoaded", function() {
  // Theme constants - exact background colors used in your design system
  const DARK_BG = '#252b3b';  // Dark theme background (from your dashboard)
  const LIGHT_BG = '#f5f7fb'; // Light theme background

  // Get theme from localStorage (your app already uses this)
  function getThemePreference() {
    // Read from localStorage (this matches your app.js implementation)
    return localStorage.getItem('theme') || 'dark'; // Default to dark based on screenshot
  }
  
  // Set theme based on the current preference
  function applyThemeNoFlash() {
    const theme = getThemePreference();
    const isDark = theme === 'dark';
    
    // Set theme attributes in a way that won't conflict with your app.js
    if (!document.documentElement.hasAttribute('data-theme')) {
      document.documentElement.setAttribute('data-theme', theme);
    }
    
    // Apply background color immediately to both html and body to prevent flash
    applyBackgroundColor(isDark);
    
    return isDark;
  }
  
  // Apply the correct background color based on theme
  function applyBackgroundColor(isDark) {
    const bgColor = isDark ? DARK_BG : LIGHT_BG;
    
    // Apply to both HTML and body with !important to prevent flash
    document.documentElement.style.backgroundColor = bgColor;
    document.body.style.backgroundColor = bgColor;
    
    // Create or update our anti-flash styles
    updateAntiFlashStyles(isDark);
  }
  
  // Create/update styles to prevent flash during theme changes
  function updateAntiFlashStyles(isDark) {
    const bgColor = isDark ? DARK_BG : LIGHT_BG;
    
    // Get or create our style element
    let styleEl = document.getElementById('anti-flash-styles');
    if (!styleEl) {
      styleEl = document.createElement('style');
      styleEl.id = 'anti-flash-styles';
      document.head.appendChild(styleEl);
    }
    
    // Update the styles with the current theme
    styleEl.textContent = `
      html, body { 
        background-color: ${bgColor} !important; 
        transition: background-color 0.3s ease;
      }
      .page-transitioning {
        background-color: ${bgColor} !important;
      }
    `;
  }
  
  // Setup theme change listener to avoid flashes during theme toggling
  function setupThemeChangeListener() {
    // Monitor for theme changes from your app.js toggle
    const themeObserver = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
          const newTheme = document.documentElement.getAttribute('data-theme');
          applyBackgroundColor(newTheme === 'dark');
        }
      });
    });
    
    // Watch for attribute changes on the html element
    themeObserver.observe(document.documentElement, { 
      attributes: true,
      attributeFilter: ['data-theme']
    });
    
    // Also listen for storage events (in case theme is changed in another tab)
    window.addEventListener('storage', function(e) {
      if (e.key === 'theme') {
        applyBackgroundColor(e.newValue === 'dark');
      }
    });
  }
  
  // Initialize
  const isDark = applyThemeNoFlash();
  setupThemeChangeListener();
  
  // Apply correct background color on first load
  document.addEventListener('DOMContentLoaded', function() {
    // Delay slightly to ensure DOM is fully loaded
    setTimeout(() => {
      applyBackgroundColor(getThemePreference() === 'dark');
    }, 50);
  });
});