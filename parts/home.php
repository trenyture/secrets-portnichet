<?php 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo = $image[0];
	$frontPageId = get_the_ID();
?>
<main id="homepage">
	<h1 <?php if ($logo && strlen(trim($logo))>0): ?>style="background-image: url(<?php echo $logo; ?>)"<?php endif ?>><?php echo get_bloginfo('name'); ?></h1>
	<?php $query = new WP_Query(array(
		'post_type' => 'page',
		'orderby'   => 'menu_order',
		'order' => 'ASC'
	));
	if($query->have_posts()) : ?>
		<nav>
			<ul><!--
				<?php while ($query->have_posts() ) : $query->the_post(); 
					if($frontPageId != get_the_ID()) {?>
					--><li>

							<a href="<?php the_permalink(); ?>" <?php if (has_post_thumbnail()) {?>style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?>>
								<h2><?php
									$title = get_the_title();
									$array = preg_split("@(?<=[^A-Za-z0-9-]+)@", $title);
									$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
									echo implode('', $array);
								?></h2>
								<p><?php
									$message = get_the_excerpt();
									if (strlen($message) > 300) {
										$message =  substr($message, 0, 297) . '…';
									}
									echo $message;
								?></p>
							</a>
					</li><!--
				<?php } endwhile; ?>
			--></ul>
		</nav>
	<?php endif;
	wp_reset_postdata(); ?>
</main>