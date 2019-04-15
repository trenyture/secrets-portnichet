<?php 

	if ( ! function_exists( 'secretsThemeSetup' ) ) :
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		function secretsThemeSetup() {

			add_post_type_support( 'page', 'excerpt' );
			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 1568, 9999 );

			add_theme_support( 'custom-background' );
			add_theme_support( 'custom-logo' );

			//Rajout des catégories sur les pages
			register_taxonomy_for_object_type('post_tag', 'page'); 
			register_taxonomy_for_object_type('category', 'page');

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus(
				array(
					'footer-menu' => __( 'Menu Footer', 'pornichet' ),
					'main-menu' => __( 'Main Menu', 'pornichet' ),
				)
			);

			remove_filter( 'the_content', 'wpautop' );
			remove_filter( 'the_excerpt', 'wpautop' );

			register_sidebar(
				array(
					'name'          => __( 'SideBar', 'pornichet' ),
					'id'            => 'sidebar-1',
					'description'   => __( 'Add widgets here to appear in your footer.', 'pornichet' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}
	endif;
	add_action( 'after_setup_theme', 'secretsThemeSetup' );

?>