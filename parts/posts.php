<?php 
	$pageId = get_queried_object_id();
	$post = get_post( get_option( 'page_for_posts' ) );
?>

<header
	<?php 
		if (has_post_thumbnail($pageId)) {
			$imageUrl = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'rectangular-image', $pageId);
			if(strlen(trim($imageUrl)) < 1) {
				$imageUrl = get_the_post_thumbnail_url($pageId);
			}
			echo ' style="background-image: url('.$imageUrl.')" ';
		} ?>
>
	<div>
		<h2><?php 
			$title = apply_filters( 'get_the_title', get_post( get_option( 'page_for_posts' ) )->post_title );
			$array = preg_split("@(?<=[^A-Za-z0-9-éèê])@", $title);
			$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
			echo implode('', $array);
		?></h2>
		<blockquote><?php $thePost = get_post( get_option( 'page_for_posts' ) ); echo apply_filters('the_excerpt', $thePost->post_excerpt, $thePost ); ?></blockquote>
	</div>
</header>
<?php
	$content = apply_filters( 'get_the_content', get_post( get_option( 'page_for_posts' ) )->post_content );
	if(strlen(trim($content)) > 0) {
		echo "<main>" . $content . "</main>";
	}
?>

<?php $query = new WP_Query(array(
		'post_type' => 'post',
		'orderby'   => 'menu_order',
		'order' => 'ASC'
	));
	if($query->have_posts()) : ?>
		<aside id="posts-list">
			<ul><!--
				<?php while ($query->have_posts() ) : $query->the_post(); 
					if($frontPageId != get_the_ID()) {?>
					--><li>
						<a href="<?php the_permalink(); ?>" <?php if (has_post_thumbnail()) {?>style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?>>
							<div>
								<h3><?php
									$title = get_the_title();
									$array = preg_split("@(?<=[^A-Za-z0-9-éèê])@", $title);
									$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
									echo implode('', $array);
								?></h3>
								<p><?php
									$message = get_the_excerpt();
									if (strlen($message) > 300) {
										$message =  substr($message, 0, 297) . '…';
									}
									echo $message;
								?></p>
							</div>
						</a>
					</li><!--
				<?php } endwhile; ?>
			--></ul>
		</aside>
	<?php endif;
wp_reset_postdata(); ?>