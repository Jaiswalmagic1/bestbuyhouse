<?php

if(!defined('ABSPATH')) { exit; }

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ProductAdvertisingAPIClientException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsRequest;

if(!defined('EASYAZON_ITEM')) {
	define('EASYAZON_ITEM', 'easyazon_item');
}

if(!defined('EASYAZON_ITEM_CACHE_PERIOD')) {
	define('EASYAZON_ITEM_CACHE_PERIOD', 1 * HOUR_IN_SECONDS);
}

if(!defined('EASYAZON_ITEM_OPTION')) {
	define('EASYAZON_ITEM_OPTION', 'easyazon_item_%s_%s_%s');
}

function easyazon_get_attributes() {
	return array(
		'Actor'                                => __('Actor', 'easyazon'),
		'Artist'                               => __('Artist', 'easyazon'),
		'AspectRatio'                          => __('Aspect Ratio', 'easyazon'),
		'AudienceRating'                       => __('Audience Rating', 'easyazon'),
		'AudioFormat'                          => __('Audio Format', 'easyazon'),
		'Author'                               => __('Author', 'easyazon'),
		'Binding'                              => __('Binding', 'easyazon'),
		'Brand'                                => __('Brand', 'easyazon'),
		'Category'                             => __('Category', 'easyazon'),
		'CEROAgeRating'                        => __('CERO Age Rating', 'easyazon'),
		'ClothingSize'                         => __('Clothing Size', 'easyazon'),
		'Color'                                => __('Color', 'easyazon'),
		'Creator'                              => __('Creator', 'easyazon'),
		'Department'                           => __('Department', 'easyazon'),
		'Director'                             => __('Director', 'easyazon'),
		'EAN'                                  => __('EAN', 'easyazon'),
		'Edition'                              => __('Edition', 'easyazon'),
		'EISBN'                                => __('EISBN', 'easyazon'),
		'EpisodeSequence'                      => __('Episode Sequence', 'easyazon'),
		'ESRBAgeRating'                        => __('ESRB Age Rating', 'easyazon'),
		'Feature'                              => __('Feature', 'easyazon'),
		'Format'                               => __('Format', 'easyazon'),
		'Genre'                                => __('Genre', 'easyazon'),
		'HardwarePlatform'                     => __('Hardware Platform', 'easyazon'),
		'HazardousMaterialType'                => __('Hazardous Material Type', 'easyazon'),
		'IsAdultProduct'                       => __('Is Adult Product', 'easyazon'),
		'IsAutographed'                        => __('Is Autographed', 'easyazon'),
		'ISBN'                                 => __('ISBN', 'easyazon'),
		'IsEligibleForTradeIn'                 => __('Is Eligible For Trade In', 'easyazon'),
		'IsMemorabilia'                        => __('Is Memorabilia', 'easyazon'),
		'IssuesPerYear'                        => __('Issues Per Year', 'easyazon'),
		'ItemDimensions'                       => __('Item Dimensions', 'easyazon'),
		'Height'                               => __('Height', 'easyazon'),
		'Length'                               => __('Length', 'easyazon'),
		'Weight'                               => __('Weight', 'easyazon'),
		'Width'                                => __('Width', 'easyazon'),
		'ItemPartNumber'                       => __('Item Part Number'),
		'Label'                                => __('Label', 'easyazon'),
		'Languages'                            => __('Languages', 'easyazon'),
		'LegalDisclaimer'                      => __('Legal Disclaimer', 'easyazon'),
		'ListPrice'                            => __('List Price', 'easyazon'),
		'Manufacturer'                         => __('Manufacturer', 'easyazon'),
		'ManufacturerMaximumAge'               => __('Manufacturer Maximum Age', 'easyazon'),
		'ManufacturerMinimumAge'               => __('Manufacturer Minimum Age', 'easyazon'),
		'ManufacturerPartsWarrantyDescription' => __('Manufacturer Parts Warranty Description', 'easyazon'),
		'MediaType'                            => __('Media Type', 'easyazon'),
		'Model'                                => __('Model', 'easyazon'),
		'MPN'                                  => __('MPN', 'easyazon'),
		'NumberOfDiscs'                        => __('Number Of Discs', 'easyazon'),
		'NumberOfIssues'                       => __('Number Of Issues', 'easyazon'),
		'NumberOfItems'                        => __('Number Of Items', 'easyazon'),
		'NumberOfPages'                        => __('Number Of Pages', 'easyazon'),
		'NumberOfTracks'                       => __('Number Of Tracks', 'easyazon'),
		'OperatingSystem'                      => __('Operating System', 'easyazon'),
		'PackageQuantity'                      => __('Package Quantity', 'easyazon'),
		'PartNumber'                           => __('Part Number', 'easyazon'),
		'Platform'                             => __('Platform', 'easyazon'),
		'ProductGroup'                         => __('Product Group', 'easyazon'),
		'ProductTypeSubcategory'               => __('Product Type Subcategory', 'easyazon'),
		'PublicationDate'                      => __('Publication Date', 'easyazon'),
		'Publisher'                            => __('Publisher', 'easyazon'),
		'RegionCode'                           => __('Region Code', 'easyazon'),
		'ReleaseDate'                          => __('Release Date', 'easyazon'),
		'RunningTime'                          => __('Running Time', 'easyazon'),
		'SeikodoProductCode'                   => __('Seikodo Product Code', 'easyazon'),
		'Size'                                 => __('Size', 'easyazon'),
		'SKU'                                  => __('SKU', 'easyazon'),
		'Studio'                               => __('Studio', 'easyazon'),
		'SubscriptionLength'                   => __('Subscription Length', 'easyazon'),
		'Title'                                => __('Title', 'easyazon'),
		'TradeInValue'                         => __('Trade In Value', 'easyazon'),
		'UPC'                                  => __('UPC', 'easyazon'),
		'Warranty'                             => __('Warranty', 'easyazon'),
		'WEEETaxValue'                         => __('WEEETaxValue', 'easyazon'),
	);
}

