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

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'header' => __( 'Header', 'pornichet' ),
				'footer' => __( 'Footer', 'pornichet' ),
				'home' => __( 'Home Page', 'pornichet' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'secretsThemeSetup' );

/**
 * LES CUSTOM POSTS TYPES
 */
function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		'name'                => _x('Menus Accueil', 'Post Type General Name'),
		'singular_name'       => _x('Menu Accueil', 'Post Type Singular Name'),
		'menu_name'           => __('Menu Accueil'),
		'all_items'           => __( 'Tous les menus'),
		'view_item'           => __( 'Voir les menus'),
		'add_new_item'        => __( 'Ajouter un nouveau menu'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le menu'),
		'update_item'         => __( 'Modifier le menu'),
		'search_items'        => __( 'Rechercher un menu'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	$args = array(
		'label'               => __( 'Menus Accueil'),
		'description'         => __( 'Tous les menus vu par les Visiteurs de la page d\'accueil'),
		'labels'              => $labels,
		'show_in_rest'        => true,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'),
		/* 
		* Différentes options supplémentaires
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'menu-home'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'seriestv', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

?>