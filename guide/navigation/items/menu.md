# Navigation

## Items

### Menu

The menu driver is used to create subemnus.
The items of the submenu are specified by the 'items' key:

	'submenu' => array(
		'driver' => 'menu',
		'items' => array(
			'item' => array(
				'driver' => 'item',
				'title' => 'Title',
				'uri' => 'uri',
			),
		),
	),

Accessing the items of a submenu is done like accessing items of the root:

	$navigation->items['submenu']->items['alias']
