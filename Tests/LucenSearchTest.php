<?php 

namespace Lidaa\SearchBundle\Tests;

use Lidaa\SearchBundle\LucenSearch;

class LucenSearchTest extends \PHPUnit_Framework_TestCase
{
    public function testGetIndex()
    {
    	$lucen_search = new LucenSearch(null, "./app/cache/test/index", null);
        $this->assertInstanceOf('Zend\Search\Lucene\Index', $lucen_search->getIndex());
    }
    
    public function testGetDocument()
    {
    	$lucen_search = new LucenSearch(null, "./app/cache/test/index", null);
        $this->assertInstanceOf('Zend\Search\Lucene\Document', $lucen_search->getDocument());
    }
    
}
