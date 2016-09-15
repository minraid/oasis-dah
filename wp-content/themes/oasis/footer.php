<footer>
	<div class="footer-box">
		<div class="container">
			<div class="products">
				<h4><!--:uk-->Продукція<!--:--><!--:ru-->Продукция<!--:--></h4>
				<?php wp_nav_menu(array('theme_location' => 'footer-products') ); ?>
			</div>
			<div class="menu">
				<h4><!--:uk-->Меню<!--:--><!--:ru-->Меню<!--:--></h4>
				<?php wp_nav_menu(array('theme_location' => 'footer-menu') ); ?>
			</div>
			<div class="address">
				<h4><!--:uk-->ТзОВ «Оазис Дах»<!--:--><!--:ru-->ООО «Оазис Дах»<!--:--></h4>
				<p><?php the_field('address', 'options'); ?></p>
				<p class="copyright"><!--:uk-->ТзОВ «Оазис Дах» © Всі права захищено<!--:--><!--:ru-->ООО «Оазис Дах» © Все права защищены<!--:--></p>
			</div>
		</div>
		<div class="stripe"></div>
	</div>
	<div class="developed">
		<div class="container"><!--:uk-->Розробка сайту: <!--:--><!--:ru-->Создание сайта: <!--:--><a href="https://flowww.com.ua" target="_blank">Flowww</a></div>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
<script src="https://code.angularjs.org/1.5.8/i18n/angular-locale_uk-ua.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/backLink.directive.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/carousel.directive.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/slider.directive.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/gallery.directive.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/icon.directive.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/product.controller.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/gallery.controller.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/contact.controller.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/comments.controller.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaE5gtN_UQMu8hCgXZyUMuBemyNj2cQDk&callback=initMap"></script>
</body>
</html>