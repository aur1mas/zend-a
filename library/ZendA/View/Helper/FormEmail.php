<?php
/**
 * form element email
 *
 * @package ZendA
 * @author aur1mas <aurimas@devnet.lt>
 */
class ZendA_View_Helper_FormEmail extends Zend_View_Helper_FormElement
{

    /**
     * generates 'email' element
     *
     * @param string $name 
     * @param string $value 
     * @param string $attribs 
     * @return string
     * @author aur1mas <aurimas@devnet.lt>
     */
    public function formEmail($name, $value = null, $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable

        // build the element
        $disabled = '';
        if ($disable) {
            // disabled
            $disabled = ' disabled="disabled"';
        }

        // XHTML or HTML end tag?
        $endTag = ' />';
        if (($this->view instanceof Zend_View_Abstract) && !$this->view->doctype()->isXhtml()) {
            $endTag= '>';
        }

        $xhtml = '<input type="email"'
                . ' name="' . $this->view->escape($name) . '"'
                . ' id="' . $this->view->escape($id) . '"'
                . ' value="' . $this->view->escape($value) . '"'
                . $disabled
                . $this->_htmlAttribs($attribs)
                . $endTag;

        return $xhtml;
    }
}
