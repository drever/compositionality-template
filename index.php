<?php
/* Template Name: Papers Page */
?>

<?php get_header();
?>

<div class="blog-main">
<br>
<p>Compositionality describes and quantifies how complex things can be assembled out of simpler parts. <em>Compositionality</em>, this journal, is an open-access, arXiv-overlay journal for research using compositional ideas, most notably of a category-theoretic origin, in any discipline. Topics may concern foundational structures, an organizing principle, or a powerful tool. Example areas include but are not limited to: computation, logic, physics, chemistry, engineering, linguistics, and cognition.</p>
<p><em>Compositionality</em> is published under ISSN 2631-<wbr />4444. For more information, see our <a href=“https://compositionality-journal.org/about/“>About</a> page.</p>
</div>

<br>
<br>


<?php function print_volume( $volume ) { ?>
<div class="blog-main">
<div class="current-issue-back">
<div class="current-issue-center">
<div class="current-issue">
<h5>VOLUME <? echo $volume?> </h5>
</div>
</div>


      <?php
        $paper_loop = new WP_Query(array(
          'post_type' => 'paper',
	  'orderby' => 'date',
          'order' => 'DESC'));
           if ( $paper_loop->have_posts() ) : while ( $paper_loop->have_posts() ) : $paper_loop->the_post(); ?>
            <?php if(get_post_meta(get_the_ID(), 'paper_volume', true) == $volume) { ?>
            <div class="blog-post">
              <p class="blog-post-title col-sm-12">
                              Issue <?php echo get_post_meta(get_the_ID(), 'paper_pages', true) ?>:
                               <span>
                                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                               </span>
              </p>
              <p class="blog-post-meta col-sm-9"><?php
                 echo formatAuthors(
                          get_post_meta(get_the_ID(), 'paper_author_given_names', true),
                          get_post_meta(get_the_ID(), 'paper_author_surnames', true)); ?>
              </p>
              <p class="blog-post-link col-sm-3">
                   <a href="<?php the_permalink(); ?>">abstract</a> |
                   <a href="<?php the_permalink(); echo 'pdf'; ?>" target="_blank">pdf</a>
              </p>
            </div>
            <hr class="paper-line">
           <?php } ?>
        <?php endwhile;
        else : ?>
          <h4>No Papers Available</h4>
        <?php endif;
        wp_reset_postdata(); ?>

</div> <!-- current issue back -->


</div> <!-- blog main -->

<br>
<br>
<?php } ?>

<?php 
      print_volume("2");
      print_volume("1");
?>

<?php get_footer(); ?>
