<?php 

	/************************************************************
	**************************  HEADER  *************************
	************************************************************/
	get_template_part( 'parts/header' );
	

	/************************************************************
	************************  TOP MENU  *************************
	************************************************************/
	get_template_part('parts/top_menu');

	/************************************************************
	*************************  CONTENT  *************************
	************************************************************/ 
		if (is_front_page()){
			/* HOME PAGE */ 
			get_template_part('parts/home');
		} else { ?>
			<main>
				<div class="wrapper">			
					<section id="content-page">
						<?php if (is_home()) {
							get_template_part('parts/posts');
						} elseif ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
							<header>
								<h2><?php 
									$title = get_the_title();
									$array = preg_split("@(?<=[^A-Za-z0-9-éèê])@", $title);
									$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
									echo implode('', $array);
								?></h2>
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