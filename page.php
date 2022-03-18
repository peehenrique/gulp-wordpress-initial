<?php get_header(); ?>

<main class="u-spacerTop-30 page-default" data-color="dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <article class="u-textBlock"> 
          <?php
          while (have_posts()) : the_post();
          the_content();
          endwhile;
          ?>
        </article>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
