<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Abstract class for loader implementation.
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
abstract class Kohana_Navigation_Loader
{
	
	/**
	 * Loads the navigation.
	 * 
	 * @param	array 	params
	 */
	abstract public function load($params);
}
