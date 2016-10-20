<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div class="header-box">
			<div class="container">
				<a href="/" class="logo"></a>
				<div class="details">
					<div class="moto"><?php the_field('moto', 'options'); ?></div>
					<div class="address">
						<?php the_field('address', 'options'); ?>
					</div>
				</div>
				<div class="phones">
					<i class="icon" icon="'phone'"></i>
					<div class="phone">
						<?php the_field('phone', 'options'); ?>
					</div>
					<div class="phone">
						<?php the_field('phone_2', 'options'); ?>
					</div>
					<div class="shedule">
						<?php the_field('schedule', 'options'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-box">
			<div class="container">
				<div class="menu">
					<div class="menuBtn" ng-click="openMenu=!openMenu" ng-class="{'open':openMenu}">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<?php wp_nav_menu(array('theme_location' => 'header-menu') ); ?>
				</div>
				<div class="social-langs">
					<div class="social">
						<a href="<?php the_field('google', 'options') ?>" target="_blank" class="g">
							<i class="icon" icon="'google'"></i>
						</a>
						<a href="<?php the_field('facebook', 'options') ?>" target="_blank" class="fb">
							<i class="icon" icon="'facebook'"></i>
						</a>
					</div>
						<?php echo qtranxf_generateLanguageSelectCode('text'); ?>
				</div>
			</div>
		</div>
	</header>