# Navigation

## General

### Getting started

Short introduction to the usage of the navigation builder.

#### Instantiate navigation

To create a new navigation use the factory:

	$navigation = Navigation::factory();


#### Add items

For adding items of specific driver use add():

	$navigation->add('alias', 'driver')

#### Delete items

Delete items useing delete():

	$navigation->delete('alias', 'driver')

### Accessing items of menu

	$navigation->items['alias']

#### Basic item driver

For adding a normal menu item use the item driver:

	$options = array(
		'uri' => 'home/index',
		'title' => 'Home',
		'attributes' => array(
			'class' => 'highlight',
		),
	);
	$navigation->add('alias', 'item', $options);

The item driver is based on the following options:
* 'uri': The uri of the item.
* 'title': The title of the item.

Optional parameters:
* 'order': The order position of the item (beginning with 0).
* 'attributes': an array of html attributes (e.g. class, id, style ...).

#### Set breadcrumbs for your users

The user likes it to know where he is. So highlight the menu items representing his current position.
This is made simple with the module's breadcrumb system:

	/* The menu is loaded or built... */
	$this->tempalte->navigation->add('about', 'item', $options);
	// ...
	/* Now in your controller/action. */
	public function action_about()
	{
		/* Load your view etc... */
		$this->template->navigation->breadcrumb('about');
	}

The breadcrumb() method will set a breadcrumb in the menu.
Meaning for the item driver: The <li> tag will be rendered with the class 'active' allowing the styling to hightlight the current active item in menu.

#### Creating submenus

This example will add a submenu with the alias 'contact' with the three given items.

	$array = array(
		'items' => array(
			'facebook' => array(
				'title' => 'Facebook',
				'uri' => 'contact/facebook',
			),
			'twitter' => array(
				'title' => 'Twitter',
				'uri' => 'contact/twitter',
			),
			'email' => array(
				'title' => 'E-Mail',
				'uri' => 'contact/email',
			),
		),
	);
	$navigation->add('contact', 'menu', $array);


Accessing the submenu:

	$options = array(
		'title' => 'Google+',
		'uri' => 'contact/googleplus',
	);
	$navigation->items['contact']->add('googleplus', 'item', $options);
