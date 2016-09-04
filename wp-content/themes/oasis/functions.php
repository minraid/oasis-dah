<?php 

add_action( 'init', 'register_products' );
add_action( 'init', 'register_articles' );
add_action( 'init', 'register_gallery' );
add_action( 'init', 'register_menu' );
add_action( 'wp_ajax_nopriv_contact', 'contact' );
add_action( 'wp_ajax_contact', 'contact' );
add_theme_support( 'post-thumbnails' );

function contact(){
	$mail = [
		'subject' => 'Нове звернення на сайті' . $_REQUEST['subject'] ? 'на тему:' . $_REQUEST['subject'] : '',
		'message' => '<p>Ім`я: '.$_REQUEST['name'].'</p><p>Email: '.$_REQUEST['email'].'</p><p>Повідомлення: '.$_REQUEST['message'].'</p>' 
	];
	$res = wp_mail( 'miniraid@gmail.com', $mail['subject'], $mail['message'] );
	wp_die( $res );
}


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

function register_gallery() {
	$args = array(
		'label'  => 'Gallery',
		'labels' => array(
			'name'               => 'Галерея',
			'singular_name'      => 'Альбом',
			'add_new'            => 'Додати альбом',
			'add_new_item'       => 'Додати новий альбом',
			'edit_item'          => 'Редагувати опис альбому',
			'new_item'           => 'Новий альбом',
			'view_item'          => 'Переглянути опис альбому',
			'search_items'       => 'Знайти альбом',
			'not_found'          => 'Товар не знайдено',
			'not_found_in_trash' => 'В смітнику альбом не знайдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Галерея',
		),
		'description'         => '',
		'public'              => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-gallery', 
		'supports'            => array('title','thumbnail'),
		'rewrites'            => array('slug'=>'gallery')
	);
	register_post_type('gallery', $args );
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
		'supports'            => array('title','editor','thumbnail')
	);
	register_post_type('articles', $args );
}

function register_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
}

function oasis_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'oasis_excerpt_more' );

?>