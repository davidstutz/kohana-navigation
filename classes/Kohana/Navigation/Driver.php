<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Abstract class driver.
 *
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2013 - 2014 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
abstract class Kohana_Navigation_Driver {

    /**
     * @var	string	used view
     */
    protected $_view = '';

    /**
     * @var	array 	options
     */
    protected $_options = array();

    /**
     * Constructor getting driver options.
     *
     * @param	array 	options
     */
    public function __construct($options) {
        $this->_options = $options;
    }

    /**
     * Get method to get a value of options.
     *
     * @param	string	key
     * @return	mixed	value
     */
    public function __get($key) {
        if (isset($this->_options[$key])) {
            return $this->_options[$key];
        }
        else {
            return NULL;
        }
    }

    /**
     * toString emthod.
     *
     * @return	string	rendered
     */
    public function __toString() {
        return $this->render();
    }

    /**
     * Render function using the drivers view to render.
     *
     * @return	string	rendered
     */
    public function render() {
        return View::factory('navigation/' . Kohana::$config->load('navigation.theme') . '/driver/' . $this->_view, array('item' => $this))->render();
    }

    /**
     * Get attributes.
     *
     * @return	array 	attributes
     */
    public function attributes($array = FALSE) {
        if (FALSE === $array) {
            if (isset($this->_options['attributes'])) {
                return $this->_options['attributes'];
            }
            else {
                return array();
            }
        }
        else {
            $this->_options['attributes'] = $array;
            return $this;
        }
    }

}
