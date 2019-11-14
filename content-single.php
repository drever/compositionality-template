<div class="blog-post">

  <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    }
    echo "<h2>"; 
    the_title();
    echo "</h2>";
    the_content(); 
  ?>
</div><!-- /.blog-post -->
