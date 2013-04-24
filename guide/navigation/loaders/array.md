# Loaders

## Array

	$array = array(
		'home' => array(
			'title' => 'Home',
			'uri' => 'main/home',
		),
		'about' => array(
			'title' => 'About',
			'uri' => 'main/about',
		),
	);
	$navigation->load('array', $array);