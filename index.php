<?php get_header(); ?>

	<div class="row">

	<div class="blog-main">
    <div class="current-issue-back">
      <div class="current-issue-center">
        <div class="current-issue">
          <h5>LATEST PAPERS</h5>
        </div>
      </div>

      <!-- FIRST LOOP: display posts 1 thru 5 -->
      <div id="first-loop" class="col-md-6">
        <?php query_posts('showposts=4'); ?>
        <?php $posts = get_posts('numberposts=4&offset=0'); foreach ($posts as $post) : start_wp(); ?>
        <?php static $count1 = 0; if ($count1 == "4") { break; } else { ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

        <?php $count1++; } ?>
        <?php endforeach; ?>
      </div>

      <!-- SECOND LOOP: display posts 6 thru 10 -->
      <div id="loop-wrapper">
      <div id="second-loop" class="col-md-6">
        <?php query_posts('showposts=4'); ?>
        <?php $posts = get_posts('numberposts=5&offset=4'); foreach ($posts as $post) : start_wp(); ?>
        <?php static $count2 = 0; if ($count2 == "4") { break; } else { ?>

        <?php get_template_part( 'content', get_post_format() ); ?>


        <?php $count2++; } ?>
        <?php endforeach; ?>
      </div>
      </div>

      </div>
    </div>
  </div>

		</div> <!-- /.blog-main -->

	</div> <!-- /.row -->

<?php get_footer(); ?>
