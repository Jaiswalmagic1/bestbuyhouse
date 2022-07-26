<?php

if(!defined('ABSPATH')) { exit; }

class EasyAzon_Components_Hooks {
	public static function init() {
		self::_add_actions();
		self::_add_filters();
	}

	private static function _add_actions() {
		if(is_admin()) {
			// Actions that only affect the administrative interface or operation
			add_action('admin_notices', array(__CLASS__, 'easyazon_admin_notices'));
			add_action( 'wp_ajax_easyazon_remove_review_notice', array(__CLASS__, 'easyazon_review_action') );
			add_action( 'wp_ajax_easyazon_hide_review_notice', array(__CLASS__, 'easyazon_review_action') );
		} else {
			// Actions that only affect the frontend interface or operation
		}
	}

	private static function _add_filters() {
		if(is_admin()) {
			// Filters that only affect the administrative interface or operation
		} else {
			// Filters that only affect the frontend interface or operation
		}

		// Filters that affect both the administrative and frontend interface or operation
	}

	/* Review Notices */
	public static function easyazon_admin_notices() {

		if ( ! easyazon_is_plugin_admin() )
        return;

    	$notices = array();

		// Check if not dismissed
	    $is_review_suppressed = get_option( 'easyazon_review_request_suppressed' );

	    if ( empty( $is_review_suppressed ) ) {

	        $is_review_temporary_suppressed = get_transient( 'easyazon_review_request_suppressed' );

	        if ( empty( $is_review_temporary_suppressed ) ) {

	            $review_notice = sprintf(
	                wp_kses( __( '<p>We hope you\'re enjoying <strong>EasyAzon</strong>! Could you please do us a BIG favor and give it a 5-star rating on Wordpress to help us spread the word and boost our motivation?</p>', 'easyazon' ), array('strong'=>array(), 'p'=>array()) )
	                . '<ul>
	                    <li><a class="review-btn button button-primary" data-action="easyazon_remove_review_notice" href="%s" target="_blank" rel="nofollow" title="' .
	                __(
	                            'Sure, you deserved it', 'easyazon' ) . ' "style="font-weight:bold;">' . __( 'Sure, you deserved it', 'easyazon' ) . '</a></li>
	                    <li><a class="easyazon-notice-btn" data-action="easyazon_remove_review_notice" href="javascript:void(0);" title="' . __( 'I already did', 'easyazon' ) . '">' . __( 'I already did', 'easyazon' ) . '</a></li>
	                    <li><a class="easyazon-notice-btn" data-action="easyazon_hide_review_notice" href="javascript:void(0);" title="' .
	                __( 'Maybe later', 'easyazon' ) . '">' . __( 'Maybe later', 'easyazon' ) . '</a></li>
	                    <li><a class="easyazon-notice-btn" data-action="easyazon_remove_review_notice" href="javascript:void(0);" title="' . __( 'I don\'t want to leave a review', 'easyazon' ) . '">' . __( 'I don\'t want to leave a review', 'easyazon' ) . '</a></li>
	                </ul>',
	                esc_url( 'https://wordpress.org/support/plugin/easyazon/reviews/?filter=5#new-post' )
	            );

	            $notices[] = array(
	                'id' => 'review',
	                'type' => 'info',
	                'dismiss' => true,
	                'message' => $review_notice
	            );
	        }
	    }

	    $notices = apply_filters( 'easyazon_admin_notices', $notices );

	    // Output messages
		if ( sizeof( $notices ) > 0 ) {

	        foreach ( $notices as $notice_id => $notice ) {

				if ( isset( $notice['force'] ) && false === $notice['force'] )
				    continue;

				$classes = 'easyazon-notice notice';

				if ( ! empty( $notice['type'] ) ) {
					$classes .= ' notice-' . $notice['type'];
				}

				if ( isset( $notice['dismiss'] ) && true === $notice['dismiss'] ) {
					$classes .= ' is-dismissible';
				}
				?>
	            <div id="easyazon-notice-<?php echo esc_attr( ! empty( $notice['id'] ) ? $notice['id'] : $notice_id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
					<?php echo /*esc_attr(*/ $notice['message'] /*)*/; ?>
	            </div>
				<?php
			}
		}
	}

	public static function easyazon_review_action() {

	    if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {
	        $redirect_to = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : admin_url();
	        wp_safe_redirect( $redirect_to );
	        exit;
	    }

	    if ( empty( $_POST['action'] ) ) {
	        wp_send_json( array( 'error' => __( "You don't have permission to do that.", 'easyazon' ) ) );
	        return;
	    }

	    $action = ( ! empty( $_POST['action'] ) ) ? _sanitize_text_fields( $_POST['action'], true ) : '';

	    if ( empty( $action ) ) {
	        wp_send_json( array( 'error' => __( "You don't have permission to do that.", 'easyazon' ) ) );
	        return;
	    }

	    if ( 'easyazon_remove_review_notice' === $action ) {

	        update_option( 'easyazon_review_request_suppressed', 1 );

	    } else if( 'easyazon_hide_review_notice' === $action ) {

	        set_transient( 'easyazon_review_request_suppressed', 1, MONTH_IN_SECONDS );
	    }

	    wp_send_json_success();
	}
}

EasyAzon_Components_Hooks::init();
