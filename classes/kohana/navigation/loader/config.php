<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Config loader.
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
class Kohana_Navigation_Loader_Config extends Kohana_Navigation_Loader
{
	
	/** 
	 * Implement load method.
	 * 
	 * @throws	Navigation_Exception
	 * @param	array 	params
	 * @return	array 	items
	 */
	public function load($params)
	{
		$array = Kohana::$config->load($params);
		
		if (!is_array($array))
			throw new Navigation_Exception('Navigation: Config_Loader, invalid configuration type loaded.');
			
		return $array;
	}
}
