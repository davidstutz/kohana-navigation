<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Abstract class for breadcrumbs.
 *
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2013 - 2014 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
interface Kohana_Navigation_Breadcrumb {

    /**
     * Breadcrumb this item.
     *
     * @param	string	alias
     * @return	object	this
     */
    public function breadcrumb($alias);
}
