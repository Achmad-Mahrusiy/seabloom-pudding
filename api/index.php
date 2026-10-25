<?php

// Entry point Laravel untuk Vercel.
$viewPath = '/tmp/views';

if (!is_dir($viewPath)) {
    mkdir($viewPath, 0775, true);
}

require __DIR__ . '/../public/index.php';
