<div class="blog-post">
  <h4 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<h5 class="blog-post-meta"><?php $author = get_post_meta(get_the_ID(), 'author', true); echo $author; ?></h5>

  <?php if ( has_post_thumbnail() ) {?>
		<?php	the_post_thumbnail('thumbnail'); ?>
		<?php the_excerpt(); ?>
	<?php } else { ?>
	<?php the_excerpt(); ?>
	<?php } ?>

</div><!-- /.blog-post -->