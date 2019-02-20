<main id="homepage">

	<?php if ( has_nav_menu( 'home' ) ) : ?>
	<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'home',
				'menu_class'     => 'homepage-links',
				// 'link_before'    => '<span class="screen-reader-text">',
				// 'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
				// 'depth'          => 1,
			)
		); ?>
	</nav>
	<?php endif; ?>
</main>