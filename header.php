<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="A new diamond open-access journal for research using compositional ideas, most notably of a category-theoretic origin, in any discipline.">
    <meta name="keywords" content="compositionality, category theory, open access, journal, mathematics, computation, logic, physics, chemistry, engineering, linguistics, cognition">
    <meta name="author" content="Stephanie Ku">
    <meta name="google-site-verification" content="XKzj6jdMMAWAG46HXC949EIfj4KPnSJcSod2mObN8RY" />
    <?php wp_head();?>
  </head>

  <body>

<!--  PRIMARY NAVIGATION -->

    <div class="container">
      <div class="blog-header">

        <nav class="blog-nav">
          <h5><?php wp_nav_menu( array(
            'theme_location' => 'my-custom-menu',
            'container_class' => 'custom-menu-class'
          ) ); ?></h5>
        </nav>
        <div class="logo"><?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?></div>


          <h1 class="blog-title"><?php echo get_bloginfo( 'name' ); ?></h1>
      <h5 class="blog-description"><?php echo get_bloginfo( 'description' ); ?></h5>

      </div>