<?php
header("Content-Type: text/plain");

// Kukunin ang key mula sa POST request
$user_key = $_POST['key'] ?? '';

// Handle Health Checks (GET/HEAD request sa root path)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($user_key)) {
    http_response_code(200);
    echo "Server is live";
    exit();
}

// Validation at Pagpapadala ng Script (POST request)
if (!empty($user_key)) {
    $file = 'log1.lua';
    
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        http_response_code(404);
        echo "Error: File log1.lua not found on server.";
    }
    exit();
} else {
    http_response_code(403);
    echo "ACCESS DENIED: No key provided";
    exit();
}
?>
