<?php

//===================================================================
// DEFINE THUMBNAILS SIZE
//===================================================================

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}

if (function_exists('add_image_size')) {
  add_image_size('1280x460', 1280, 460, true); // HERO IMAGE
  add_image_size('370x240', 370, 240, true);   // BLOG POST ARCHIVE
}
