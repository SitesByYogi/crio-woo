<?php
/**
 * The menu configuration options for bgtfw.
 *
 * @package Boldgrid_Theme_Framework
 * @subpackage Boldgrid_Theme_Framework\Configs
 *
 * @since    1.1
 *
 * @return   array   An array of menu configs used in bgtfw.
 */

return array(
	'action_prefix' => 'boldgrid_menu_',
	'footer_menus' => array(
		// When the footer is disabled, these menus will be removed
		'footer_center'
	),
	'locations' => array(
		'main' => 'Main Menu',
		'social' => 'Social Icons',
		'secondary' => 'Secondary Menu',
		'tertiary' => 'Tertiary Menu',
		'footer_center' => 'Footer Menu',
	),
	'prototype' => array(
		'main' => array(
			'theme_location' => 'main',
			'container' => 'false',
			'menu_id' => 'main-menu',
			'menu_class' => 'sm sm-clean main-menu',
		),
		'social' => array(
			'theme_location'  => 'social',
			'container'       => 'div',
			'container_id'    => 'menu-social',
			'container_class' => 'social-menu menu-social',
			'menu_id'         => 'menu-social-items',
			'menu_class'      => 'menu-items list-inline',
			'depth'           => -1,
			'fallback_cb'     => '',
		),
		'secondary' => array(
			'theme_location'  => 'secondary',
			'container'       => 'div',
			'container_id'    => 'secondary-menu',
			'container_class' => 'secondary-menu boldgrid-framework-menu',
			'menu_id'         => 'secondary-menu-items',
			'menu_class'      => 'secondary-menu-items list-inline',
			'depth'           => -1,
			'fallback_cb'     => '',
		),
		'tertiary' => array(
			'theme_location'  => 'tertiary',
			'container'       => 'div',
			'container_id'    => 'tertiary-menu',
			'container_class' => 'tertiary-menu boldgrid-framework-menu',
			'menu_id'         => 'tertiary-menu-items',
			'menu_class'      => 'tertiary-menu-items list-inline',
			'depth'           => -1,
			'fallback_cb'     => '',
		),
		'footer_center' => array(
			'theme_location'  => 'footer_center',
			'container'       => 'div',
			'container_id'    => 'footer-center-menu',
			'container_class' => 'footer-center-menu',
			'menu_id'         => 'footer-center-items',
			'menu_class'      => 'footer-center-items list-inline',
			'depth'           => -1,
			'fallback_cb'     => '',
		),
	),
	'default-menus' => array(
		'social' => array(
			'label' => 'Social Media',
			'location' => 'social',
			'items' => array(
				array(
					'menu-item-title' => __( 'Facebook' ),
					'menu-item-classes' => 'facebook',
					'menu-item-url' => '//facebook.com',
					'menu-item-status' => 'publish',
					'menu-item-attr-title' => __( 'Facebook' ),
					'menu-item-target' => '_blank',
				),
				array(
					'menu-item-title' => __( 'Twitter' ),
					'menu-item-classes' => 'twitter',
					'menu-item-url' => '//twitter.com',
					'menu-item-status' => 'publish',
					'menu-item-attr-title' => __( 'Twitter' ),
					'menu-item-target' => '_blank',
				),
				array(
					'menu-item-title' => __( 'Google Plus' ),
					'menu-item-classes' => 'google',
					'menu-item-url' => '//plus.google.com',
					'menu-item-status' => 'publish',
					'menu-item-attr-title' => __( 'Google Plus' ),
					'menu-item-target' => '_blank',
				),
				array(
					'menu-item-title' => __( 'LinkedIn' ),
					'menu-item-classes' => 'linkedin',
					'menu-item-url' => '//linkedin.com',
					'menu-item-status' => 'publish',
					'menu-item-attr-title' => __( 'LinkedIn' ),
					'menu-item-target' => '_blank',
				),
				array(
					'menu-item-title' => __( 'Youtube' ),
					'menu-item-classes' => 'youtube',
					'menu-item-url' => '//youtube.com',
					'menu-item-status' => 'publish',
					'menu-item-attr-title' => __( 'Youtube' ),
					'menu-item-target' => '_blank',
				),
			),
		),
	),
);
