<?php
/**
*  tests if filter working correctly
*/
require_once 'ZendA/Filter/Url/Scheme.php';
class ZendA_Filter_Url_SchemeTest extends PHPUnit_Framework_TestCase
{

    /**
     * tests if filter is working
     *
     * @return void
     * @author aur1mas <aurimas@devnet.lt>
     **/
    public function testIsStrippingCorrectly()
    {
        $filter = new ZendA_Filter_Url_Scheme();

        $this->assertSame('www.google.lt', $filter->filter("http://www.google.lt"));
        $this->assertSame('www.google.lt', $filter->filter("https://www.google.lt"));
        $this->assertSame('www.google.lt/search?query=abr', $filter->filter("http://www.google.lt/search?query=abr"));
    }
}