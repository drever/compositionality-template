<?php
/* Template Name: News Page */
?>

<?php get_header(); ?>

	<div class="row">
    <div class="col-sm-12 standalone">

      <?php 
				$args =  array( 
          'post_type' => 'post-news',
					'orderby' => 'date',
					'order' => 'DESC'
				);
        $news_loop = new WP_Query( $args );
        if ( $news_loop->have_posts() ) : while ( $news_loop->have_posts() ) : $news_loop->the_post(); ?>
            <div class="blog-post">
              <h4 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <h5 class="blog-post-meta"><?php the_date(); ?></h5>
              <?php the_excerpt(); ?>
            </div>
        <?php endwhile;
        else : ?>
          <p>No News Available</p>
        <?php endif;  wp_reset_postdata(); ?>
        
        </div> <!-- /.col -->
  </div> <!-- /.row -->
  
<?php get_footer(); ?>