<!doctype html>
<html lang="<?php bloginfo('language'); ?>">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title($sep = '&#45;', true, 'right'); ?></title>
  <meta name="theme-color" content="#104c97">
  <meta name="msapplication-navbutton-color" content="#9cbc4f">
  <meta name="apple-mobile-web-app-status-bar-style" content="#9cbc4f">
  <?php wp_head(); ?>  
</head>

<?php
$home_url = is_front_page() ? '#top' : esc_url(home_url('/'));
?>

<body id="top" class="<?= (is_front_page() ? "front-page" : ""); ?>">
