<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Driver for normal menu item.
 *
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2013 - 2014 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
class Kohana_Navigation_Driver_Item extends Navigation_Driver implements Navigation_Breadcrumb {

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
    public function breadcrumb($alias) {
        $this->breadcrumb = TRUE;

        return $this;
    }

}
