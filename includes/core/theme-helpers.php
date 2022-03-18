<?php

//===================================================================
// THEME HELPERS
//===================================================================

//-------------------------------------------------------------------
// GET TEMPLATE PART PASSING OPTIONS
// Based in: https://github.com/humanmade/hm-core/blob/master/hm-core.functions.php
//-------------------------------------------------------------------

function get_component($file, $template_args = array(), $cache_args = array()) {

	$template_args = wp_parse_args($template_args);
	$cache_args = wp_parse_args($cache_args);

	if ($cache_args) {
		foreach ($template_args as $key => $value) {
			if (is_scalar($value) || is_array($value)) {
				$cache_args[$key] = $value;
			} else if (is_object($value) && method_exists($value, 'get_id')) {
				$cache_args[$key] = call_user_method( 'get_id', $value );
			}
		}

		if (($cache = wp_cache_get($file, serialize($cache_args))) !== false ) {

			if (!empty($template_args['return']))
      return $cache;

      echo $cache;
			return;
    }
	}

	$file_handle = $file;

	do_action('start_operation', 'hm_template_part::' . $file_handle);

	if (file_exists(get_stylesheet_directory() . '/' . $file . '.php'))
		$file = get_stylesheet_directory() . '/' . $file . '.php';

	elseif (file_exists(get_template_directory() . '/' . $file . '.php'))
		$file = get_template_directory() . '/' . $file . '.php';

	ob_start();
	$return = require($file);
	$data = ob_get_clean();

	do_action('end_operation', 'hm_template_part::' . $file_handle);

	if ($cache_args) {
		wp_cache_set($file, $data, serialize($cache_args), 3600);
	}

	if (!empty($template_args['return']))
		if ($return === false)
			return false;
		else
			return $data;

	echo $data;
}

//-------------------------------------------------------------------
// GET THUMBNAIL URL
//-------------------------------------------------------------------

function get_thumbnail_url($post_id, $size) {
  if (get_post_thumbnail_id($post_id)) {
    $thumb_id = get_post_thumbnail_id($post_id);
    $thumb_url = wp_get_attachment_image_src($thumb_id, $size, true);
    return $thumb_url[0];
  }
  return ASSETS_URL . '/img/thumb-'. $size .'.jpg';
}

function thumbnail_url($post_id, $size) {
  echo get_thumbnail_url($post_id, $size);
}

//-------------------------------------------------------------------
// GET YOUTUBE VIDEO ID FROM URL
//-------------------------------------------------------------------

function getVideoId($url) {
  $parts = parse_url($url);
  if (isset($parts['query'])) {
    parse_str($parts['query'], $qs);
    if (isset($qs['v'])) {
      return $qs['v'];
    } else if (isset($qs['vi'])) {
      return $qs['vi'];
    }
  }

  if (isset($parts['path'])) {
    $path = explode('/', trim($parts['path'], '/'));
    return $path[count($path)-1];
  }

  return false;
}
