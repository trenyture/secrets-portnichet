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

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus(
				array(
					'main-menu' => __( 'Main Menu', 'pornichet' ),
				)
			);

			remove_filter( 'the_content', 'wpautop' );
			remove_filter( 'the_excerpt', 'wpautop' );

			if (class_exists('MultiPostThumbnails')) {
				$types = array('post', 'page', 'enqueteurs');
				foreach($types as $type) {
					new MultiPostThumbnails(
						array(
							'label' => 'Image Rectangulaire (1200x400)',
							'id' => 'rectangular-image',
							'post_type' => $type
						)
					);
				}
			}
			add_image_size('post-rectangular-image-thumbnail', 1200, 500);
		}
	endif;
	add_action( 'after_setup_theme', 'secretsThemeSetup' );


	// Register Custom Post Type
	function customPostType() {

		$labels = array(
			'name'                  => 'Enquêteurs',
			'singular_name'         => 'Enquêteur',
			'menu_name'             => 'Enquêteurs',
			'name_admin_bar'        => 'Enquêteur',
			'archives'              => 'Enquêteurs Archives',
			'attributes'            => 'Enquêteurs Attributs',
			'parent_item_colon'     => 'Enquêteur parent:',
			'all_items'             => 'Tous les items',
			'add_new_item'          => 'Ajouter nouveau',
			'add_new'               => 'Ajouter nouveau',
			'new_item'              => 'Nouvel item',
			'edit_item'             => 'Éditer l\'item',
			'update_item'           => 'Éditer l\'item',
			'view_item'             => 'Voir l\'item',
			'view_items'            => 'Voir les items',
			'search_items'          => 'Chercher un item',
			'not_found'             => 'Rien trouvé',
			'not_found_in_trash'    => 'Rien trouvé dans la corbeille',
			'featured_image'        => 'Image mise en avant',
			'set_featured_image'    => 'Mettre image mise en avant',
			'remove_featured_image' => 'Supprimer image mise en avant',
			'use_featured_image'    => 'Utiliser image',
			'insert_into_item'      => 'Insérer dans l\'item',
			'uploaded_to_this_item' => 'Télécharger ans cet item',
			'items_list'            => 'Liste d\'items',
			'items_list_navigation' => 'Liste d\'items par navigation',
			'filter_items_list'     => 'Filtrer la liste d\'items',
		);
		$args = array(
			'label'                 => 'Enquêteurs',
			'description'           => 'Ajout des différents types d\'Enquêteurs',
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest'          => true,
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-universal-access',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'enqueteurs', $args );

	}
	add_action( 'init', 'customPostType', 0 );
?>