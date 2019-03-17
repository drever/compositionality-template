<?php

         function formatAuthors($authorfirst, $authorlast) {
		 $author = array_map(function ($x, $y) { return $x . " " . $y; }, $authorfirst, $authorlast);

                 $numAuthors = count($author);
		 if($numAuthors == 1){
                    return $author[0];
                 }
                 else if($numAuthors == 2) {
                    return $author[0] . " and " . $author[1];
                 }
                 else if($numAuthors > 2){
                    return implode(", ", array_slice($author, 0, $numAuthors - 1))
                           . ", and " . $author[$numAuthors - 1];
                 }
         }

// Add scripts and stylesheets
function compositionality_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
}

add_action( 'wp_enqueue_scripts', 'compositionality_scripts' );

// WordPress Titles
add_theme_support( 'title-tag' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );

// Custom Post Type: News
function create_custom_post() {
	register_post_type( 'post-news',
			array(
			'labels' => array(
					'name' => __( 'News' ),
					'singular_name' => __( 'News' ),
			),
			'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'news'),
			'supports' => array(
					'title',
          'editor',
          'excerpt',
					'thumbnail',
				  'custom-fields'
			)
	));
}
add_action( 'init', 'create_custom_post' );

// Path to Image Directory
if( !defined(image_path)){
  define( 'image_path', get_stylesheet_directory_uri() . '/images' );
 }

 // Custom Nav Menu
function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

// Custom Color Picker
function create_custom_appearance($wp_customize) {
  $wp_customize->add_setting('primary_color', array(
    'default'   => '#FF5A5F',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('secondary_color', array(
    'default'   => '#aaaaaa',
    'transport' => 'refresh',
  ));
  $wp_customize->add_section('compositionality_colors', array(
    'title' => __('Compositionality Colors','Compositionality'),
    'priority' => 30,
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'compositionality_primary_control', array(
    'label' => __('Primary Color', 'Compositionality'),
    'section' => 'compositionality_colors',
    'settings' => 'primary_color',
  )));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'compositionality_secondary_control', array(
    'label' => __('Secondary Color', 'Compositionality'),
    'section' => 'compositionality_colors',
    'settings' => 'secondary_color',
  )));
}
add_action('customize_register', 'create_custom_appearance');

// Output Customized CSS
function customized_css() { ?>

  <style type="text/css">
    a,
    .blog-nav li a:hover,
    .blog-nav li.current-menu-item > a,
    .blog-description {
      color: <?php echo get_theme_mod('primary_color'); ?>;
    }
    .current-issue h5,
    .blog-nav li a {
      color: <?php echo get_theme_mod('secondary_color'); ?>;
    }
  </style>

<?php }
add_action('wp_head','customized_css');

// Custom Theme Logo
function themename_custom_logo_setup() {
  $defaults = array(
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

?>
