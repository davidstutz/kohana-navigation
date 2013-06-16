<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Factory for the menu class
 *
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2013 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
class Kohana_Navigation {

    protected static $instances = array();
    
    /**
     * Create new navigation.
     *
     * @param	string	alias
     * @return	object	menu
     */
    public static function instance($name) {
        if (!isset(Navigation::$instances[$name])) {
            
            $menu = new Kohana_Navigation_Driver_Menu( array('items' => array()));
            $menu->set_root();
            
            Navigation::$instances[$name] = $menu;
        }
        
        return Navigation::$instances[$name];
    }

    /**
     * Will return class for requested element.
     *
     * @param	string	element
     * @return	string	class
     */
    public static function classes($string) {
        $classes = Kohana::$config->load('navigation.classes');

        return $classes[$string];
    }

}
