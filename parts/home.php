<?php 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo = $image[0];
	$frontPageId = get_the_ID();
?>
<main id="homepage">
	<div id="content" class="wrapper">
		<header class="slogan">
			<h1>
				<a href="<?php echo get_bloginfo('url'); ?>" <?php if ($logo && strlen(trim($logo))>0): ?>style="background-image: url(<?php echo $logo; ?>)"<?php endif ?>><?php echo get_bloginfo('name'); ?>
				</a>
			</h1>
			<blockquote>
				<?php
					$slogan = get_bloginfo('description');
					$array = explode('|', $slogan);
					$array[count($array) - 1] = '<br><em>' . trim($array[count($array) - 1]) . '</em>';
					echo implode('', $array);
				?>
			</blockquote>
		</header>
		<?php 
			$content = apply_filters( 'the_content', get_the_content() );
			$content = explode('<p>@@@avis@@@</p>', $content);
			if(count($content) == 1) {
				echo the_content();
			}
			else{
				echo $content[0];
		?>
		<div class="wprev-no-slider" id="wprev-slider-1">
			<style>#wprev-slider-1 .wprev_preview_bradius_T1 {border-radius: 0px;}#wprev-slider-1 .wprev_preview_bg1_T1 {background:rgba(221,150,44,0.93);}#wprev-slider-1 .wprev_preview_bg2_T1 {background:;}#wprev-slider-1 .wprev_preview_tcolor1_T1 {text-align:justify;-webkit-hyphens: auto;-moz-hyphens: auto;-ms-hyphens: auto;hyphens: auto;color:rgba(0,0,0,0.93);}#wprev-slider-1 .wprev_preview_tcolor2_T1 {color:#ffffff;}#wprev-slider-1 .wprev_preview_bg1_T1::after{ border-top: 30px solid rgba(221,150,44,0.93); }
			</style>
			<div class="wprevpro_t1_outer_div w3_wprs-row-padding wprevprodiv">
				<div class="wprevpro_t1_DIV_1 w3_wprs-col l6">
					<div class="wprevpro_t1_DIV_2 wprev_preview_bg1_T1 wprev_preview_bradius_T1">
						<p class="wprevpro_t1_P_3 wprev_preview_tcolor1_T1"><span class="wprevpro_star_imgs_T1"></span>
							<?php if (pll_current_language() == 'en'): ?>
								Fun and original experience that I lived with friends to discover Pornichet in another way. We visited some very cute places from a more authentic pornichet than I thought while learning his story. I love surveys and tricks in general, solve puzzles ... here, with the advantage of walking, being outdoors and seeing the sea make it great! We were completely involved in the game and we won a few seconds of the time: the challenge is there too! To do with family or friends, you will love! Thank you for this immersion!
							<?php else: ?>
								Expérience ludique et originale que j’ai vécu avec des amis pour découvrir Pornichet d’une autre manière. Nous avons visités des lieux très mignons d’un pornichet plus authentique que je pensais tout en apprenant son histoire. J’adore les enquêtes et jeux de pistes en général, résoudre des énigmes... ici, avec l’avantage de marcher, être dehors et de voir la mer c’est top! On était complètement à fond dans le jeu, c’est réussi, et on a gagné à quelques secondes du chrono: le challenge est bien là aussi! À faire en famille ou entre amis, vous allez adorer! Merci pour cette immersion!
							<?php endif ?>
						</p>
					</div>
					<span class="wprevpro_t1_A_8">
						<img wprevid="1" src="https://www.les-secrets-de-pornichet.fr/wp-content/plugins/wp-facebook-reviews/public/partials/avatars/1555602408_2120829198036240.jpg" alt="thumb" class="wprevpro_t1_IMG_4">
					</span>
					<span class="wprevpro_t1_SPAN_5 wprev_preview_tcolor2_T1">Lisa Gentric</span>
				</div>
				<div class="wprevpro_t1_DIV_1 w3_wprs-col l6">
					<div class="wprevpro_t1_DIV_2 wprev_preview_bg1_T1 wprev_preview_bradius_T1">
						<p class="wprevpro_t1_P_3 wprev_preview_tcolor1_T1"><span class="wprevpro_star_imgs_T1"></span>
							<?php if (pll_current_language() == 'en'): ?>
								We conducted the game today as a family (2 adults and 3 children between 5 and 10 years) and we unanimously loved! It lasts 2h-2h20 during which we surveyed the Pornichet 1900 <img draggable="false" class="emoji" alt="😉" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f609.svg">; the plot is really nice, the riddles really well tied and it also allows to (re) discover places in Pornichet where we go less often. Our "help-guide" was very nice and discret but present if needed. We strongly recommend this activity which is outdoors, which makes the brain work and which pleases at any age! We will start again this summer if a new riddle arrives <img draggable="false" class="emoji" alt="👍🏻" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f44d-1f3fb.svg"><img draggable="false" class="emoji" alt="👍🏻" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f44d-1f3fb.svg">. Go for it!
							<?php else: ?>
								Nous avons réalisé l’enquête aujourd’hui en famille (2 adultes et 3 enfants entre 5 et 10 ans) et nous avons unanimement adoré ! Ça dure 2h-2h20 durant lesquelles nous avons arpenté le Pornichet de 1900 <img draggable="false" class="emoji" alt="😉" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f609.svg"> ; l’intrigue est vraiment sympa, les énigmes vraiment bien ficelées et ça permet aussi de (re)découvrir des endroits de Pornichet où on va moins souvent. Notre « guide-aide » était très gentil et discret mais présent si besoin. Nous recommandons vivement cette activité qui est en plein air, qui fait travailler les méninges et qui plait à tout âge ! Nous recommencerons cet été si une nouvelle énigme arrive <img draggable="false" class="emoji" alt="👍🏻" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f44d-1f3fb.svg"><img draggable="false" class="emoji" alt="👍🏻" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f44d-1f3fb.svg">. Foncez !
							<?php endif ?>
						</p>
					</div>
					<span class="wprevpro_t1_A_8">
						<img wprevid="2" src="https://www.les-secrets-de-pornichet.fr/wp-content/plugins/wp-facebook-reviews/public/partials/avatars/1556034457_4327956863913667.jpg" alt="thumb" class="wprevpro_t1_IMG_4">
					</span>
					<span class="wprevpro_t1_SPAN_5 wprev_preview_tcolor2_T1">Laetitia Ringeval</span>
				</div>
			</div>
		</div>
		<?php
				echo $content[1];
			}	
		?>
	</div>
</main>