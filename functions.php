<?php

//======================================================================
// Viter
//======================================================================

// autoload

use Visia\CustomFields;
use Visia\CustomPostType;
use Visia\Taxonomy;

require __DIR__ . '/vendor/autoload.php';

// Constants
if (!defined('ASSETS_URL')) {
  define('ASSETS_URL', get_template_directory_uri() . '/assets/dist');
}

// Core Files
require_once('includes/core/theme-assets.php');
require_once('includes/core/theme-image-sizes.php');
require_once('includes/core/theme-navigation.php');
require_once('includes/core/theme-helpers.php');
require_once('includes/core/theme-widgets.php');

// Customizations 
require_once('includes/customizations/customize-dashboard.php');
require_once('includes/customizations/customize-excerpt.php');
require_once('includes/customizations/customize-queries.php');
require_once('includes/customizations/customize-wp-head.php');

// Custom Features
require_once('includes/features/breadcrumb.php');
require_once('includes/features/minify-html.php');
require_once('includes/features/relative-url.php');

(new Taxonomy);
(new CustomPostType);
(new CustomFields);
