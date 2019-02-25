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
				<div id="wrapper">			
					<?php
					/************************************************************
					************************  TOP MENU  *************************
					************************************************************/
					get_template_part('parts/top_menu');
					?>
					<section id="content-page">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<header <?php if (has_post_thumbnail()) {?> style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?>>
							<div>
								<h2><?php the_title(); ?></h2>
								<blockquote><?php the_excerpt(); ?></blockquote>
							</div>
						</header>
						<main>
							<?php echo the_content(); ?>													
						</main>
						<?php endwhile; endif;
						if (is_home()) {
							get_template_part('parts/posts');
						}?>
					</section>
				</div>
			</main>
	<?php }
	/************************************************************
	**************************  FOOTER  *************************
	************************************************************/
	get_template_part( 'parts/footer' ); 

?>