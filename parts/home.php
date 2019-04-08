<?php 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo = $image[0];
	$frontPageId = get_the_ID();
?>
<main id="homepage">
	<header>
		<h1 <?php if ($logo && strlen(trim($logo))>0): ?>style="background-image: url(<?php echo $logo; ?>)"<?php endif ?>><?php echo get_bloginfo('name'); ?>
		</h1>
		<ul id="langs">
			<?php pll_the_languages(array(
				"show_names" => 0,
				"show_flags" => 1,
			));?>
		</ul>
	</header>
	<?php
		$content = apply_filters( 'get_the_content', get_post( get_option( 'page_on_front' ) )->post_content );
		if(strlen(trim($content)) > 0) {
			echo "<main>" . $content . "</main>";
		}
	?>
	<?php 
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations['main-menu'] );
		$items = wp_get_nav_menu_items($menu->term_id);
		if(count($items) > 0) {
	?>
		<nav>
			<ul>
				<?php
					foreach ($items as $li) { 
				?>			
					<li>
						<a href="<?php echo $li->url; ?>"><?php echo $li->title; ?></a>
					</li>
				<?php } ?>
			</ul>
		</nav>
	<?php
		}
	?>
</main>