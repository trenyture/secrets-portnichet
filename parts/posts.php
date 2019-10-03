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