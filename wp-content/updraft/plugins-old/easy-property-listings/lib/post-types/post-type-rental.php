<?php
/**
 * Register post type :: locations
 *
 * @package     EPL
 * @subpackage  Functions/CPT
 * @copyright   Copyright (c) 2019, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Registers and sets up the locations custom post type
 *
 * @since 1.0
 * @return void
 */
function epl_register_custom_post_type_locations() {

	$archives	= defined( 'EPL_locations_DISABLE_ARCHIVE' ) && EPL_locations_DISABLE_ARCHIVE ? false : true;
	$slug		= defined( 'EPL_locations_SLUG' ) ? EPL_locations_SLUG : 'locations';
	$rewrite	= defined( 'EPL_locations_DISABLE_REWRITE' ) && EPL_locations_DISABLE_REWRITE ? false : array('slug' => $slug, 'with_front' => false);
	$rest		= defined( 'EPL_locations_DISABLE_REST' ) && EPL_locations_DISABLE_REST ? false : true;

	$labels = apply_filters( 'epl_locations_labels', array(
		'name'			=>	__('locationss', 'easy-property-listings' ),
		'singular_name'		=>	__('locations', 'easy-property-listings' ),
		'menu_name'		=>	__('locationss', 'easy-property-listings' ),
		'add_new'		=>	__('Add New', 'easy-property-listings' ),
		'add_new_item'		=>	__('Add New locations', 'easy-property-listings' ),
		'edit_item'		=>	__('Edit locations', 'easy-property-listings' ),
		'new_item'		=>	__('New locations', 'easy-property-listings' ),
		'update_item'		=>	__('Update locations', 'easy-property-listings' ),
		'all_items'		=>	__('All locationss', 'easy-property-listings' ),
		'view_item'		=>	__('View locations', 'easy-property-listings' ),
		'search_items'		=>	__('Search locationss', 'easy-property-listings' ),
		'not_found'		=>	__('locations Not Found', 'easy-property-listings' ),
		'not_found_in_trash'	=>	__('locations Not Found in Trash', 'easy-property-listings' ),
		'parent_item_colon'	=>	__('Parent locations:', 'easy-property-listings' )
	) );
	$locations_args = array(
		'labels'		=>	$labels,
		'public'		=>	true,
		'publicly_queryable'	=>	true,
		'show_ui'		=>	true,
		'show_in_menu'		=>	true,
		'query_var'		=>	true,
		'rewrite'		=>	$rewrite,
		'menu_icon'		=>	'dashicons-admin-home',
		'capability_type'	=>	'post',
		'has_archive'		=>	$archives,
		'hierarchical'		=>	false,
		'menu_position'		=>	'26.5',
		'show_in_rest'		=>	$rest,
		'taxonomies'		=>	array( 'location', 'tax_feature' ),
		'supports'		=>	apply_filters( 'epl_locations_supports', array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' , 'comments' ) ),
	);
	epl_register_post_type( 'locations', 'locations', apply_filters( 'epl_locations_post_type_args', $locations_args ) );
}
add_action( 'init', 'epl_register_custom_post_type_locations', 0 );

/**
 * Manage Admin locations Post Type Columns
 *
 * @since 1.0
 * @return void
 */
if ( is_admin() ) {
	/**
	 * Manage Admin locations Post Type Columns: Heading
	 *
	 * @since 1.0
	 * @return void
	 */
	function epl_manage_locations_columns_heading( $columns ) {
		global $epl_settings;

		$columns = array(
			'cb' 			=> '<input type="checkbox" />',
			'property_featured' 	=> '<span class="dashicons dashicons-star-half"></span>' . '<span class="epl-manage-featured">' . __('Featured', 'easy-property-listings' ) . '</span>',
			'property_thumb'	=> __('Image', 'easy-property-listings' ),
			'property_rent'		=> __('Rent', 'easy-property-listings' ),
			'title'			=> __('Address', 'easy-property-listings' ),
			'listing'		=> __('Listing Details', 'easy-property-listings' ),
			'listing_id'		=> __('Unique ID' , 'easy-property-listings' ),
			'geo'			=> __('Geocoded', 'easy-property-listings' ),
			'property_status'	=> __('Status', 'easy-property-listings' ),
			'agent'			=> __('Agent', 'easy-property-listings' ),
			'date'			=> __('Date', 'easy-property-listings' )
		)  + $columns;

		// unset author columns as duplicate of agent column
		unset( $columns['author'] );
		unset( $columns['comments'] );

		// Geocode Column
		$geo_debug = !empty($epl_settings) && isset($epl_settings['debug']) ? $epl_settings['debug'] : 0;
		if ( $geo_debug != 1 ) {
			unset($columns['geo']);
		}

		// Listing ID Column
		$admin_unique_id = !empty($epl_settings) && isset($epl_settings['admin_unique_id']) ? $epl_settings['admin_unique_id'] : 0;
		if ( $admin_unique_id != 1 ) {
			unset($columns['listing_id']);
		}

		return apply_filters('epl_post_type_locations_admin_columns',$columns);
	}
	add_filter( 'manage_edit-locations_columns', 'epl_manage_locations_columns_heading' ) ;

	/**
	 * Manage Admin locations Post Type Columns: Row Contents
	 *
	 * @since 1.0
	 */
	function epl_manage_locations_columns_value( $column, $post_id ) {
		global $post,$property;
		global $epl_settings;
		switch( $column ) {
			/* If displaying the 'Featured' image column. */
			case 'property_featured' :
				do_action('epl_manage_listing_column_featured');

				break;

			/* If displaying the 'Featured' image column. */
			case 'property_thumb' :
				do_action('epl_manage_listing_column_property_thumb');

				break;

			case 'listing' :
				do_action('epl_manage_listing_column_listing');

				break;

			/* If displaying the 'Listing ID' column. */
			case 'listing_id' :
				do_action('epl_manage_listing_column_listing_id');

				break;

			/* If displaying the 'Geocoding' column. */
			case 'geo' :
				do_action('epl_manage_listing_column_geo');

				break;

			/* If displaying the 'property_rent' column. */
			case 'property_rent' :
				do_action('epl_manage_listing_column_price');

				break;
			/* If displaying the 'property_status' column. */
			case 'property_status' :
				do_action('epl_manage_listing_column_property_status');

				break;

			case 'agent':
				do_action('epl_manage_listing_column_agent');

				break;

			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}
	add_action( 'manage_locations_posts_custom_column', 'epl_manage_locations_columns_value', 10, 2 );
}
