	<footer>
		<?php 
			dynamic_sidebar('footer');
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
		<div class="links">
			<ul id="footer-socials">
				<li>
					<a target="_blank" href="https://www.facebook.com/les.secrets.de.pornichet/?modal=admin_todo_tour">
						<span class="fab fa-facebook-square"></span>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://www.instagram.com/secrets.de.p.o.r.n.i.c.h.e.t/">
						<span class="fab fa-instagram"></span>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://www.tripadvisor.fr/Attraction_Review-g196655-d17383934-Reviews-Les_Secrets_de_Pornichet-Pornichet_Loire_Atlantique_Pays_de_la_Loire.html/">
						<span class="fab fa-tripadvisor"></span>
					</a>
				</li>
			</ul>		
			<p>Création du site : <a target="_blank" id="str" href="http://simon-tr.com">Simon Trichereau</a></p>
		</div>
	</footer>
	<?php if (!is_front_page()): ?>
		</div>
	<?php endif ?>
	<?php wp_footer(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/main.js"></script>
</body>
</html>