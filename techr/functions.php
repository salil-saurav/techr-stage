<?php

/**
 * Main functions file
 * Auto-loads all PHP files from inc and components/utility directories
 */

if (!defined('ABSPATH')) exit;

/**
 * Require inc files
 */

foreach (glob(__DIR__ . '/includes/*.php') as $file) {
    require_once $file;
}

/**
 * Require components utility files
 */

foreach (glob(__DIR__ . '/components/utility/*.php') as $utility_files) {
    require_once $utility_files;
}

/**
 * Require Meta fields
 */

require_once __DIR__ . '/meta-fields/theme-option.php';
require_once __DIR__ . '/meta-fields/meta-index.php';
