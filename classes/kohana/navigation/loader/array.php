<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Array loader.
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
class Kohana_Navigation_Loader_Array extends Kohana_Navigation_Loader
{
	
	/** 
	 * Implement load method.
	 * 
	 * @throws	Navigation_exception
	 * @param	array 	params
	 * @return	array 	items
	 */
	public function load($params)
	{
		if (!is_array($params))
			throw new Navigation_Exception('Navigation: Config_Loader, invalid configuration type loaded.');
			
		return $params;
	}
}
