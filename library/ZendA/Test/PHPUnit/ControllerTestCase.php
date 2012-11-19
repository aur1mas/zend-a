<?php
/**
 * @package ZendA
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ZendA_Test_PHPUnit_ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{

	protected $application;

	protected $_directoryStructure = 'modules';

	protected function setUp()
	{    
		$this->bootstrap = array($this, 'appBootstrap');
		parent::setUp();
	}

	public function appBootstrap() {
		$this->application = new Zend_Application(
			APPLICATION_ENV,
			APPLICATION_PATH . '/configs/application.ini'
		);

		if ($this->_directoryStructure === 'modules') {
			$this->_frontController->addModuleDirectory(APPLICATION_PATH . "/modules");
			$this->_frontController->setDefaultControllerName('index')
			    ->setDefaultAction('index')
			    ->setDefaultModule('default');
		} else {
			$this->_frontController->setControllerDirectory(APPLICATION_PATH . '/controllers/');
		}
		
		Zend_Controller_Action_HelperBroker::addHelper(new Zend_Layout_Controller_Action_Helper_Layout);
	}
}