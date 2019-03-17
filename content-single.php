<div class="blog-post">

  <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    }
    the_content();
  ?>
</div><!-- /.blog-post -->
