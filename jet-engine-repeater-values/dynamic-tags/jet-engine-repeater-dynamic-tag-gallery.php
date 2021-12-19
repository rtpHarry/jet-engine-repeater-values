<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Dynamic Tag - Server Variable
 *
 * Elementor dynamic tag that returns a server variable.
 *
 * @since 1.0.0
 */
Class Elementor_Dynamic_Tag_Jet_Engine_Repeater_Gallery extends \Elementor\Core\DynamicTags\Data_Tag {

	/**
	 * Get dynamic tag name.
	 *
	 * Retrieve the name of the tag.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Dynamic tag name.
	 */
	public function get_name() {
		return 'runthings-jetengine-repeater-value-gallery';
	}

	/**
	 * Get dynamic tag title.
	 *
	 * Returns the title of the tag.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Dynamic tag title.
	 */
	public function get_title() {
		return esc_html__( 'JetEngine Repeater Field', 'jet-engine-repeater-values' );
	}

	/**
	 * Get dynamic tag groups.
	 *
	 * Retrieve the list of groups the tag belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Dynamic tag groups.
	 */
	public function get_group() {
		return [ 'runthings' ];
	}

	/**
	 * Get dynamic tag categories.
	 *
	 * Retrieve the list of categories the tag belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Dynamic tag categories.
	 */
	public function get_categories() {
		return [ 
			\Elementor\Modules\DynamicTags\Module::GALLERY_CATEGORY,
		];
	}

	/**
	 * Register dynamic tag controls.
	 *
	 * Add input fields to allow the user to customize the tag settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	protected function register_controls() {
		$this->add_control(
			'repeater_key',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Repeater Key', 'jet-engine-repeater-values' ),
			]
		);
	}

	/**
	 * Return the value
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function get_value( array $options = [] ) {
		$field = $this->get_settings( 'repeater_key' );

		if ( ! $field ) {
			return;
		}

        if ( $field ) {
            $value = jet_engine()->listings->data->get_meta($field);
        }

		if ( empty( $value ) ) {
			return array();
		}

		if ( is_array( $value ) ) {
			$value = $value;
		} else {
			$value = explode( ',', $value );
		}

		return array_map( function( $item ) {
			return Jet_Engine_Tools::get_attachment_image_data_array( $item, 'id' );
		}, $value );
	}

}