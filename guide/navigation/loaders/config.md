# Loaders

## Config

    $navigation->load('config', 'navigation.main');

Configuration file config/navigation.php:

    return array(
        /* Main navigation. */
        'main' => array(
            'home' => array(
                'title' => 'Home',
                'uri' => 'main/home',
            ),
            'about' => array(
                'title' => 'About',
                'uri' => 'main/about',
            ),
        ),
    );
