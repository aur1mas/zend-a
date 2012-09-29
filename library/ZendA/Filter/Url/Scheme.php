<?php
/**
*   strips out URL scheme from url
*/
class ZendA_Filter_Url_Scheme implements Zend_Filter_Interface
{

    /**
     * fitlers value
     *
     * @return string
     * @author aur1mas <aurimas@devnet.lt>
     **/
    public function filter($value)
    {
        return str_replace(array("http://", "https://"), "", (string)$value);;
    }
}