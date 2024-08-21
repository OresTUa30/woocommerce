<?php
add_action( 'init', function(){ 
	register_post_type( 'slider', [
		'labels'             => [
			'name'               => __('Slider', 'wooeshop'),
			'singular_name'      => __('Slider', 'wooeshop'),
			'add_new'            => __('Add new slide', 'wooeshop'),
			'add_new_item'       => __('New slide', 'wooeshop'),
			'edit_item'          => __('Edit', 'wooeshop'),
			'new_item'           => __('New slide', 'wooeshop'),
			'view_item'          => __('View', 'wooeshop'),
			'menu_name'          => __('Slider', 'wooeshop'),
            'all items'          => __('All sliders', 'wooeshop'),
		],
		'public'             => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-format-gallery',
		'supports'           => [ 'title', 'editor', 'thumbnail']
	] );
});