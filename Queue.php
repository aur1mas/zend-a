<?php
/**
 * @author aur1mas <aur1mas@devnet.lt>
 * @package Queue
 */
class Core_Queue {

	/**
	 * queue types
	 * @var array
	 */
	protected static $queues = array();
	
	/**
	 * queue instance
	 * @var Zend_Queue
	 */
	protected static $instance;
	
	/**
	 * queue config array
	 * @var array
	 */
	protected static $config = array();
	
	/**
	 * returns queue config
	 * @return array
	 */
	protected static function getConfig()
    {
		if (count(self::$config) === 0) {
			$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
			self::$config = $config->queue;
		}

		return self::$config;
	}
	
	/**
	 * returns (creates) queue instance (implements singleton)
	 * @return Zend_Queue
	 */
	public function getInstance()
    {
		if (!self::$instance instanceof Zend_Queue) {
			$config = self::getConfig();
			
			self::$instance = new Zend_Queue('Db', array(
				'driverOptions' => array(
					'host' => $config->host,
					'port' => $config->port,
					'username' => $config->username,
					'password' => $config->password,
					'dbname' => $config->dbname,
					'type' => $config->type),
				'options' => array(
					Zend_Db_Select::FOR_UPDATE => true)));
		}
		
		return self::$instance;
	}
	
	/**
	 * adds message to queue
	 * @param string $queue_type
	 * @param mixed $message
	 * @throws Exception
	 */
	public static function sendMessage($queue_type, $message)
    {
		if (!in_array($queue_type, self::$queues))
			throw new Exception('Wrong queue type provided');
		
		$queue = (self::getInstance()->getAdapter()->isExists($queue_type)) ?
			self::getInstance()->setOption('name', $queue_type) : self::getInstance()->createQueue($queue_type);

		$queue->send($message);
	}
}