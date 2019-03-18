<?php 

	/************************************************************
	**************************  HEADER  *************************
	************************************************************/
	get_template_part( 'parts/header' );
	

	/************************************************************
	*************************  CONTENT  *************************
	************************************************************/ 
		if (is_front_page()){
			/* HOME PAGE */ 
			get_template_part('parts/home');
		} else { ?>
			<main>
				<?php
				/************************************************************
				************************  TOP MENU  *************************
				************************************************************/
				get_template_part('parts/top_menu');
				?>
				<div class="wrapper">			
					<section id="content-page">
						<?php if (is_home()) {
							get_template_part('parts/posts');
						} elseif ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
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
					</section>
				</div>
			</main>
	<?php }
	/************************************************************
	**************************  FOOTER  *************************
	************************************************************/
	get_template_part( 'parts/footer' ); 

?>