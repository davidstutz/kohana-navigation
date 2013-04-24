<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class representing a menu.
 * 
 * A Menu can be filled with different items, specified by their drivers.
 * 
 * @package		Navigation
 * @author		David Stutz
 * @copyright	(c) 2012 David Stutz
 * @license		http://opensource.org/licenses/bsd-3-clause
 */
class Kohana_Navigation_Driver_Menu extends Navigation_Driver implements Kohana_Navigation_Breadcrumb
{
	
	/**
	 * Used view.
	 */
	protected $_view = 'menu';
	
	/**
	 * Define whetehr root.
	 */
	protected $_root = FALSE;
	
	/**
	 * Counter for items.
	 */
	protected $_counter = 0;
	
	/**
	 * Overload __construct.
	 * 
	 * @param <array> options
	 */
	public function __construct($options)
	{
		parent::__construct($options);
		
		if (!isset($this->_options['items']))
		{
			$this->_options['items'] = array();
		}
		
		$items = $this->_options['items'];
		unset($this->_options['items']);
		
		$this->load('array', $items);
	}
	
	/**
	 * Loads items using the given loader.
	 * 
	 * @param <string> loader
	 * @param <mixed> params
	 * 
	 * @return <object> current menu
	 */
	public function load($loader, $params)
	{
		/* Define loader class. */
		$loader = 'Navigation_Loader_' . ucfirst($loader);
		
		if (class_exists($loader))
		{
			/* Get loader. */
			$object = new $loader();
			$array = $object->load($params);
			
			/* Go through all items. */
			foreach ($array as $alias => $options)
			{
				/* Only add when driver is specified, */
				if (!isset($options['driver']))
				{
					/* Set default item driver. */
					$options['driver'] = 'item';
				}
				
				/* Add item. */
				$this->add($alias, $options['driver'], $options);
			}
		}
		
		return $this;
	}
	
	/**
	 * Sets menu to root.
	 * 
	 * @return <object> this
	 */
	public function set_root()
	{
		$this->_root = TRUE;
		
		return $this;
	}
	
	/**
	 * Getter for root.
	 * 
	 * @return <boolean> root
	 */
	public function root()
	{
		return $this->_root;
	}
	
	/**
	 * Add item of given driver and alias to menu.
	 * 
	 * @param <string> alias
	 * @param <string> driver
	 * @param <array> [optional] options
	 * 
	 * @return <object> this
	 */
	public function add($alias, $driver, $options = array())
	{
		if (isset($this->_options['items']) AND FALSE !== array_key_exists($alias, $this->_options['items']))
			throw new Navigation_Exception('Navigation: Item with added alias already exists:' . $alias . '.');
		
		/* Get driver object. */
		$driver = 'Navigation_Driver_' . ucfirst($driver);
		
		if (!class_exists($driver))
			throw new Navigation_Exception('Navigation: Driver ' . $driver . ' not found.');
		
		if (!isset($options['order']))
		{
			$options['order'] = ++$this->_counter;
		}
		
		/* Driver exists? */
		if (class_exists($driver))
		{
			$this->_options['items'][$alias] = new $driver($options);
		}
		
		return $this;
	}
	
	/**
	 * Delete item in this menu.
	 * 
	 * @param <string> alias
	 * @return <obejct> this
	 */
	public function delete($alias)
	{
		if (isset($this->_options['items'][$alias]))
		{
			unset($this->_options['items'][$alias]);
		}
		
		return $this;
	}
	
	/**
	 * Implements breadcrumb.
	 * 
	 * @param <string> alias
	 * @return <object this
	 */
	public function breadcrumb($alias)
	{
		/* Search for alias. */
		foreach ($this->_options['items'] as $key => $item)
		{
			if ($alias == $key AND $item instanceof Navigation_Breadcrumb)
			{
				$item->breadcrumb($alias);
			}
			/* Got into depth for submenus. */
			elseif($item instanceof Navigation_Driver_Menu)
			{
				$item->breadcrumb($alias);
			}
		}
		
		return $this;
	}
	
	/**
	 * Render function using the drivers view to render.
	 * 
	 * @return <string> rendered
	 */
	public function render()
	{
		if (!function_exists('items_cmp'))
		{
			/**
			 * Method for comparison of two menu items using the order options.
			 * 
			 * @param <object> a
			 * @param <object> b
			 * @return <int> result
			 */
			function items_cmp($a, $b)
			{
				if ($a->order == -1)
				{
					return 1;
				}
				if ($a->order == $b->order)
				{
					return 0;
				}
				else
				{
					return $a->order < $b->order ? -1 : 1;
				}
			}
		}
		
		/* Sort items using custom mehtod. */
		uasort($this->_options['items'], 'items_cmp');
		
		return View::factory('navigation/driver/' . $this->_view, array('item' => $this))->render();
	}
}
