<?php
/**
 * Security Demo Script for Learning PHP Security
 * This file demonstrates various security concepts and vulnerabilities
 * 
 * WARNING: This is for educational purposes only!
 * Some of these examples show BAD practices that should be avoided
 */

// ============================================================================
// SECURITY CONCEPT 1: INPUT VALIDATION AND SANITIZATION
// ============================================================================

echo "<h2>🔒 Security Demo: Input Validation & Sanitization</h2>";

// BAD EXAMPLE - Don't do this!
function badInputHandling($userInput) {
    // This is dangerous - no validation or sanitization
    return $userInput;
}

// GOOD EXAMPLE - Always do this!
function goodInputHandling($userInput) {
    // Step 1: Validate the input
    if (empty($userInput) || strlen($userInput) > 100) {
        return false;
    }
    
    // Step 2: Sanitize the input
    $sanitized = htmlspecialchars(trim($userInput), ENT_QUOTES, 'UTF-8');
    
    // Step 3: Additional validation (e.g., only letters and spaces)
    if (!preg_match('/^[a-zA-Z\s]+$/', $sanitized)) {
        return false;
    }
    
    return $sanitized;
}

// ============================================================================
// SECURITY CONCEPT 2: SQL INJECTION PREVENTION
// ============================================================================

echo "<h3>🛡️ SQL Injection Prevention</h3>";

// BAD EXAMPLE - Vulnerable to SQL injection
function badDatabaseQuery($username) {
    // NEVER do this - it's vulnerable to SQL injection!
    $query = "SELECT * FROM users WHERE username = '$username'";
    return $query;
}

// GOOD EXAMPLE - Using prepared statements
function goodDatabaseQuery($username) {
    // This is safe - using prepared statements
    $query = "SELECT * FROM users WHERE username = ?";
    // In real code, you'd use PDO or mysqli with prepared statements
    return "Safe query with prepared statement for: " . htmlspecialchars($username);
}

// ============================================================================
// SECURITY CONCEPT 3: XSS (Cross-Site Scripting) PREVENTION
// ============================================================================

echo "<h3>🚫 XSS Prevention</h3>";

// BAD EXAMPLE - Vulnerable to XSS
function badXSSHandling($userComment) {
    // This is dangerous - allows script injection
    return $userComment;
}

// GOOD EXAMPLE - XSS protection
function goodXSSHandling($userComment) {
    // htmlspecialchars() converts <script> to &lt;script&gt;
    return htmlspecialchars($userComment, ENT_QUOTES, 'UTF-8');
}

// ============================================================================
// SECURITY CONCEPT 4: PASSWORD SECURITY
// ============================================================================

echo "<h3>🔐 Password Security</h3>";

// BAD EXAMPLE - Never store passwords in plain text
function badPasswordStorage($password) {
    // NEVER do this!
    return $password; // Storing plain text password
}

// GOOD EXAMPLE - Proper password hashing
function goodPasswordStorage($password) {
    // Use password_hash() for secure password storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashedPassword;
}

function verifyPassword($password, $hashedPassword) {
    // Use password_verify() to check passwords
    return password_verify($password, $hashedPassword);
}

// ============================================================================
// SECURITY CONCEPT 5: FILE UPLOAD SECURITY
// ============================================================================

echo "<h3>📁 File Upload Security</h3>";

function secureFileUpload($file) {
    // Define allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    
    // Check file type
    if (!in_array($file['type'], $allowedTypes)) {
        return "Error: Invalid file type";
    }
    
    // Check file size
    if ($file['size'] > $maxSize) {
        return "Error: File too large";
    }
    
    // Generate secure filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $secureFilename = uniqid() . '.' . $extension;
    
    return "Safe filename: " . $secureFilename;
}

// ============================================================================
// SECURITY CONCEPT 6: SESSION SECURITY
// ============================================================================

echo "<h3>🔑 Session Security</h3>";

function startSecureSession() {
    // Start session with secure settings
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_strict_mode', 1);
    
    session_start();
    
    // Regenerate session ID to prevent session fixation
    session_regenerate_id(true);
}

// ============================================================================
// DEMO OUTPUT
// ============================================================================

echo "<div style='background: #f0f8ff; padding: 20px; margin: 20px 0; border-radius: 10px;'>";
echo "<h4>Demo Results:</h4>";

// Test input validation
$testInput = "<script>alert('XSS Attack!')</script>";
echo "<p><strong>Bad Input Handling:</strong> " . badInputHandling($testInput) . "</p>";
echo "<p><strong>Good Input Handling:</strong> " . (goodInputHandling($testInput) ?: "Invalid input rejected") . "</p>";

// Test XSS prevention
echo "<p><strong>Bad XSS Handling:</strong> " . badXSSHandling($testInput) . "</p>";
echo "<p><strong>Good XSS Handling:</strong> " . goodXSSHandling($testInput) . "</p>";

// Test password hashing
$testPassword = "mySecretPassword123";
$hashedPassword = goodPasswordStorage($testPassword);
echo "<p><strong>Password Hash:</strong> " . $hashedPassword . "</p>";
echo "<p><strong>Password Verification:</strong> " . (verifyPassword($testPassword, $hashedPassword) ? "Valid" : "Invalid") . "</p>";

echo "</div>";

// ============================================================================
// SECURITY CHECKLIST FOR BEGINNERS
// ============================================================================

echo "<div style='background: #fff3cd; padding: 20px; margin: 20px 0; border-radius: 10px; border-left: 5px solid #ffc107;'>";
echo "<h3>📋 Security Checklist for PHP Beginners</h3>";
echo "<ul>";
echo "<li>✅ Always validate and sanitize user input</li>";
echo "<li>✅ Use prepared statements for database queries</li>";
echo "<li>✅ Escape output with htmlspecialchars()</li>";
echo "<li>✅ Hash passwords with password_hash()</li>";
echo "<li>✅ Validate file uploads (type, size, content)</li>";
echo "<li>✅ Use HTTPS in production</li>";
echo "<li>✅ Keep PHP and dependencies updated</li>";
echo "<li>✅ Use secure session settings</li>";
echo "<li>✅ Implement CSRF protection for forms</li>";
echo "<li>✅ Set proper file permissions</li>";
echo "</ul>";
echo "</div>";

?>
