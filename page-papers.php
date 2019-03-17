<?php
/* Template Name: Papers Page */
?>

<?php get_header(); 
?>
<div class="blog-main">
<div class="current-issue-back">
<div class="current-issue-center">
<div class="current-issue">
<h5>PAPERS</h5>
</div>
</div>
	<div class="row">
		<div class="col-sm-12">

      <?php 
        $paper_loop = new WP_Query(array( 
          'post_type' => 'paper',
	  'orderby' => 'date',
          'order' => 'DESC'));
        if ( $paper_loop->have_posts() ) : while ( $paper_loop->have_posts() ) : $paper_loop->the_post(); ?>
            <div class="blog-post">
              <p class="blog-post-title col-sm-9"><span><?php the_title(); ?></span></p>
              <p class="blog-post-meta col-sm-9"><?php
                 echo formatAuthors(
                          get_post_meta(get_the_ID(), 'paper_author_given_names', true), 
                          get_post_meta(get_the_ID(), 'paper_author_surnames', true)); ?>
              </p>
              <p class="blog-post-link col-sm-3">
                   <a href="<?php the_permalink(); ?>">abstract</a> | 
                   <a href="<?php $author = get_post_meta(get_the_ID(), 'pdf-link', true); echo $author; ?>" target="_blank">pdf</a>
              </p>
            </div>
            <hr class="paper-line">
        <?php endwhile;
        else : ?>
          <h4>No Papers Available</h4>
        <?php endif;  
        wp_reset_postdata(); ?>

		</div> <!-- /.col -->
	</div> <!-- /.row -->
</div>
</div>
<?php get_footer(); ?>
