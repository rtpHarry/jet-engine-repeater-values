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
Class Elementor_Dynamic_Tag_Jet_Engine_Repeater_Text extends \Elementor\Core\DynamicTags\Tag {

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
		return 'runthings-jetengine-repeater-value-text';
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
			\Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY,
			\Elementor\Modules\DynamicTags\Module::URL_CATEGORY,
			\Elementor\Modules\DynamicTags\Module::POST_META_CATEGORY,
			\Elementor\Modules\DynamicTags\Module::NUMBER_CATEGORY,
			\Elementor\Modules\DynamicTags\Module::COLOR_CATEGORY
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
	 * Render tag output on the frontend.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function render() {
		$field = $this->get_settings( 'repeater_key' );

		if ( ! $field ) {
			return;
		}

        if ( $field ) {
            $result = jet_engine()->listings->data->get_meta($field);
        }

		// attempting to bind an invalid key such as a gallery
		if ( ! is_string($result) ){
			if( is_array($result) ) {
				$result = $this->checkboxes_to_csv_string($result);
			} else {
                return;
            }
		}

		echo wp_kses_post( $result );
	}

	/**
	 * Convert Engine checkboxes values to plain csv string
	 * 
	 * @since 1.2.beta.1
	 * @return string
	 */
	private function checkboxes_to_csv_string( $array = array() ) {

		$result = array();

		foreach ( $array as $value => $bool ) {

			$bool = filter_var( $bool, FILTER_VALIDATE_BOOLEAN );

			if ( $bool ) {
				$result[] = $value;
			}
		}

		return implode(",", $result);

	}

}