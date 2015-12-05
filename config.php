<?php
/**
@
@
 */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'https://webappdev-nasirahamed-1.c9users.io');
define( 'DB_HOST', 'nasirahamed-webappdev-2213413' );
define( 'DB_USERNAME', 'nasirahamed@%');
define( 'DB_PASSWORD', 'k4a8j2');
define( 'DB_NAME', 'c9');



define( 'CURRENT_YEAR', date("Y"));

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}

