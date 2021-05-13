<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.
/**
 *
 * Field: license
 *
 * @since 3.2.4
 * @version 3.2.4
 */
if ( ! class_exists( 'SP_WPCP_Field_license' ) ) {
	class SP_WPCP_Field_license extends SP_WPCP_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {

			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {
			echo $this->field_before();
			$type = ( ! empty( $this->field['attributes']['type'] ) ) ? $this->field['attributes']['type'] : 'text';

			$manage_license       = new WP_Carousel_Pro_License( WPCAROUSEL_PRO_FILE, WPCAROUSEL_VERSION, 'ShapedPlugin', WPCAROUSEL_STORE_URL, WPCAROUSEL_ITEM_ID, WPCAROUSEL_ITEM_SLUG );
			$license_key          = $manage_license->get_license_key();
			$license_key_status   = $manage_license->get_license_status();
			$license_status       = ( is_object( $license_key_status ) ? $license_key_status->license : '' );
			$license_notices      = $manage_license->license_notices();
			$license_status_class = '';
			$license_active       = '';
			$license_data         = $manage_license->api_request();

			echo '<div class="wp-carousel-pro-license text-center">';
			echo '<h3>' . __( 'WordPress Carousel Pro License Key', 'wp-carousel-pro' ) . '</h3>';
			if ( 'valid' == $license_status ) {
				$license_status_class = 'license-key-active';
				$license_active       = '<span>' . __( 'Active', 'wp-carousel-pro' ) . '</span>';
				echo '<p>' . __( 'Your license key is active.', 'wp-carousel-pro' ) . '</p>';
			} elseif ( 'expired' == $license_status ) {
				echo '<p style="color: red;">Your license key expired on ' . date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) ) . '. <a href="' . WPCAROUSEL_STORE_URL . '/checkout/?edd_license_key=' . $license_key . '&download_id=' . WPCAROUSEL_ITEM_ID . '&utm_campaign=wp_carousel_pro&utm_source=licenses&utm_medium=expired" target="_blank">Renew license key at discount.</a></p>';
			} else {
				echo '<p>Please activate your license key to make the plugin work. <a href="https://docs.shapedplugin.com/docs/wordpress-carousel-pro/getting-started/activating-license-key/" target="_blank">How to activate license key?</a></p>';
			}
			echo '<div class="wp-carousel-pro-license-area">';
			echo '<div class="wp-carousel-pro-license-key"><input class="wp-carousel-pro-license-key-input ' . $license_status_class . '" type="' . $type . '" name="' . $this->field_name() . '" value="' . $this->value . '"' . $this->field_attributes() . ' />' . $license_active . '</div>';
			wp_nonce_field( 'sp_wp_carousel_pro_nonce', 'sp_wp_carousel_pro_nonce' );
			if ( 'valid' == $license_status ) {
				echo '<input style="color: #dc3545; border-color: #dc3545;" type="submit" class="button-secondary btn-license-deactivate" name="sp_wp_carousel_pro_license_deactivate" value="' . __( 'Deactivate', 'wp-carousel-pro' ) . '"/>';
			} else {
				echo '<input type="submit" class="button-secondary btn-license-save-activate" name="' . $this->unique . '[_nonce][save]" value="' . __( 'Activate', 'wp-carousel-pro' ) . '"/>';
				echo '<input type="hidden" class="btn-license-activate" name="sp_wp_carousel_pro_license_activate" value="' . __( 'Activate', 'wp-carousel-pro' ) . '"/>';
			}
			echo '<br><div class="wp-carousel-pro-license-error-notices">' . $license_notices . '</div>';
			echo '</div>';
			echo '</div>';
			echo $this->field_after();
		}

	}
}
