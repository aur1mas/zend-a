ZendA - is ZendAddons library which completes missing Zend Framework functionality.

Version: 0.4.4
==============

Instaliation
============

1. Through http://getcomposer.org. In your composer.json file add:

	"aur1mas/zend-a": "dev-master"

1.1 Update your Composer libs

	php composer.phar update

3. In your application.ini file add:

	autoloaderNamespaces[] = "ZendA"

4. And in your Bootstrap.php file:

	$view->addHelperPath('ZendA/View/Helper/', 'ZendA_View_Helper');

Tests
=====

To run tests you must add Zend directory. I do this by adding symbolic link for example: 

	ln -s /Users/user/Sites/htdocs/Zend/Current/ Zend

Issues
======

Use github.com issue tracker to report problems & feature requests. All pull requests must be covered by tests.