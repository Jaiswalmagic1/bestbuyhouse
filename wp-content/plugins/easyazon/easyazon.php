<?php
/*
Plugin Name: EasyAzon
Plugin URI: https://easyazon.com/
Description: Quickly and easily insert Amazon affiliate links into your site's content.
Version: 5.1.0
Author: EasyAzon
Author URI: https://easyazon.com/
Text Domain: easyazon
*/

if(!defined('EASYAZON_PHP_VERSION_REQUIRED')) {
	define('EASYAZON_PHP_VERSION_REQUIRED', '5.3.0');
}

if(!defined('EASYAZON_VERSION')) {
	define('EASYAZON_VERSION', '5.1.0');
}

function easyazon_initialization() {
	if(version_compare(phpversion(), EASYAZON_PHP_VERSION_REQUIRED, 'ge')) {
		// All requirements are met

		if(!defined('EASYAZON_LOADED')) {
			define('EASYAZON_LOADED', true);
		}

		if(!defined('EASYAZON_CACHE_PERIOD')) {
			define('EASYAZON_CACHE_PERIOD', 6 * HOUR_IN_SECONDS);
		}

		if(!defined('EASYAZON_PLUGIN_BASENAME')) {
			define('EASYAZON_PLUGIN_BASENAME', plugin_basename(__FILE__));
		}

		if(!defined('EASYAZON_PLUGIN_DIRECTORY')) {
			define('EASYAZON_PLUGIN_DIRECTORY', dirname(__FILE__));
		}

		if(!defined('EASYAZON_PLUGIN_FILE')) {
			define('EASYAZON_PLUGIN_FILE', __FILE__);
		}

		$easyazonpro = false;
		if(defined('EASYAZONPRO_VERSION') && EASYAZONPRO_VERSION){ 
		    $easyazonpro = true;
		}
		define('EASYAZON_PRO_ENABLED', $easyazonpro);

		// Amazon library and dependencies
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'vendor/autoload.php'));

		// Amazon library for making requests to the Amazon Product Advertising API
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'lib/amazon.php'));

		// Require the utility functions that this plugin depends on in various ways
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'lib/utility.php'));

		// Require the lifecycle component regardless of whether we're at the initialization phase
		// so that activation and deactivation events can occur and items can be upgraded as necessary
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/lifecycle/lifecycle.php'));

		// Check for old version of Pro
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/pro-check/pro-check.php'));

		// Settings component adds the EasyAzon top level menu and settings page, as well as registering the settings
		// and introducing functions allowing access to those settings
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/settings/settings.php'));

		// Settings sections are separate components for each section that will be on the settings page, done
		// this way to allow for easy expandability in the future
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/settings-sections/associates/associates.php'));
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/settings-sections/credentials/credentials.php'));
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/settings-sections/links/links.php'));
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/settings-sections/search/search.php'));
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/settings-sections/upgrade/upgrade.php'));

		// About component adds the About page to the EasyAzon top level menu
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/about/about.php'));

		// Editor component adds the button to the media button area of the editor and also enqueues
		// the script needed to pop up the EasyAzon workflow
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/editor/editor.php'));

		// Interface for the popup
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/popup/popup.php'));

		// Interface for popup states
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/popup-states/search/search.php'));
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/popup-states/link/link.php'));

		// Additions to the popup states
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/popup-states-additions/popup-states-additions.php'));

		// Answer queries from the popup editor
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/ajax/ajax.php'));

		// Hooks for both frontend and backend
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/hooks/hooks.php'));

		// Enque scripts for both frontend and backend
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/hooks/scripts.php'));

		// Improve site performance by prefetching items
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/performance/performance.php'));

		// Shortcodes for replacement content
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/shortcodes/shortcodes.php'));

		// Specific shortcodes
		require_once(path_join(EASYAZON_PLUGIN_DIRECTORY, 'components/shortcodes/link/link.php'));

		// Attached/detached Pro-version
		if(!EASYAZON_PRO_ENABLED) {
			if(!defined('EASYAZON_ADDITION_PLUGIN_DIRECTORY')) {
				define('EASYAZON_ADDITION_PLUGIN_DIRECTORY', path_join(EASYAZON_PLUGIN_DIRECTORY, 'addition'));
			}

			// Amazon library for making requests to the Amazon Product Advertising API
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'lib/amazon.php'));

			// Settings sections are separate components for each section that will be on the settings page, done
			// this way to allow for easy expandability in the future
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/settings-sections/associates/associates.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/settings-sections/links/links.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/settings-sections/localization/localization.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/settings-sections/upgrade/upgrade.php'));

			// Some additions to the generic popup functionality
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup/popup.php'));

			// Some additions to the generic settings page
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/settings/settings.php'));

			// Interface for popup states
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states/call-to-action/call-to-action.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states/image/image.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states/info-block/info-block.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states/link/link.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states/search/search.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states/search-results/search-results.php'));

			// Add stuff to popup states (across popup states)
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popup-states-additions/popup-states-additions.php'));

			// Answer queries from the popup editor
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/ajax/ajax.php'));

			// Shortcodes for replacement content
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/shortcodes/shortcodes.php'));

			// Specific shortcodes
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/shortcodes/call-to-action/call-to-action.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/shortcodes/image/image.php'));
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/shortcodes/info-block/info-block.php'));

			// Cloaking parse and redirection
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/cloaking/cloaking.php'));

			// Localization functions
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/localization/localization.php'));

			// Localization link transformation
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/localization/links/links.php'));

			// Localization specs
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/localization/specs/specs.php'));

			// Popover awesomeness
			require_once(path_join(EASYAZON_ADDITION_PLUGIN_DIRECTORY, 'components/popovers/popovers.php'));
		} else {
			function easyazon_proversion_enabled_notice() {
				printf('<div id="easyazon-proversion-notice" class="notice notice-warning"><p>%s</p></div>', __('EasyAzon latest version '. EASYAZON_VERSION .' already supported all pro version feature. <a href="'. admin_url( 'plugins.php' ) .'">Disable EasyAzon Pro</a>.', 'easyazon'));
			}
			add_action('admin_notices', 'easyazon_proversion_enabled_notice');
		}
	} else {
		// PHP version does meet minimum requirement

		function easyazon_phpversion_notice() {
			printf('<div id="easyazon-phpversion-notice" class="error"><p>%s</p></div>', sprintf(__('EasyAzon %s requires at least of PHP %s. Please upgrade your PHP installation.', 'easyazon'), EASYAZON_VERSION, EASYAZON_PHP_VERSION_REQUIRED));
		}
		add_action('admin_notices', 'easyazon_phpversion_notice');
	}
}
add_action('plugins_loaded', 'easyazon_initialization', 9);
