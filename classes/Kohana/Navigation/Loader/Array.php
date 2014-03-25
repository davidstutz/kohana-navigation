<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Array loader.
 *
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2013 - 2014 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
class Kohana_Navigation_Loader_Array extends Kohana_Navigation_Loader {

    /**
     * Implement load method.
     *
     * @throws	Navigation_exception
     * @param	array 	params
     * @return	array 	items
     */
    public function load($params) {
        if (!is_array($params))
            throw new Navigation_Exception('Navigation: Config_Loader, invalid configuration type loaded.');

        return $params;
    }

}
