<div class="blog-post">
  <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<h3 class="blog-post-meta"><?php $author = get_post_meta(get_the_ID(), 'Author', true); echo $author; ?></h3>
</div><!-- /.blog-post -->