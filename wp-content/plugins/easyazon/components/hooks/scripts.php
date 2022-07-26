<?php

if(!defined('ABSPATH')) { exit; }

class EasyAzon_Components_Scripts {
	public static function init() {
		self::_add_actions();
	}

	private static function _add_actions() {
		if(is_admin()) {
			// Actions that only affect the administrative interface or operation
			add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_scripts'), 100);
		} else {
			// Actions that only affect the frontend interface or operation
		}
	}

	/* Enqueue Admin Scripts */
	public static function admin_scripts() {
		wp_enqueue_style('easyazon-admin', plugins_url('../../assets/css/admin.css', __FILE__), array(), EASYAZON_VERSION);
		wp_enqueue_script( 'easyazon-admin', plugins_url('../../assets/js/admin.js', __FILE__), array('jquery'), EASYAZON_VERSION, true );
		wp_localize_script( 'easyazon-admin', 'easyazon_ajax_object',
	        array( 
	            'ajaxurl' => admin_url( 'admin-ajax.php' )
	        )
	    );
	}
}

EasyAzon_Components_Scripts::init();
