<?php

if(!defined('ABSPATH')) { exit; }

class EasyAzon_Addition_Components_Popup {
	public static function init() {
		self::_add_actions();
		self::_add_filters();
	}

	private static function _add_actions() {
		if(is_admin()) {
			// Actions that only affect the administrative interface or operation
			add_action('easyazon_popup_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
		} else {
			// Actions that only affect the frontend interface or operation
		}

		// Actions that affect both the administrative and frontend interface or operation
	}

	private static function _add_filters() {
		if(is_admin()) {
			// Filters that only affect the administrative interface or operation
		} else {
			// Filters that only affect the frontend interface or operation
		}

		// Filters that affect both the administrative and frontend interface or operation
	}

	#region Scripts and Styles

	public static function enqueue_scripts() {
		wp_enqueue_script('easyazon-addition-popup', plugins_url('resources/popup.js', __FILE__), array('easyazon-popup'), EASYAZON_VERSION, true);

		wp_localize_script('easyazon-addition-popup', 'EasyAzon_Addition_Popup', array(
			'ajaxActionShortcodeRaw' => 'easyazon_shortcode_raw',
		));
	}

	#endregion Scripts and Styles
}

EasyAzon_Addition_Components_Popup::init();
