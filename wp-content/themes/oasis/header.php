<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>Oasis Dah</title>
	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/style.css">
</head>
<body>
	<header>
		<div class="header-box">
			<div class="container">
				<a href="/" class="logo"></a>
				<div class="details">
					<div class="moto">Продаж та монтаж елітних покрівельних матеріалів</div>
					<div class="address">Україна, с. Зимна Вода, 81110, вул. Тичини, 2А (навпроти «Епіцентру»)</div>
				</div>
				<div class="phones">
					<i class="icon" icon="'phone'"></i>
					<div class="phone">+38 (067) 31 31 548</div>
					<div class="phone">+38 (067) 67 29 827</div>
					<div class="shedule">Пн-Пт з 09:00 до 17:00</div>
				</div>
			</div>
		</div>
		<div class="menu-box">
			<div class="container">
				<div class="menu">
					<?php wp_nav_menu(array('theme_location' => 'header-menu') ); ?>
				</div>
				<div class="social-langs">
					<div class="social">
						<a href="#" target="_blank" class="g">
							<i class="icon" icon="'google'"></i>
						</a>
						<a href="#" target="_blank" class="fb">
							<i class="icon" icon="'facebook'"></i>
						</a>
					</div>
					<div class="langs">
						<div class="lang">РУ</div>
						<div class="lang active">УКР</div>
					</div>
				</div>
			</div>
		</div>
	</header>