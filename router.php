<?php
// Router untuk PHP built-in server
// Menambahkan header agar app bisa di-embed di iframe (Replit preview/Canvas)
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

// File statis yang ada di disk: serve langsung (CSS, JS, images, dll)
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// File statis yang TIDAK ada: return 404
$staticExts = ['css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'ico', 'svg', 'cur', 'woff', 'woff2', 'ttf', 'eot', 'map'];
if (in_array($ext, $staticExts)) {
    http_response_code(404);
    echo "404 Not Found";
    return true;
}

// Untuk file PHP yang ada, jalankan langsung
if (file_exists($file) && !is_dir($file) && $ext === 'php') {
    require $file;
    return true;
}

// Untuk direktori, cari index.php di dalamnya
if (is_dir($file)) {
    $index = rtrim($file, '/') . '/index.php';
    if (file_exists($index)) {
        require $index;
        return true;
    }
}

// Default: root index.php
require __DIR__ . '/index.php';
