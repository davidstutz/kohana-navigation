<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Abstract class for breadcrumbs.
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
interface Kohana_Navigation_Breadcrumb
{
	
	/**
	 * Breadcrumb this item.
	 * 
	 * @param	string	alias
	 * @return	object	this
	 */
	public function breadcrumb($alias);
}
