<?php 
	$pageId = get_queried_object_id();
	$post = get_post( get_option( 'page_for_posts' ) );
?>

<header <?php if (has_post_thumbnail($pageId)) {?> style="background-image: url(<?php echo get_the_post_thumbnail_url($pageId); ?>)" <?php } ?>>
	<div>
		<h2><?php 
			$title = apply_filters( 'get_the_title', get_post( get_option( 'page_for_posts' ) )->post_title );
			$array = preg_split("@(?<=\s)@", $title);
			$array[count($array) - 1] = '<b>' . $array[count($array) - 1] . '</b>';
			echo implode('', $array);
		?></h2>
		<blockquote><?php echo apply_filters( 'the_excerpt', get_post( get_option( 'page_for_posts' ) )->post_excerpt ); ?></blockquote>
	</div>
</header>
<?php
	$content = apply_filters( 'get_the_content', get_post( get_option( 'page_for_posts' ) )->post_content );
	if(strlen(trim($content)) > 0) {
		echo "<main>" . $content . "</main>";
	}
?>
<aside>
	It's the posts pages <?php echo $pageId; ?>
</aside>