<?php
	$background = get_background_image();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php if (!is_front_page()): ?><?php wp_title('', true,''); ?> | <?php endif ?><?php echo get_bloginfo('name'); ?></title>
	<?php wp_head();?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/main.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/main.js"></script>
</head>
<body <?php body_class(); if (is_front_page() && $background && strlen(trim($background)) > 0): ?> style="background-image: url(<?php echo $background; ?>);" <?php endif ?>>
	<?php if (!is_front_page()): ?>
		<div id="wrapper">
	<?php endif ?>