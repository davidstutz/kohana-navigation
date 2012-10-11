<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Factory for the menu class
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
class Kohana_Navigation
{
	/**
	 * Create new navigation.
	 * 
	 * @param	string	alias
	 * @return	object	menu
	 */
	public static function factory()
	{
		$menu = new Kohana_Navigation_Driver_Menu(array('items' => array()));
		$menu->set_root();
		
		return $menu;
	}
	
	/**
	 * Will return class for requested element.
	 * 
	 * @param	string	element
	 * @return	string	class
	 */
	public static function classes($string)
	{
		$classes = Kohana::$config->load('navigation.classes');

		return $classes[$string];
	}
}
