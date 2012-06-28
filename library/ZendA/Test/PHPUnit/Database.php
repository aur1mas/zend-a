<?php
/**
 * test cases using DB
 *
 * @package ZendA
 * @author aur1mas <aurimas@devnet.lt>
 */
class ZendA_Test_PHPUnit_Database extends ZPHPUnit_Extensions_Database_TestCase
{

    /**
     * db host
     *
     * @var string
     **/
    protected $_host;

    /**
     * DB name
     *
     * @var string
     **/
    protected $_dbName;

    /**
     * DB user
     *
     * @var string
     **/
    protected $_user;

    /**
     * DB user password
     *
     * @var string
     **/
    protected $_pass;
    
    /**
     * PDO instance
     *
     * @var PDO
     */
    protected $_pdo;
    
    public function getConnection()
    {
        $this->_getPdo()->exec("set foreign_key_checks=0");
        return $this->createDefaultDBConnection($this->_getPdo());
    }
    
    public function getDataSet()
    {
        return $this->createXMLDataSet('data.xml');
    }
    
    /**
     * initialized before each test
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setUp()
    {
        $this->_getPdo()->exec("set foreign_key_checks=1");
        
        parent::setUp();
    }
    
    /**
     * returns PDO object
     *
     * @return PDO
     * @author aur1mas <aur1mas@devnet.lt>
     */
    protected function _getPdo()
    {
        if (!$this->_pdo instanceof PDO) {
            $this->_pdo = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_dbName . ';charset=utf8', $this->_user, $this->_pass);
        }
        
        return $this->_pdo;
    }
}