function easyazon_get_attribute($attribute) {
	$attributes = easyazon_get_attributes();

	return isset($attributes[$attribute]) ? $attributes[$attribute] : easyazon_split_camel_case($attribute);
}

function easyazon_get_attribute_value($attribute, $value) {
	$transformed = $value;

	if(is_array($transformed)) {
		return implode('<br />', array_map('esc_html', array_values($value)));
	} else {
		return esc_html($transformed);
	}
}

function easyazon_get_identifier_types() {
	return apply_filters(__FUNCTION__, array(
		'ASIN',
		'EAN',
		'ISBN',
		'SKU',
		'UPC',
	));
}

function easyazon_get_identifier_type($identifier_type) {
	$identifier_type = strtoupper($identifier_type);
	$identifier_types = easyazon_get_identifier_types();

	return isset($identifier_types[$identifier_type]) ? $identifier_types[$identifier_type] : current($identifier_types);
}

function easyazon_get_locales() {
	return apply_filters(__FUNCTION__, array(
		'US' => __('United States', 'easyazon'),
		'AU' => __('Australia', 'easyazon'),
		'BR' => __('Brazil', 'easyazon'),
		'CA' => __('Canada', 'easyazon'),
		'CN' => __('China', 'easyazon'),
		'FR' => __('France', 'easyazon'),
		'DE' => __('Germany', 'easyazon'),
		'IT' => __('Italy', 'easyazon'),
		'IN' => __('India', 'easyazon'),
		'JP' => __('Japan', 'easyazon'),
		'ES' => __('Spain', 'easyazon'),
		'UK' => __('United Kingdom', 'easyazon'),
		'MX' => __('Mexico', 'easyazon'),
		'NL' => __('Netherlands', 'easyazon'),
		'PL' => __('Poland', 'easyazon'),
		'SG' => __('Singapore', 'easyazon'),
		'SA' => __('Saudi Arabia', 'easyazon'),
		'SE' => __('Sweden', 'easyazon'),
		'TR' => __('Turkey', 'easyazon'),
		'AE' => __('United Arab Emirates', 'easyazon')
	));
}

function easyazon_get_locale($locale) {
	$locale = strtoupper($locale);
	$locales = easyazon_get_locales();

	return isset($locales[$locale]) ? $locale : key($locales);
}

