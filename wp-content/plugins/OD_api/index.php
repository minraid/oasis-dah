<?php
/*
Plugin Name: Oasis-Dah API
Plugin URI: 
Description: Custom API for Oasis-Dah theme
Version: 1.0
Author: Flowww
Author URI: https://flowww.com.ua
*/

add_action('wp_ajax_api', 'api');
add_action('wp_ajax_nopriv_api', 'api');

function get_menu($location){
	$theme_locations = get_nav_menu_locations();
	$menu = get_term( $theme_locations[$location], 'nav_menu' );
	return wp_get_nav_menu_items( $menu->term_id );
}

function api(){
	if($_REQUEST['type'] == 'menu') {
		$items = get_menu($_REQUEST['menu_location']);
		exit(json_encode($items));
	}

	$args = array(
		'category'       => $_REQUEST['category'],
		'category_name'  => $_REQUEST['category_name'],
		'post_type'      => $_REQUEST['type'], // 'any',
		'order'          => $_REQUEST['order'], // 'DESC',
		'orderby'        => $_REQUEST['orderby'], // 'date',
		'posts_per_page' => $_REQUEST['posts_per_page'],// 10,
		'offset'         => $_REQUEST['offset'],// 3,
		'post_status'    => 'publish',
	);
	$posts = get_posts( $args );

	if($_REQUEST['type'] == 'products'){
		foreach ($posts as $post) {
			$table = get_field('product_properties', $post->ID);
			foreach ($table['body'] as $row) {
				$properties[] = array(
					'key' => $row[0]['c'],
					'value' => $row[1]['c']
				);
			}
			$post->properties = $properties;
		}
	}

	if($_REQUEST['type'] == 'page'){
		$frontpage_id = get_option('page_on_front');
		foreach ($posts as $post) {
			if($post->ID == $frontpage_id) {
				$post->homepage = true;
			}
		}
	}

	exit(json_encode($posts));
}

?>