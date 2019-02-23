<?php
	
?>

<nav>
	<h1><?php echo get_bloginfo('name'); ?></h1>
	<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
	<ul>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'main-menu',
				'menu_class'     => 'main-menu',
				'items_wrap'     => '<li>%3$s</li>',
			)
		);
	?>
	</ul>
	<?php endif; ?>	
	<a href="#" id="burger">&#9776;</a>
</nav>