function easyazon_get_locale_associate_signup_urls() {
	return apply_filters(__FUNCTION__, array(
		'US' => 'https://affiliate-program.amazon.com/',
		'AU' => 'https://affiliate-program.amazon.com.au/',
		'BR' => 'https://associados.amazon.com.br/',
		'CA' => 'https://associates.amazon.ca/',
		'CN' => 'https://associates.amazon.cn/',
		'DE' => 'https://partnernet.amazon.de/',
		'ES' => 'https://afiliados.amazon.es/',
		'FR' => 'https://partenaires.amazon.fr/',
		'IN' => 'https://affiliate-program.amazon.in/',
		'IT' => 'https://programma-affiliazione.amazon.it/',
		'JP' => 'https://affiliate.amazon.co.jp/',
		'UK' => 'https://affiliate-program.amazon.co.uk/',
		'MX' => 'https://afiliados.amazon.com.mx/',
		'NL' => 'https://partnernet.amazon.nl/',
		'PL' => 'https://affiliate-program.amazon.pl/',
		'SG' => 'https://affiliate-program.amazon.sg/',
		'SA' => 'https://affiliate-program.amazon.sa/',
		'SE' => 'https://affiliate-program.amazon.se/',
		'TR' => 'https://gelirortakligi.amazon.com.tr/',
		'AE' => 'https://affiliate-program.amazon.ae/'
	));
}

function easyazon_get_locale_associate_signup_url($locale) {
	$locale = easyazon_get_locale($locale);
	$locale_associate_signup_urls = easyazon_get_locale_associate_signup_urls();

	return isset($locale_associate_signup_urls[$locale]) ? $locale_associate_signup_urls[$locale] : current($locale_associate_signup_urls);
}

function easyazon_get_locale_hosts() {
	return apply_filters(__FUNCTION__, array(
		'US' => 'webservices.amazon.com',
		'AU' => 'webservices.amazon.com.au',
		'BR' => 'webservices.amazon.com.br',
		'CA' => 'webservices.amazon.ca',
		'FR' => 'webservices.amazon.fr',
		'DE' => 'webservices.amazon.de',
		'IN' => 'webservices.amazon.in',
		'IT' => 'webservices.amazon.it',
		'JP' => 'webservices.amazon.co.jp',
		'MX' => 'webservices.amazon.com.mx',
		'NL' => 'webservices.amazon.nl',
		'PL' => 'webservices.amazon.pl',
		'SG' => 'webservices.amazon.sg',
		'SA' => 'webservices.amazon.sa',
		'ES' => 'webservices.amazon.es',
		'SE' => 'webservices.amazon.se',
		'TR' => 'webservices.amazon.com.tr',
		'AE' => 'webservices.amazon.ae',
		'UK' => 'webservices.amazon.co.uk',
	));
}

function easyazon_get_locale_host($locale) {
	$locale = easyazon_get_locale($locale);
	$locale_hosts = easyazon_get_locale_hosts();

	return isset($locale_hosts[$locale]) ? $locale_hosts[$locale] : current($locale_hosts);
}

function easyazon_get_locale_regions() {
	return apply_filters(__FUNCTION__, array(
		'US' => 'us-east-1',
		'AU' => 'us-west-2',
		'BR' => 'us-east-1',
		'CA' => 'us-east-1',
		'FR' => 'eu-west-1',
		'DE' => 'eu-west-1',
		'IN' => 'eu-west-1',
		'IT' => 'eu-west-1',
		'JP' => 'us-west-2',
		'MX' => 'us-east-1',
		'NL' => 'eu-west-1',
		'PL' => 'eu-west-1',
		'SG' => 'us-west-2',
		'SA' => 'eu-west-1',
		'ES' => 'eu-west-1',
		'SE' => 'eu-west-1',
		'TR' => 'eu-west-1',
		'AE' => 'eu-west-1',
		'UK' => 'eu-west-1',
	));
}

function easyazon_get_locale_region($locale) {
	$locale = easyazon_get_locale($locale);
	$locale_regions = easyazon_get_locale_regions();

	return isset($locale_regions[$locale]) ? $locale_regions[$locale] : current($locale_regions);
}

