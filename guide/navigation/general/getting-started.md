# Getting started

Short introduction to the usage of the navigation builder.

## Instantiate navigation

To create a new navigation use the factory:

    $navigation = Navigation::instance($navigation_name);

Once created, the navigation instance can be retrieved throughout Kohana using
the given `$navigation_name`.

## Add items

For adding items of specific driver use add():

    $navigation->add('alias', 'driver')

## Delete items

Delete items useing delete():

    $navigation->delete('alias', 'driver')

## Accessing items of menu

    $navigation->items['alias']

## Basic item driver

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
* `uri`: The uri of the item.
* `label`: The title of the item.

Optional parameters:
* `order`: The order position of the item (beginning with 0).
* `attributes`: an array of html attributes (e.g. class, id, style ...).

## Set breadcrumbs for your users

The user likes it to know where he is. So highlight the menu items representing his current position.
This is made simple with the module's breadcrumb system:

    /* In your controller/action. */
    public function action_about() {
        Navigation::instance($navigation_name)->breadcrumb('about');
    }

The breadcrumb() method will set a breadcrumb in the menu.
Meaning for the item driver: The <li> tag will be rendered with the class 'active' allowing the styling to hightlight the current active item in menu.

## Creating submenus

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

## Displaying the navigation

To display the navigation within the used tempalte or view, use:

    <?php echo Navigation::instance($navigation_name)->render($theme_name); ?>

Here, `$theme_name` would be one of the provided themes, e.g. `bootstrap3/pills` or
`bootstrap3/pills_stacked`.