<?php
/**
 * Plugin Name: JetEngine - Repeater field values
 * Description: Add dynamic tag that returns a repeater variable.
 * Plugin URI:  https://runthings.dev/
 * Version:     1.0.0
 * Author:      rtpHarry
 * Author URI:  https://runthings.dev/
 * Text Domain: jet-engine-repeater-values
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.2
 */

/*
"JetEngine - Repeater field values" is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
"JetEngine - Repeater field values" is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with "JetEngine - Repeater field values". 

If not, see https://github.com/rtpHarry/jet-engine-repeater-values/blob/703dccf72f149cf9a062e73bebbdeadb7e9c85b9/jet-engine-repeater-values/license.md.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Repeater Variables Dynamic Tag Group.
 *
 * Register new dynamic tag group for Request Variables.
 *
 * @since 1.0.0
 * @return void
 */
function register_dynamic_tag_group( $dynamic_tags ) {

	\Elementor\Plugin::instance()->dynamic_tags->register_group(
		'runthings',
		[
			'title' => esc_html__( 'runthings.dev', 'jet-engine-repeater-values' )
		]
	);

}
add_action( 'elementor/dynamic_tags/register_tags', 'register_dynamic_tag_group' );

/**
 * Register Server Variable Dynamic Tag.
 *
 * Include dynamic tag file and register tag class.
 *
 * @since 1.0.0
 * @return void
 */
function register_dynamic_tag( $dynamic_tags ) {

	require_once( __DIR__ . '/dynamic-tags/jet-engine-repeater-dynamic-tag-text.php' );
	require_once( __DIR__ . '/dynamic-tags/jet-engine-repeater-dynamic-tag-gallery.php' );
	require_once( __DIR__ . '/dynamic-tags/jet-engine-repeater-dynamic-tag-image.php' );

	$dynamic_tags->register_tag( 'Elementor_Dynamic_Tag_Jet_Engine_Repeater_Text' );
	$dynamic_tags->register_tag( 'Elementor_Dynamic_Tag_Jet_Engine_Repeater_Gallery' );
	$dynamic_tags->register_tag( 'Elementor_Dynamic_Tag_Jet_Engine_Repeater_Image' );

}
add_action( 'elementor/dynamic_tags/register_tags', 'register_dynamic_tag' );