function easyazon_get_locale_tlds() {
	return apply_filters(__FUNCTION__, array(
		'US' => 'com',
		'AU' => 'com.au',
		'BR' => 'com.br',
		'CA' => 'ca',
		'CN' => 'cn',
		'DE' => 'de',
		'ES' => 'es',
		'FR' => 'fr',
		'IT' => 'it',
		'IN' => 'in',
		'JP' => 'co.jp',
		'UK' => 'co.uk',
		'MX' => 'com.mx',
		'NL' => 'nl',
		'PL' => 'pl',
		'SG' => 'sg',
		'SA' => 'sa',
		'SE' => 'se',
		'TR' => 'com.tr',
		'AE' => 'ae'
	));
}

function easyazon_get_locale_tld($locale) {
	$locale = easyazon_get_locale($locale);
	$locale_tlds = easyazon_get_locale_tlds();

	return isset($locale_tlds[$locale]) ? $locale_tlds[$locale] : current($locale_tlds);
}

function easyazon_get_item_cached($identifier, $locale) {
	$item = wp_cache_get(EASYAZON_ITEM, easyazon_get_item_cache_key($identifier, $locale));

	if(false === $item) {
		$item = get_option(easyazon_get_item_option_name($identifier, $locale), false);
	}

	if(!$item || ($item && (!isset($item['expires']) || $item['expires'] < time()))) {
		$item = false;
	}

	return $item;
}

function easyazon_get_item($identifier, $locale) {
	if(empty($identifier) || empty($locale)) {
		return false;
	} else {
		$item = easyazon_get_item_cached($identifier, $locale);

		if(!$item) {
			$item = easyazon_api_get_item($identifier, $locale);

			if($item && !is_wp_error($item)) {
				$item = easyazon_set_item($identifier, $locale, $item);
			} else {
				$item = false;
			}
		}
	}

	return $item;
}

function easyazon_get_items($identifiers, $locale) {
	if(empty($identifiers)) { return array(); }

	// This is what we'll return
	$items     = array();

	// Hold the identifiers we need to get information for
	$queryable = array();

	// First we'll look through the identifiers and try to get the cached stuff
	foreach($identifiers as $identifier) {
		$item = easyazon_get_item_cached($identifier, $locale);

		if($item) {
			$items[$identifier] = $item;
		} else {
			$queryable[]        = $identifier;
		}
	}

	// Fetch items from the API that haven't previous been fetched
	$queried_items = easyazon_api_get_items($queryable, $locale);
	if(is_array($queried_items)) {
		foreach($queried_items as $queried_item) {
			$items[$queried_item['identifier']] = $queried_item;
		}
	}

	// Cache items that need it
	foreach($items as $identifier => $item) {
		if(isset($item['expires'])) { continue; }

		easyazon_set_item($identifier, $locale, $item);
	}

	return $items;
}

function easyazon_get_item_cache_key($identifier, $locale) {
	$version = EASYAZON_VERSION;

	return "{$identifier}_{$locale}_{$version}";
}

function easyazon_get_item_option_name($identifier, $locale) {
	$version = EASYAZON_VERSION;

	return sprintf(EASYAZON_ITEM_OPTION, $identifier, $locale, $version);
}

function easyazon_set_item($identifier, $locale, $item) {
	$item['fetched'] = time();
	$item['expires'] = $expires = time() + EASYAZON_ITEM_CACHE_PERIOD;

	$cache_key = easyazon_get_item_cache_key($identifier, $locale);
	wp_cache_delete(EASYAZON_ITEM, $cache_key);

	$option_name = easyazon_get_item_option_name($identifier, $locale);
	delete_option($option_name);

	wp_cache_set(EASYAZON_ITEM, $item, $cache_key, $expires);
	add_option($option_name, $item, null, 'no');

	return $item;
}

function easyazon_api_get_item($identifier, $locale = null, $associate_tag = null) {
	$identifiers = is_array($identifier) ? $identifier : [$identifier];
	$response    = easyazon_api_get_items($identifiers, $locale, $associate_tag);

	if(is_wp_error($response)) {
		return $response;
	} else {
		// Normalize to a single item
		return reset($response);
	}
}

