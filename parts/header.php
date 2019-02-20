<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo get_bloginfo('name'); ?></title>
	<?php wp_head();?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/main.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/main.js"></script>
</head>
<body <?php body_class(); ?>>
	<?php if (!is_front_page()): ?>
		<div id="wrapper">
	<?php endif ?>