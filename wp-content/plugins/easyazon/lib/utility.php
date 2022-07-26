<?php

if(!defined('ABSPATH')) { exit; }

/**
 * Utility function to redirect using `wp_redirect` without
 * having to remember to `exit` after a call to the function.
 *
 * @param string $url The url to redirect to
 * @param int $code The HTTP response code to use for redirection (301 or 302 are the most common)
 * @return void
 */
function easyazon_redirect($url, $code = 302) {
	if(wp_redirect($url, $code)) {
		exit;
	} else {
		wp_die(sprintf(__('EasyAzon could not redirect to %s with code %s', 'easyazon'), $url, $code));
	}
}

/**
 * Given a value, ensure it is an array by returning the value if it is already an array
 * or an empty array if it is not.
 *
 * @param mixed $value The value to check
 * @return array       An array value
 */
function easyazon_array($value) {
	return is_array($value) ? $value : array();
}

/**
 * Given an array, returns a value located at index. For a nested value, specify an index string with parts
 * separated by a period character or an array of indices. If there is no value at the specified index, or the index is unreachable,
 * return the default value specified.
 *
 * @param  array         $collection The array from which a value should be retrieved.
 * @param  array|string  $index      A set of indices separated by periods or an array of indices.
 * @param  mixed         $default    A value to return if a value cannot otherwise be retrieved from the array.
 * @param  null|callable $callback   A callback to apply to the value which will be returned.
 * @return mixed
 */
function easyazon_retrieve($collection, $index, $default = null, $callback = null)
{
	if ((is_array($index) && false === empty($index)) || (is_string($index) && '' !== $index) || is_int($index)) {
		$index = is_array($index) ? $index : trim($index);
		$parts = is_array($index) ? $index : (is_string($index) ? explode('.', $index) : array($index));

		while (is_array($collection) && null !== ($part = array_shift($parts))) {
			$collection = isset($collection[$part]) ? $collection[$part] : $default;
		}

		if (count($parts) > 0) {
			// If there are any indices left, then we obviously failed finding what we need
			$collection = $default;
		}
	} else {
		$collection = $default;
	}

	if (is_callable($callback)) {
		$collection = call_user_func($callback, $collection);
	}

	return $collection;
}

/**
 * Utility function to debug information to the error log. This
 * function only logs information if the `EASYAZON_DEBUG` constant
 * is defined and evaluates to true. All arguments passed to the function
 * are logged.
 *
 * @return void
 */
function easyazon_debug($variable) {
	if(defined('EASYAZON_DEBUG') && EASYAZON_DEBUG && is_file(EASYAZON_DEBUG) && is_writable(EASYAZON_DEBUG)) {
		$variables = func_get_args();
		$backtrace = debug_backtrace();

		$tracefile = str_replace(EASYAZON_PLUGIN_DIRECTORY, '', $backtrace[0]['file']);
		$traceline = $backtrace[0]['line'];

		foreach($variables as $variable) {
			$fileline = "{$tracefile}::{$traceline}";

			if(is_scalar($variable)) {
				file_put_contents(EASYAZON_DEBUG, "{$fileline} - {$variable}\n", FILE_APPEND);
			} else {
				file_put_contents(EASYAZON_DEBUG, "{$fileline} - complex\n", FILE_APPEND);
				file_put_contents(EASYAZON_DEBUG, print_r($variable, true), FILE_APPEND);
			}
		}
	}
}

/**
 * Collapse an associative array of attribute => value into a string appropriate
 * for HTML insertion.
 *
 * @param array $attributes The attributes to collapse
 * @return string A string for insertion into an HTML tag.
 */
function easyazon_collapse_attributes($attributes) {
	ksort($attributes);

	$parts = array();

	foreach(array_filter($attributes) as $name => $value) {
		if(is_array($value)) {
			$value = implode(' ', array_map('esc_attr', $value));
		} else {
			$value = esc_attr($value);
		}

		$parts[] = "{$name}=\"{$value}\"";
	}

	return implode(' ', $parts);
}

function easyazon_get_shortcodes() {
	return apply_filters('easyazon_get_shortcodes', array());
}

/**
 * Return an item url based on attributes and the item itself.
 *
 * @param array $item An item returned from the Amazon API
 * @return string The URL for the item given the attributes for the shortcode
 */
function easyazon_get_url($shortcode_atts) {
	return apply_filters('easyazon_get_url', '', $shortcode_atts);
}

function easyazon_split_camel_case($word) {
	$regex = '/(?<=[a-z])(?=[A-Z])|(?<=[A-Z])(?=[A-Z][a-z])/x';

	return join(' ', preg_split($regex, $word));
}

/**
 * Simple utility to sanitize things as a discreet yes/no value.
 *
 * @param string $value The value to check for yes/no.
 * @return string A string 'y' if $value is 'y' or 'n' otherwise
 */
function easyazon_yn($value) {
	return 'y' === $value || 'yes' === $value ? 'y' : 'n';
}

/**
 * Check whether we are on our admin pages or not
 *
 * @return bool
 */
function easyazon_is_plugin_admin() {
	$screen = get_current_screen();
	return ( strpos( $screen->id, 'easyazon' ) !== false ) ? true : false;
}