function easyazon_api_get_items($identifiers, $locale = null, $associate_tag = null) {
	$locale         = easyazon_get_locale($locale);
	$identifiers    = is_array($identifiers) ? array_unique($identifiers) : array_unique(array($identifiers));
	$associate_tags = easyazon_get_setting(sprintf('associates_%s', strtolower($locale)));
	$associate_tags = array_map('trim', explode(',', $associate_tags));
	$associate_tag  = reset($associate_tags);

	if(empty($identifiers)) {
		return new \WP_Error('easyazon_api_get_items', __('Item identifiers must be provided', 'easyazon'));
	}

	$config    = easyazon_api_config($locale);
	$instance  = new DefaultApi(new GuzzleHttp\Client(), $config);
	$resources = easyazon_api_resources();

	$request = new GetItemsRequest();
	$request->setItemIds($identifiers);
	$request->setPartnerTag($associate_tag);
	$request->setPartnerType(PartnerType::ASSOCIATES);
	$request->setResources($resources);

	try {
		$response = easyazon_api_response_get_items($instance->getItems($request), $locale);
	} catch (ApiException $e) {
		$response = new \WP_Error('easyazon_api_get_items', easyazon_api_error_message($e));
	} catch (Exception $e) {
		$response = new \WP_Error('easyazon_api_get_items', $e->getMessage());
	}

	return $response;
}

function easyazon_api_search($keywords, $page = 1, $locale = null, $associate_tag = null, $args = array()) {
	$limit    = 10;
	$keywords = trim($keywords);
	$page     = min(10, max(1, intval($page)));

	if(empty($keywords)) {
		return new \WP_Error('easyazon_api_search', __('A search phrase must be provided', 'easyazon'));
	}

	$index = easyazon_retrieve($args, 'SearchIndex', 'All');
	$sort  = easyazon_retrieve($args, 'Sort', false);
	$min   = easyazon_retrieve($args, 'MinimumPrice', false);
	$max   = easyazon_retrieve($args, 'MaximumPrice', false);

	$locale         = easyazon_get_locale($locale);
	$associate_tags = array_map('trim', explode(',', easyazon_get_setting(sprintf('associates_%s', strtolower($locale)))));
	$associate_tag  = reset($associate_tags);

	$config    = easyazon_api_config($locale);
	$instance  = new DefaultApi(new GuzzleHttp\Client(), $config);
	$resources = easyazon_api_resources();

	$request = new SearchItemsRequest();
	$request->setSearchIndex($index);
	$request->setKeywords($keywords);
	$request->setItemCount($limit);
	$request->setItemPage($page);
	$request->setPartnerTag($associate_tag);
	$request->setPartnerType(PartnerType::ASSOCIATES);
	$request->setResources($resources);

	if(false === empty($sort)) {
		$request->setSortBy($sort);
	}

	if(false === empty($min)) {
		$request->setMinPrice($min);
	}

	if(false === empty($max)) {
		$request->setMaxPrice($max);
	}

	try {
		$response = $instance->searchItems($request);

		$response = easyazon_api_response_search($response, $keywords, $locale, $limit, $page);
	} catch (ApiException $e) {
		$response = new \WP_Error('easyazon_api_get_items', easyazon_api_error_message($e));
	} catch (Exception $e) {
		$response = new \WP_Error('easyazon_api_get_items', $e->getMessage());
	}

	return $response;
}

function easyazon_api_config($locale, $access_key = null, $secret_key = null) {
	$locale = easyazon_get_locale($locale);

	$access_key = null === $access_key ? easyazon_get_setting('access_key') : $access_key;
	$secret_key = null === $secret_key ? easyazon_get_setting('secret_key') : $secret_key;

	$config = new Configuration();
	$config->setAccessKey($access_key);
	$config->setSecretKey($secret_key);
	$config->setHost(easyazon_get_locale_host($locale));
	$config->setRegion(easyazon_get_locale_region($locale));

	return $config;
}

/**
 * @param ApiException $exception
 */
