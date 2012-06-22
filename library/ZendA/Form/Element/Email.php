<?php
/**
 * ZendA form element Email
 *
 * @package ZendA
 * @author aur1mas <aurimas@devnet.lt>
 */
class ZendA_Form_Element_Email extends Zend_Form_Element
{
    
    /**
     * Default form view helper to use for rendering
     * @var string
     */
    public $helper = 'formEmail';
    
    /**
     * constructs email element
     *
     * @param string $spec 
     * @param string $options 
     * @author aur1mas <aurimas@devnet.lt>
     */
    public function __construct($spec, $options = null)
    {
        parent::__construct($spec, $options);
        
        $this->addValidator(new Zend_Validate_EmailAddress());
    }
}