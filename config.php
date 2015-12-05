<?php
/**
@
@
 */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'https://webappdev-nasirahamed-1.c9users.io');
define( 'DB_HOST', getenv('172.17.11.172') );
define( 'DB_USERNAME', 'nasirahamed');
define( 'DB_PASSWORD', 'k4a8j2');
define( 'DB_NAME', 'project');



define( 'CURRENT_YEAR', date("Y"));

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}