function easyazon_api_error_message($exception) {
	$object  = $exception->getResponseObject();
	$errors  = is_object($object) && method_exists($object, 'getErrors') ? $object->getErrors() : [];
	$error   = current($errors);
	$code    = is_object($error) && method_exists($error, 'getCode') ? $error->getCode() : 'UnknownError.';
	$message = is_object($error) && method_exists($error, 'getMessage') ? $error->getMessage() : __('Unknown error.', 'easyazon');

	switch($code) {
		case 'TooManyRequests':
			$message .= __(' See rate limits at https://webservices.amazon.com/paapi5/documentation/troubleshooting/api-rates.html', 'easyazon');
			break;
	}

	return $message;
}

function easyazon_api_resources() {
	return array(
		GetItemsResource::BROWSE_NODE_INFOBROWSE_NODES,
		GetItemsResource::BROWSE_NODE_INFOBROWSE_NODESANCESTOR,
		GetItemsResource::IMAGESPRIMARYLARGE,
		GetItemsResource::IMAGESPRIMARYMEDIUM,
		GetItemsResource::IMAGESPRIMARYSMALL,
		GetItemsResource::IMAGESVARIANTSLARGE,
		GetItemsResource::IMAGESVARIANTSMEDIUM,
		GetItemsResource::IMAGESVARIANTSSMALL,
		GetItemsResource::ITEM_INFOBY_LINE_INFO,
		GetItemsResource::ITEM_INFOCLASSIFICATIONS,
		GetItemsResource::ITEM_INFOCONTENT_INFO,
		GetItemsResource::ITEM_INFOCONTENT_RATING,
		GetItemsResource::ITEM_INFOEXTERNAL_IDS,
		GetItemsResource::ITEM_INFOFEATURES,
		GetItemsResource::ITEM_INFOMANUFACTURE_INFO,
		GetItemsResource::ITEM_INFOPRODUCT_INFO,
		GetItemsResource::ITEM_INFOTECHNICAL_INFO,
		GetItemsResource::ITEM_INFOTITLE,
		GetItemsResource::ITEM_INFOTRADE_IN_INFO,
		GetItemsResource::OFFERSLISTINGSCONDITION,
		GetItemsResource::OFFERSLISTINGSPRICE,
		GetItemsResource::OFFERSLISTINGSSAVING_BASIS,
		GetItemsResource::OFFERSSUMMARIESHIGHEST_PRICE,
		GetItemsResource::OFFERSSUMMARIESLOWEST_PRICE,
	);
}

function easyazon_api_response($response) {
	if(is_wp_error($response)) {
		easyazon_debug($response);
	}

	return $response;
}

function easyazon_api_response_get_items($response, $locale) {
	if(is_wp_error($response)) {
		return $response;
	}

	$data  = json_decode((string) $response, true);
	$items = array_map('easyazon_api_response_normalize_item', easyazon_retrieve($data, 'ItemsResult.Items', array(), 'easyazon_array'));

	return $items;
}

function easyazon_api_response_search($response, $keywords, $locale, $limit, $page) {
	if(is_wp_error($response)) {
		return $response;
	}

	$data  = json_decode((string) $response, true);
	$items = array_map('easyazon_api_response_normalize_item', easyazon_retrieve($data, 'SearchResult.Items', array(), 'easyazon_array'));
	$count = easyazon_retrieve($data, 'SearchResult.TotalResultCount', 0, 'intval');
	$pages = min(10, ceil($count / $limit));

	return compact(
		'count',
		'keywords',
		'locale',
		'page',
		'pages',
		'items'
	);
}

