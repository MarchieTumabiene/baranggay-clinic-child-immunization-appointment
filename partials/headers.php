<?php
// Start output buffering to prevent issues with sending headers
if (!headers_sent()) {
    // Ensure the site is served over HTTPS
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
    }
    
    // Prevent clickjacking
    header('X-Frame-Options: SAMEORIGIN');
    
    // Protect against MIME-type sniffing
    header('X-Content-Type-Options: nosniff');
    
    // Content Security Policy (CSP) - Uncomment and customize as needed
    // header("Content-Security-Policy: default-src 'self'; script-src 'self'; object-src 'self'; base-uri 'self'; upgrade-insecure-requests;");
    
    // Referrer Policy
    header('Referrer-Policy: no-referrer');
    
    // Permissions Policy - Adjust permissions as needed
    header("Permissions-Policy: geolocation=(), microphone=(), camera=(), autoplay=(self)");

    // XSS Protection Header
    header('X-XSS-Protection: 1; mode=block');

} else {
    error_log('Headers already sent. Unable to set security headers or cookies.');
}
?>
