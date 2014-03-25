<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Abstract class for loader implementation.
 *
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2013 - 2014 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
abstract class Kohana_Navigation_Loader {

    /**
     * Loads the navigation.
     *
     * @param	array 	params
     */
    abstract public function load($params);
}
