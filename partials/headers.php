<?php
// ob_start(); // Start output buffering to prevent issues with sending headers
// Ensure the site is served over HTTPS
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
}
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
#header("Content-Security-Policy: default-src 'self'; script-src 'self'; object-src 'self'; base-uri 'self'; upgrade-insecure-requests;");
header("Referrer-Policy: no-referrer");
header("Permissions-Policy: geolocation=(), microphone=(), camera=(), autoplay=(self)"); // Adjust policies as needed
//exit;