<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('wizors_investments_storage_get')) {
	function wizors_investments_storage_get($var_name, $default='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		return isset($WIZORS_INVESTMENTS_STORAGE[$var_name]) ? $WIZORS_INVESTMENTS_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('wizors_investments_storage_set')) {
	function wizors_investments_storage_set($var_name, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		$WIZORS_INVESTMENTS_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('wizors_investments_storage_empty')) {
	function wizors_investments_storage_empty($var_name, $key='', $key2='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($WIZORS_INVESTMENTS_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]);
		else
			return empty($WIZORS_INVESTMENTS_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('wizors_investments_storage_isset')) {
	function wizors_investments_storage_isset($var_name, $key='', $key2='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]);
		else
			return isset($WIZORS_INVESTMENTS_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('wizors_investments_storage_inc')) {
	function wizors_investments_storage_inc($var_name, $value=1) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (empty($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = 0;
		$WIZORS_INVESTMENTS_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('wizors_investments_storage_concat')) {
	function wizors_investments_storage_concat($var_name, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (empty($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = '';
		$WIZORS_INVESTMENTS_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('wizors_investments_storage_get_array')) {
	function wizors_investments_storage_get_array($var_name, $key, $key2='', $default='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]) ? $WIZORS_INVESTMENTS_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key][$key2]) ? $WIZORS_INVESTMENTS_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('wizors_investments_storage_set_array')) {
	function wizors_investments_storage_set_array($var_name, $key, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if ($key==='')
			$WIZORS_INVESTMENTS_STORAGE[$var_name][] = $value;
		else
			$WIZORS_INVESTMENTS_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('wizors_investments_storage_set_array2')) {
	function wizors_investments_storage_set_array2($var_name, $key, $key2, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key])) $WIZORS_INVESTMENTS_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$WIZORS_INVESTMENTS_STORAGE[$var_name][$key][] = $value;
		else
			$WIZORS_INVESTMENTS_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('wizors_investments_storage_merge_array')) {
	function wizors_investments_storage_merge_array($var_name, $key, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if ($key==='')
			$WIZORS_INVESTMENTS_STORAGE[$var_name] = array_merge($WIZORS_INVESTMENTS_STORAGE[$var_name], $value);
		else
			$WIZORS_INVESTMENTS_STORAGE[$var_name][$key] = array_merge($WIZORS_INVESTMENTS_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('wizors_investments_storage_set_array_after')) {
	function wizors_investments_storage_set_array_after($var_name, $after, $key, $value='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if (is_array($key))
			wizors_investments_array_insert_after($WIZORS_INVESTMENTS_STORAGE[$var_name], $after, $key);
		else
			wizors_investments_array_insert_after($WIZORS_INVESTMENTS_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('wizors_investments_storage_set_array_before')) {
	function wizors_investments_storage_set_array_before($var_name, $before, $key, $value='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if (is_array($key))
			wizors_investments_array_insert_before($WIZORS_INVESTMENTS_STORAGE[$var_name], $before, $key);
		else
			wizors_investments_array_insert_before($WIZORS_INVESTMENTS_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('wizors_investments_storage_push_array')) {
	function wizors_investments_storage_push_array($var_name, $key, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($WIZORS_INVESTMENTS_STORAGE[$var_name], $value);
		else {
			if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key])) $WIZORS_INVESTMENTS_STORAGE[$var_name][$key] = array();
			array_push($WIZORS_INVESTMENTS_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('wizors_investments_storage_pop_array')) {
	function wizors_investments_storage_pop_array($var_name, $key='', $defa='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($WIZORS_INVESTMENTS_STORAGE[$var_name]) && is_array($WIZORS_INVESTMENTS_STORAGE[$var_name]) && count($WIZORS_INVESTMENTS_STORAGE[$var_name]) > 0) 
				$rez = array_pop($WIZORS_INVESTMENTS_STORAGE[$var_name]);
		} else {
			if (isset($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]) && is_array($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]) && count($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($WIZORS_INVESTMENTS_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('wizors_investments_storage_inc_array')) {
	function wizors_investments_storage_inc_array($var_name, $key, $value=1) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if (empty($WIZORS_INVESTMENTS_STORAGE[$var_name][$key])) $WIZORS_INVESTMENTS_STORAGE[$var_name][$key] = 0;
		$WIZORS_INVESTMENTS_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('wizors_investments_storage_concat_array')) {
	function wizors_investments_storage_concat_array($var_name, $key, $value) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if (!isset($WIZORS_INVESTMENTS_STORAGE[$var_name])) $WIZORS_INVESTMENTS_STORAGE[$var_name] = array();
		if (empty($WIZORS_INVESTMENTS_STORAGE[$var_name][$key])) $WIZORS_INVESTMENTS_STORAGE[$var_name][$key] = '';
		$WIZORS_INVESTMENTS_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('wizors_investments_storage_call_obj_method')) {
	function wizors_investments_storage_call_obj_method($var_name, $method, $param=null) {
		global $WIZORS_INVESTMENTS_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($WIZORS_INVESTMENTS_STORAGE[$var_name]) ? $WIZORS_INVESTMENTS_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($WIZORS_INVESTMENTS_STORAGE[$var_name]) ? $WIZORS_INVESTMENTS_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('wizors_investments_storage_get_obj_property')) {
	function wizors_investments_storage_get_obj_property($var_name, $prop, $default='') {
		global $WIZORS_INVESTMENTS_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($WIZORS_INVESTMENTS_STORAGE[$var_name]->$prop) ? $WIZORS_INVESTMENTS_STORAGE[$var_name]->$prop : $default;
	}
}
?>