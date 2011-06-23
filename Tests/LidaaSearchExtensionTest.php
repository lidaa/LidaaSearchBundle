<?php 

namespace Lidaa\SearchBundle\Tests;

use Lidaa\SearchBundle\DependencyInjection\LidaaSearchExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class LidaaSearchExtensionTest extends \PHPUnit_Framework_TestCase
{

    private $container;
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->loader = new LidaaSearchExtension();
    }

    public function testConfigLoad()
    {
        $this->loader->load(array(array('analyzer' => 'null', 'path' => 'null', 'doc_type' => 'null')), $this->container);
        $this->assertEquals('Lidaa\\SearchBundle\\LucenSearch', $this->container->getParameter('lucene.search.class'));
    }
    
}
