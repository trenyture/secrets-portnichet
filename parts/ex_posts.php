<?php 
	$pageId = get_queried_object_id();
	$post = get_post( get_option( 'page_for_posts' ) );
?>

<header>
	<h2><?php 
		$title = apply_filters( 'get_the_title', get_post( get_option( 'page_for_posts' ) )->post_title );
		$array = preg_split("@(?<=[^A-Za-z0-9-éèê])@", $title);
		$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
		echo implode('', $array);
	?></h2>
</header>
<?php
	$content = apply_filters( 'get_the_content', get_post( get_option( 'page_for_posts' ) )->post_content );
	if(strlen(trim($content)) > 0) {
		echo "<main>" . $content . "</main>";
	}
?>

<?php $query = new WP_Query(array(
		'post_type' => 'post',
		'category_name' => 'enquete,investigation',
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
								<h3><?php the_title(); ?></h3>
							</div>
						</a>
					</li><!--
				<?php } endwhile; ?>
			--></ul>
		</aside>
	<?php endif;
wp_reset_postdata(); ?>
