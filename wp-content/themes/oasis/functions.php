<?php 

add_action( 'init', 'register_products' );
add_action( 'init', 'register_articles' );
add_action( 'init', 'register_menu' );
add_theme_support( 'post-thumbnails' );

function acf_excerpt($text) {
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 30;
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

function register_products() {
	$args = array(
		'label'  => 'Products',
		'labels' => array(
			'name'               => 'Товари',
			'singular_name'      => 'Товар',
			'add_new'            => 'Додати новий',
			'add_new_item'       => 'Додати новий товар',
			'edit_item'          => 'Редагувати опис товару',
			'new_item'           => 'Новий товар',
			'view_item'          => 'Переглянути опис товару',
			'search_items'       => 'Знайти товар',
			'not_found'          => 'Товар не знайдено',
			'not_found_in_trash' => 'В смітнику товар не знайдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Товари',
		),
		'description'         => '',
		'public'              => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-cart', 
		'supports'            => array('title','editor','thumbnail'),
		'taxonomies'          => array('category'),
		'rewrites'            => array('slug'=>'products')
	);
	register_post_type('products', $args );
}

function register_articles() {
	$args = array(
		'label'  => 'Articles',
		'labels' => array(
			'name'               => 'Статті',
			'singular_name'      => 'Стаття',
			'add_new'            => 'Додати статтю',
			'add_new_item'       => 'Додати нову статтю',
			'edit_item'          => 'Редагувати опис статті',
			'new_item'           => 'Нова стаття',
			'view_item'          => 'Переглянути опис статті',
			'search_items'       => 'Знайти статтю',
			'not_found'          => 'Статтю не знайдено',
			'not_found_in_trash' => 'В смітнику статтю не знайдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Статті',
		),
		'description'         => '',
		'public'              => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-edit', 
		'supports'            => array('title','editor')
	);
	register_post_type('articles', $args );
}

function register_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
}

?>