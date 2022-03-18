<?php

//===================================================================
// THEME ASSETS
//===================================================================

//-------------------------------------------------------------------
// DENQUEUE/DEREGISTER UNUSED ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'clean_assets');

function clean_assets() {
  if (is_admin()) return;
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');

  wp_deregister_script('jquery');
  wp_deregister_script('owlcarousel');
  wp_deregister_script('wp-embed');
}

//-------------------------------------------------------------------
// ENQUEUE THEME ASSETS
//-------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'theme_assets');

function theme_assets() {
  if (is_admin()) return;

  wp_enqueue_style('styles', ASSETS_URL . '/css/main.css', false, '0.0.5', 'all');
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', false, '3.4.1', true);
  wp_enqueue_script('owlcarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', false, '2.3.4', true);
  wp_enqueue_script('scripts', ASSETS_URL . '/js/main.js', false, '0.0.4', true);
}

//-------------------------------------------------------------------
// FORCE GRAVITY FORMS JS TO THE FOOTER
//-------------------------------------------------------------------

add_filter('gform_init_scripts_footer', '__return_true');

add_filter('gform_cdata_open', 'wrap_gform_cdata_open');
function wrap_gform_cdata_open($content = '') {
	$content = 'document.addEventListener("DOMContentLoaded", function() { ';
	return $content;
}

add_filter('gform_cdata_close', 'wrap_gform_cdata_close');
function wrap_gform_cdata_close($content = '') {
	$content = ' }, false);';
	return $content;
}


