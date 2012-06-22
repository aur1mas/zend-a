<?php

ini_set('memory_limit', "512M");

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(realpath('../library'), get_include_path())));

require_once 'Zend/Application/Module/Autoloader.php';
$autoloader = new Zend_Application_Module_Autoloader(array(
	'namespace' => '',
	'basePath' => dirname(__FILE__)
));