function easyazon_api_response_normalize_item($item) {
	$identifier = easyazon_retrieve($item, 'ASIN', '');
	$title      = easyazon_retrieve($item, 'ItemInfo.Title.DisplayValue', '');
	$url        = easyazon_retrieve($item, 'DetailPageURL', '');

	$images_p = array_map('array_change_key_case', array_values(easyazon_retrieve($item, 'Images.Primary', array(), 'easyazon_array')));
	$images_v = array_map('array_values', easyazon_retrieve($item, 'Images.Variants', array(), 'easyazon_array'));
	$images_v = array_map('array_change_key_case', empty($images_v) ? array() : call_user_func_array('array_merge', $images_v));

	$images = array_merge($images_p, $images_v);

	$offer = [
		'condition' => easyazon_retrieve($item, ['Offers', 'Listings', 0, 'Condition', 'Value'], false),
		'price'     => easyazon_retrieve($item, ['Offers', 'Listings', 0, 'Price', 'DisplayAmount'], false),
		'saved'     => easyazon_retrieve($item, ['Offers', 'Listings', 0, 'Price', 'Savings', 'DisplayAmount'], false),
	];

	$offer_summaries = easyazon_retrieve($item, 'Offers.Summaries', array(), 'easyazon_array');
	$offer_summaries_n = array_filter($offer_summaries, function($summary) { return 'New' === easyazon_retrieve($summary, 'Condition.Value', false); });
	$offer_summaries_r = array_filter($offer_summaries, function($summary) { return 'Refurbished' === easyazon_retrieve($summary, 'Condition.Value', false); });
	$offer_summaries_u = array_filter($offer_summaries, function($summary) { return 'Used' === easyazon_retrieve($summary, 'Condition.Value', false); });

	$lowest_price_n = easyazon_retrieve($offer_summaries_n, [0, 'LowestPrice', 'DisplayAmount'], false);
	$lowest_price_r = easyazon_retrieve($offer_summaries_r, [0, 'LowestPrice', 'DisplayAmount'], false);
	$lowest_price_u = easyazon_retrieve($offer_summaries_u, [0, 'LowestPrice', 'DisplayAmount'], false);

	$nodes = easyazon_api_response_normalize_browse_nodes(easyazon_retrieve($item, 'BrowseNodeInfo.BrowseNodes', array()));

	$attributes = easyazon_api_response_normalize_attributes($item);

	return [
		'attributes'     => $attributes,
		'identifier'     => $identifier,
		'images'         => $images,
		'lowest_price_n' => $lowest_price_n,
		'lowest_price_r' => $lowest_price_r,
		'lowest_price_u' => $lowest_price_u,
		'nodes'          => $nodes,
		'offer'          => $offer,
		'title'          => $title,
		'url'            => $url,
	];
}

function easyazon_api_response_normalize_attributes($item) {
	$normalized = array();

	$keys = [
		'ItemInfo.ByLineInfo',
		'ItemInfo.Classifications',
		'ItemInfo.ContentInfo',
		'ItemInfo.ContentRating',
		'ItemInfo.ExternalIds',
		'ItemInfo.Features',
		'ItemInfo.ManufactureInfo',
		'ItemInfo.ProductInfo',
		'ItemInfo.TechnicalInfo',
	];

	foreach($keys as $key) {
		$data = easyazon_retrieve($item, $key, array(), 'easyazon_array');

		foreach($data as $datum) {
			$label  = easyazon_retrieve($datum, 'Label', false);
			$value  = easyazon_retrieve($datum, 'DisplayValue', false);
			$values = easyazon_retrieve($datum, 'DisplayValues', false);

			if(in_array($label, ['ItemDimensions'])) {
				continue;
			}

			if(false !== $label && (false !== $value || false !== $values)) {
				if($values) {
					$normalized[$label] = $values;
				} else {
					$normalized[$label] = $value;
				}
			}
		}
	}

	if(($item_dimensions = easyazon_retrieve($item, 'ItemInfo.ProductInfo.ItemDimensions', false))) {
		$normalized['ItemDimensions'] = array_combine(array_map(function($datum) {
			return easyazon_retrieve($datum, 'Label', '');
		}, $item_dimensions), array_map(function($datum) {
			return trim(sprintf('%s %s', easyazon_retrieve($datum, 'DisplayValue', ''), easyazon_retrieve($datum, 'Unit', '')));
		}, $item_dimensions));
	}

	ksort($normalized);

	return array_filter($normalized);
}

function easyazon_api_response_normalize_browse_nodes($nodes) {
	return array_map(function($node) {
		$ancestor  = easyazon_retrieve($node, 'Ancestor', false);
		$ancestors = array_filter(array($ancestor));

		return array(
			'ancestors' => easyazon_api_response_normalize_browse_nodes($ancestors),
			'children'  => array(),
			'id'        => easyazon_retrieve($node, 'Id', 0),
			'name'      => easyazon_retrieve($node, 'DisplayName', ''),
			'root'      => easyazon_retrieve($node, 'IsRoot', false),
		);
	}, easyazon_array($nodes));
}
