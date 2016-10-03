<?php 

add_action( 'init', 'register_products' );
add_action( 'init', 'register_articles' );
add_action( 'init', 'register_gallery' );
add_action( 'init', 'register_menu' );
add_action( 'wp_ajax_nopriv_contact', 'contact' );
add_action( 'wp_ajax_contact', 'contact' );
add_action( 'wp_ajax_nopriv_comment', 'comment' );
add_action( 'wp_ajax_comment', 'comment' );
add_theme_support( 'post-thumbnails' );

function contact(){
	$mail = [
	'subject' => 'Нове звернення на сайті' . $_REQUEST['subject'] ? 'на тему:' . $_REQUEST['subject'] : '',
	'message' => '<p>Ім`я: '.$_REQUEST['name'].'</p><p>Email: '.$_REQUEST['email'].'</p><p>Повідомлення: '.$_REQUEST['message'].'</p>' 
	];
	$res = wp_mail( get_field('email', 'options'), $mail['subject'], $mail['message'] );
	wp_die( $res );
}

function comment(){
	$time = current_time('mysql');

	$data = array(
		'comment_post_ID' => $_REQUEST['ID'],
		'comment_author' => $_REQUEST['comment_author'],
		'comment_author_email' => $_REQUEST['comment_author_email'],
		'comment_author_url' => $_REQUEST['comment_author_url'],
		'comment_content' => $_REQUEST['comment_content'],
		'comment_date' => $time,
		'comment_approved' => 1,
		);

	$id = wp_insert_comment($data);
	$comment = get_comment($id);
	wp_die( json_encode($comment) );
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
		'label' => 'Products',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-cart',
		'rewrite' => array('slug' => 'products', 'with_front' => true),
		'supports'  => array('title','editor','thumbnail'),
		'query_var' => true,
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
		'taxonomies'          => array('category'),
	);
	register_post_type('products', $args );
}

function register_gallery() {
	$args = array(
		'label'  => 'Gallery',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-format-gallery',
		'supports' => array('title','thumbnail'),
		'rewrite' => array('slug' => 'gallery', 'with_front' => true),
		'query_var' => true,
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
		);
	register_post_type('gallery', $args );
}

function register_articles() {
	$args = array(
		'label'  => 'Articles',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-edit', 
		'supports'  => array('title','editor','thumbnail'),
		'rewrite' => array('slug' => 'gallery', 'with_front' => true),
		'query_var' => true,
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
		);
	register_post_type('articles', $args );
}

function register_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
	register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
	register_nav_menu('footer-products',__( 'Footer Products' ));
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}

function oasis_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'oasis_excerpt_more' );

class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{

    // don't output children opening tag (`<ul>`)
    public function start_lvl(&$output, $depth){}

    // don't output children closing tag    
    public function end_lvl(&$output, $depth){}

    public function start_el(&$output, $item, $depth, $args){

      // add spacing to the title based on the current depth
      $item->title = str_repeat("&nbsp;", $depth * 4) . $item->title;

      // call the prototype and replace the <li> tag
      // from the generated markup...
      parent::start_el($output, $item, $depth, $args);
      $output = str_replace('<li', '<option', $output);
    }

    // replace closing </li> with the closing option tag
    public function end_el(&$output, $item, $depth){
      $output .= "</option>\n";
    }
}

?>