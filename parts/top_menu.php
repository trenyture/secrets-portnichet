<?php 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo = $image[0];
?>
<nav id="top-menu">
	<div class="wrapper">
		<h1>
			<a href="<?php echo get_bloginfo('url'); ?>" <?php if ($logo && strlen(trim($logo))>0): ?>style="background-image: url(<?php echo $logo; ?>)"<?php endif ?>><?php echo get_bloginfo('name'); ?>
			</a>
		</h1>
		<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
			<ul id="main-menu">
				<?php 
					$locations = get_nav_menu_locations();
					$menu = wp_get_nav_menu_object( $locations['main-menu'] );
					$items = wp_get_nav_menu_items($menu->term_id);
					foreach ($items as $li) { 
				?>			
					<li>
						<a<?php if(get_queried_object_id() == $li->object_id) { echo ' class="current"'; }?> href="<?php echo $li->url; ?>"><?php
							$title = $li->title;
							$array = preg_split("@(?<=[^A-Za-z0-9-éèê])@", $title);
							$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
							echo implode('', $array);
						?></a>
					</li>
				<?php } ?>
				<!-- LANGUES -->
				<li id="langs">
					<ul>
						<?php pll_the_languages(array(
							"show_names" => 0,
							"show_flags" => 1,
							"hide_current" => 1,
						));?>		
					</ul>
				</li>
				<!-- /LANGUES -->
			</ul>
			<a href="#" id="burger">&#9776;</a>
		<?php endif; ?>	
	</div>
</nav>