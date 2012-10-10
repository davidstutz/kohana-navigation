<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Driver for normal menu item.
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://www.gnu.org/licenses/gpl-3.0
 */
class Kohana_Navigation_Driver_Item extends Navigation_Driver implements Kohana_Navigation_Breadcrumb
{
	
	/**
	 * @var	string	used view
	 */
	protected $_view = 'item';
	
	/**
	 * @var	boolean	breadcrumb
	 */
	public $breadcrumb = FALSE;
	
	/**
	 * Implements breadcrumb.
	 * 
	 * @param	string	alias
	 * @return	object	this
	 */
	public function breadcrumb($alias)
	{
		$this->breadcrumb = TRUE;
		
		return $this;
	}
}
