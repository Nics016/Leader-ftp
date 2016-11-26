<?php 
// Переменные настроек темы
	$input_left_image = get_theme_mod('input_left_image', 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic1.jpg'); 
	$input_middle_image = get_theme_mod('input_middle_image', 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic2.jpg'); 
	$input_right_image = get_theme_mod('input_right_image', 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic3.jpg'); 
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Благотворительный фонд "Лидер"</title>
	<?php wp_head(); ?>
</head>
<body>
	<!-- MAIN-WRAP -->
	<div id="main-wrap">
		<!-- HEADER -->
		<header id="main-header">
			<!-- HEADER-CONTAINER -->
			<div class="container">
				<div class="header-pictures clearfix">
					<img src="<?= $input_left_image ?>" alt="" class="header-pictures-pic1">
					<a href="<?= site_url() ?>"><img src="<?= $input_middle_image ?>" alt="" class="header-pictures-pic2"></a>
					<a href="#"><img src="<?= $input_right_image ?>" alt="" class="header-pictures-pic3"></a>
				</div>
				<div class="header-menu">
					<?php
			    		if ( function_exists( 'wp_nav_menu' ) )
			        		wp_nav_menu( 
						        array( 
						        'theme_location' => 'top-menu',
						        'fallback_cb'=> 'top_menu',
						        'container' => 'ul',
						        'menu_id' => 'top-menu',
						        'menu_class' => 'nav') 
							);
					    else custom_menu();
					?>
				</div>
			</div>
			<!-- END OF HEADER-CONTAINER -->
		</header>
		<!-- END OF HEADER -->