<?php 

namespace Lidaa\SearchBundle;

use Zend\Search\Lucene\Lucene;
use Zend\Search\Lucene\Document;

class LucenSearch 
{

    private $index;
    private $document;
    private $analyzer;    

	/**
	* 
	*/
	public function __construct($analyzer, $index_path, $doc_type)
	{
        if (file_exists($index_path)) {
            $this->index = Lucene::open($index_path);
        } else {
            $this->index = Lucene::create($index_path);
        }
        
        $this->analyzer = $analyzer; 
        $this->document = new Document();

	}
	
	/**
	* 
	*/
	public function getIndex()
	{
		return $this->index;
	}
	
	/**
	* 
	*/
	public function getDocument($doc_type = null)
	{
		return $this->document;
	}
	
	/**
	* 
	*/
	public function getAnalyzer()
	{
		return $this->analyzer;
	}
	
	/**
	* 
	*/
	public function getField($type, array $options)
	{
		return call_user_func_array("\Zend\Search\Lucene\Document\Field::$type", $options);
	}
}
