<?php 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo = $image[0];
?>
<nav>
	<h1<?php if ($logo && strlen(trim($logo))>0): ?>style="background-image: url(<?php echo $logo; ?>)"<?php endif ?>><?php echo get_bloginfo('name'); ?></h1>
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