<?php
if (function_exists('add_theme_support')) {


	add_theme_support('menus');


	register_nav_menu('header-menu','Header Menu');


//	register_nav_menu('footer-menu','Footer Menu');

	add_theme_support( 'post-thumbnails' );
	add_image_size('slide-image',980,410,true);
	add_image_size('home-box',309,180,true);
	add_image_size('home-box-wide',465,260,true);
    add_image_size('post-image',644,330,true);


}