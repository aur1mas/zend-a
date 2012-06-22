<?php
/**
 * test form element email functionality
 *
 * @package ZendA_Form
 * @author aur1mas <aurimas@devnet.lt>
 */
require_once 'ZendA/Form/Element/Email.php';
class ZendA_Form_Element_EmailTest extends PHPUnit_Framework_TestCase
{
    
    protected $_element;
    
    public function setUp()
    {
        $this->_element = new ZendA_Form_Element_Email('email');
    }
    
    /**
     * tests does valdiators works correctly
     *
     * @return void
     * @author aur1mas <aurimas@devnet.lt>
     */
    public function testIsValidating()
    {
        $notValidValues = array('a', 'a@', 'a@.lt', '@gmail.com');
        foreach ($notValidValues as $value) {
            $this->assertFalse($this->_element->isValid($value));
        }

        $this->assertTrue($this->_element->isValid('aurimas@devnet.lt'));
    }
}