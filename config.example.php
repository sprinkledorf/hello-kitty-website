<?php
/**
 * Configuration Example File
 * This file shows how to handle configuration in PHP applications
 * 
 * SECURITY TIP: Never commit actual config files with real values!
 * Use this as a template and create your own config.php file
 */

// ============================================================================
// DATABASE CONFIGURATION (Example)
// ============================================================================
// In a real application, you might connect to a database
// These are example values - replace with your actual database details

define('DB_HOST', 'localhost');
define('DB_NAME', 'hello_kitty_db');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// ============================================================================
// APPLICATION SETTINGS
// ============================================================================

// Site information
define('SITE_NAME', 'Hello Kitty Characters & Lore');
define('SITE_URL', 'http://localhost:8000');
define('SITE_DESCRIPTION', 'A beginner-friendly PHP website showcasing Hello Kitty characters');

// Security settings
define('MAX_SEARCH_LENGTH', 100);
define('ALLOWED_FILE_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB

// ============================================================================
// ENVIRONMENT SETTINGS
// ============================================================================

// Development vs Production settings
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    // Development environment
    define('ENVIRONMENT', 'development');
    define('DEBUG_MODE', true);
    define('ERROR_REPORTING', E_ALL);
} else {
    // Production environment
    define('ENVIRONMENT', 'production');
    define('DEBUG_MODE', false);
    define('ERROR_REPORTING', 0);
}

// ============================================================================
// SECURITY FUNCTIONS USING CONFIG
// ============================================================================

/**
 * Get database connection (example)
 * SECURITY TIP: Use prepared statements in real applications
 */
function getDatabaseConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        if (DEBUG_MODE) {
            die("Database connection failed: " . $e->getMessage());
        } else {
            die("Database connection failed. Please try again later.");
        }
    }
}

/**
 * Log errors securely
 * SECURITY TIP: Don't expose sensitive information in production
 */
function logError($message, $file = 'error.log') {
    if (ENVIRONMENT === 'development') {
        error_log($message, 3, $file);
    }
    // In production, you might want to send errors to a monitoring service
}

// ============================================================================
// USAGE EXAMPLE
// ============================================================================

// Example of how to use these constants in your main application
/*
// In your main PHP file, include this config:
require_once 'config.php';

// Use the constants
echo "Welcome to " . SITE_NAME;
echo "Running in " . ENVIRONMENT . " mode";

// Validate input using config
$searchTerm = $_GET['search'] ?? '';
if (strlen($searchTerm) > MAX_SEARCH_LENGTH) {
    die("Search term too long");
}
*/

// ============================================================================
// NOTES FOR BEGINNERS
// ============================================================================

/*
1. ALWAYS use define() for configuration values that don't change
2. NEVER commit real passwords or API keys to version control
3. Use different config files for different environments
4. Consider using environment variables for sensitive data
5. Keep configuration separate from your main application logic
6. Use constants instead of variables for configuration values
7. Document your configuration options clearly
*/
?>
