<?php

if(!defined('ABSPATH')) { exit; }

function easyazon_get_call_to_action_buttons() {
	return apply_filters(__FUNCTION__, EasyAzon_Addition_Components_Shortcodes_CTA::get_call_to_action_buttons());
}
