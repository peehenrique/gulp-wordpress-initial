<main role="main">
  <?php
  $sections = array(
    'example'
  );

  foreach ($sections as $section) {
    get_template_part('template-parts/front-page/section', $section);
  }
  ?>
</main>