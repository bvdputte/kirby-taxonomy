<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>
  <?php
    $terms = $page->taxonomycolors()->taxonomyTerms();

    foreach($terms as $term){
      echo $term->name() . " " . $term->toPage()->id() . "<br>";
    }
  ?>
</main>

<?php snippet('footer') ?>
