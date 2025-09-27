<?php
/**
 * Serve the homepage
 */
function serveHomepage() {
    header('Content-Type: text/html; charset=UTF-8');
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Tracker - Welcome</title>
        <link rel="icon" type="image/svg+xml" href="favicon.svg">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            
            .welcome-container {
                background: white;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                overflow: hidden;
                width: 100%;
                max-width: 600px;
                text-align: center;
                animation: slideUp 0.6s ease;
            }
            
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .welcome-header {
                background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                color: white;
                padding: 40px;
            }
            
            .welcome-header h1 {
                font-size: 2.5rem;
                margin-bottom: 10px;
            }
            
            .welcome-header p {
                font-size: 1.2rem;
                opacity: 0.9;
            }
            
            .welcome-content {
                padding: 40px;
            }
            
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                margin: 30px 0;
            }
            
            .feature {
                padding: 20px;
                background: #f8f9fa;
                border-radius: 10px;
                border-left: 4px solid #4facfe;
            }
            
            .feature h3 {
                color: #333;
                margin-bottom: 10px;
            }
            
            .feature p {
                color: #666;
                font-size: 0.9rem;
            }
            
            .actions {
                margin-top: 30px;
            }
            
            .btn {
                display: inline-block;
                padding: 12px 30px;
                margin: 10px;
                background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                color: white;
                text-decoration: none;
                border-radius: 25px;
                font-weight: 600;
                transition: transform 0.2s ease;
            }
            
            .btn:hover {
                transform: translateY(-2px);
            }
            
            .btn-secondary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
        </style>
    </head>
    <body>
        <div class="welcome-container">
            <div class="welcome-header">
                <h1>Payment Tracker</h1>
                <p>Streamline your payment management with our comprehensive tracking system</p>
            </div>
            
            <div class="welcome-content">
                <div class="features">
                    <div class="feature">
                        <h3>📊 Dashboard</h3>
                        <p>Track payments, view analytics, and manage your financial data</p>
                    </div>
                    <div class="feature">
                        <h3>📅 Calendar View</h3>
                        <p>Visualize payments by date with our interactive calendar</p>
                    </div>
                    <div class="feature">
                        <h3>👥 User Management</h3>
                        <p>Admin controls for user registration and access management</p>
                    </div>
                </div>
                
                <div class="actions">
                    <a href="/login" class="btn">Login to Your Account</a>
                    <a href="/calendar" class="btn btn-secondary">View Calendar</a>
                </div>
                
                <p style="margin-top: 20px; color: #666; font-size: 0.9rem;">
                    New to Payment Tracker? Contact your administrator for access.
                </p>
            </div>
        </div>
    </body>
    </html>
    <?php
}

/**
 * Main entry point for the Registration System
 * Handles routing and serves the appropriate page based on the request
 */

// Get the requested path
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = trim($path, '/');

// Remove query parameters for routing
$basePath = strtok($path, '?');

// Define routes
switch ($basePath) {
    case '':
    case 'index.php':
        // Default route - serve homepage
        serveHomepage();
        exit;
        
    case 'login':
        serveFile('login.html');
        break;
        
    case 'admin':
        serveFile('admin.html');
        break;
        
    case 'calendar':
    case 'calendar-app':
        serveFile('calendar-app.html');
        break;
        
    case 'logo.svg':
        serveFile('logo.svg', 'image/svg+xml');
        break;
        
    case 'favicon.svg':
        serveFile('favicon.svg', 'image/svg+xml');
        break;
        
    default:
        // Check if it's a static file
        if (file_exists(__DIR__ . '/' . $basePath)) {
            serveFile($basePath);
        } else {
            // 404 Not Found
            http_response_code(404);
            echo '<h1>404 - Page Not Found</h1>';
            echo '<p>The requested page could not be found.</p>';
            echo '<a href="/login">Go to Login</a>';
        }
        break;
}

/**
 * Serve a file with appropriate headers
 */
function serveFile($filename, $contentType = null) {
    $filePath = __DIR__ . '/' . $filename;
    
    if (!file_exists($filePath)) {
        http_response_code(404);
        echo '<h1>404 - File Not Found</h1>';
        return;
    }
    
    // Set content type based on file extension if not provided
    if ($contentType === null) {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        switch ($extension) {
            case 'html':
                $contentType = 'text/html; charset=UTF-8';
                break;
            case 'css':
                $contentType = 'text/css';
                break;
            case 'js':
                $contentType = 'application/javascript';
                break;
            case 'svg':
                $contentType = 'image/svg+xml';
                break;
            case 'png':
                $contentType = 'image/png';
                break;
            case 'jpg':
            case 'jpeg':
                $contentType = 'image/jpeg';
                break;
            case 'gif':
                $contentType = 'image/gif';
                break;
            default:
                $contentType = 'application/octet-stream';
        }
    }
    
    // Set headers
    header('Content-Type: ' . $contentType);
    header('Content-Length: ' . filesize($filePath));
    
    // Cache headers for static assets
    if (in_array(pathinfo($filename, PATHINFO_EXTENSION), ['svg', 'png', 'jpg', 'jpeg', 'gif', 'css', 'js'])) {
        header('Cache-Control: public, max-age=31536000'); // 1 year
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
    
    // Output file content
    readfile($filePath);
}

/**
 * Get client IP address
 */
function getClientIP() {
    $ipKeys = ['HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'HTTP_CLIENT_IP', 'REMOTE_ADDR'];
    
    foreach ($ipKeys as $key) {
        if (!empty($_SERVER[$key])) {
            $ips = explode(',', $_SERVER[$key]);
            return trim($ips[0]);
        }
    }
    
    return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
}

/**
 * Log access for security monitoring
 */
function logAccess($page) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . getClientIP() . ' - ' . $page . ' - ' . ($_SERVER['HTTP_USER_AGENT'] ?? 'unknown') . PHP_EOL;
    file_put_contents(__DIR__ . '/access.log', $logEntry, FILE_APPEND | LOCK_EX);
}

// Log the access
logAccess($basePath);
?>