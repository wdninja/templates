<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
	</head>

	<?php
		$current_page = $post->ID;
		$parent = 1;

		while($parent) {
			$page_query = $wpdb->get_row("SELECT post_name, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
			$parent = $current_page = $page_query->post_parent;
			if(!$parent) $parent_name = $page_query->post_name;
		}
	?>

	<body <?php body_class(); ?>>
        <div class="site-container">
            <header>
                <a href="/" class="logo"></a>
                <nav id="nav-main">
                    <ul>
                        <?php wp_nav_menu( array('menu' => 'Main Navigation', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Main_Nav_Walker )); ?>
                    </ul>
                </nav>
            </header>
