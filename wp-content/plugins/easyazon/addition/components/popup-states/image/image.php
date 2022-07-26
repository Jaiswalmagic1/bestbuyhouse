<?php

if(!defined('ABSPATH')) { exit; }

class EasyAzon_Addition_Components_PopupStates_Image {
	public static function init() {
		self::_add_actions();
		self::_add_filters();
	}

	private static function _add_actions() {
		if(is_admin()) {
			// Actions that only affect the administrative interface or operation
			add_action('easyazon_popup_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
			add_action('easyazon_popup_states', array(__CLASS__, 'output_state'));
		} else {
			// Actions that only affect the frontend interface or operation
		}

		// Actions that affect both the administrative and frontend interface or operation
	}

	private static function _add_filters() {
		if(is_admin()) {
			// Filters that only affect the administrative interface or operation
			add_filter('easyazon_search_result_column_insert_links', array(__CLASS__, 'add_insert_links'));
		} else {
			// Filters that only affect the frontend interface or operation
		}

		// Filters that affect both the administrative and frontend interface or operation
	}

	#region State

	public static function output_state() {
		include('views/state.php');
	}

	#endregion State

	#region Search Result Links

	public static function add_insert_links($links) {
		$links[] = sprintf('<a href="#" data-bind="click: $root.imageActivate">%s</a>', esc_html(__('Image Link', 'easyazon')));

		return $links;
	}

	#endregion Search Result Links

	#region Scripts and Styles

	public static function enqueue_scripts() {
		wp_enqueue_script('easyazon-addition-popup-states-image', plugins_url('resources/popup-state.js', __FILE__), array('easyazon-popup'), EASYAZON_VERSION, true);
		wp_enqueue_style('easyazon-addition-popup-states-image', plugins_url('resources/popup-state.css', __FILE__), array('easyazon-popup'), EASYAZON_VERSION);

		wp_localize_script('easyazon-addition-popup-states-image', 'EasyAzon_Addition_PopupStates_Image', array(
			'shortcode' => EASYAZON_ADDITION_SHORTCODE_IMAGE,
		));
	}

	#endregion Scripts and Styles
}

EasyAzon_Addition_Components_PopupStates_Image::init();
