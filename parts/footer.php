	<footer>
		<?php 
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations['footer-menu'] );
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
		<p>Création du site : <a target="_blank" id="str" href="http://simon-tr.com">Simon Trichereau</a></p>
	</footer>
	<?php if (!is_front_page()): ?>
		</div>
	<?php endif ?>
	<?php wp_footer(); ?>
</body>
</html>