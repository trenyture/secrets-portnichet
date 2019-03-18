<?php
/*
 Template Name: Enqueteurs-page
*/

	/************************************************************
	**************************  HEADER  *************************
	************************************************************/
	get_template_part( 'parts/header' );
	

	/************************************************************
	*************************  CONTENT  *************************
	************************************************************/ 
	echo '<main>';
		/************************************************************
		************************  TOP MENU  *************************
		************************************************************/
		get_template_part('parts/top_menu');
		?>
			<div class="wrapper">			
				<section id="content-page">
					<?php

						if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
							<header
								<?php 
									if (has_post_thumbnail()) {
										$imageUrl = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'rectangular-image');
										if(strlen(trim($imageUrl)) < 1) {
											$imageUrl = get_the_post_thumbnail_url();
										}
										echo ' style="background-image: url('.$imageUrl.')" ';
									} ?>
							>
								<div>
									<h2><?php 
										$title = get_the_title();
										$array = preg_split("@(?<=[^A-Za-z0-9-éèê])@", $title);
										$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
										echo implode('', $array);
									?></h2>
									<blockquote><?php the_excerpt(); ?></blockquote>
								</div>
							</header>
							<main>
								<?php echo the_content(); ?>													
							</main>
						<?php endwhile; } ?>
						<?php $query = new WP_Query(array(
							'post_type' => 'enqueteurs',
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
					?>						
				</section>
			</div>
		</main>
<?php 
/************************************************************
**************************  FOOTER  *************************
************************************************************/
get_template_part( 'parts/footer' ); 
?>