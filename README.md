Provides advance search capability to Symfony2 projects.

Installation
============

Requires Zend 2.x Zend/Search/Lucene
You can get it here http://github.com/zendframework/zf2

**Add SearchBundle to your application kernel:**

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Lidaa\SearchBundle\LidaaSearchBundle(),
            // ...
        );
    }

**Add the 'Lidaa' namespace to your autoloader:**

    // app/autoload.php
    $loader->registerNamespaces(array(
        //...
        'Lidaa' => __DIR__.'/../vendor/bundles',
        //...
    ));


Configuration
=============

Here is a yaml example

	# Search Configuration
	lidaa_search:
		analyzer: Zend\Search\Lucene\Analysis\Analyzer\Common\Text\CaseInsensitive
		path:     %kernel.root_dir%/cache/%kernel.environment%/lucene/index
		doc_type: DOC # { DOC, HTML, PPT, DOCX, ...}


Example
=======

**To add to the search:**

	$lucene_search = $this->get('lucene.search');
	$index = $lucene_search->getIndex();
	$articlesData =  array 
	(
			0 => array( 
			"url"  => "http://ganeshhs.com/url-1",
			"title"      => "Google suggest : pick right search keyword",
			"contents"   => "Picking the right keywords for the websites is the success of search engine marketing ...",
			"category"       => "Google",
			"postedDateTime" => "2007-12-26 12:20:00",  
			"articleId"                  => 1),  
	   
	 		1 => array( 
			"url"           => "http://ganeshhs.com/url-2",
			"title"      => "zend framework tutorial | part 9 Zend Auth",
			"contents"   => "Zend Auth is easy to set up and provides a system that secures our site with an ...",
			"category"       => "zend-framework",   
			"postedDateTime" => "2007-12-26 12:20:00",  
			"articleId"      => 2)
	);
	foreach($articlesData as $articleData)
	{  
		$doc = $lucene_search->getDocument();  

		$doc->addField($lucene_search->getField('Keyword', array('url',  $articleData["url"])));
		$doc->addField($lucene_search->getField('UnIndexed', array('articleId',  $articleData["articleId"])));
		$doc->addField($lucene_search->getField('UnIndexed', array('postedDateTime',  $articleData["postedDateTime"])));
		$doc->addField($lucene_search->getField('Text', array('title',  $articleData["title"])));
		$doc->addField($lucene_search->getField('UnStored', array('contents',  $articleData["contents"])));
		$doc->addField($lucene_search->getField('Text', array('category',  $articleData["category"]))); 
		$index->addDocument($doc);
	}
	$index->commit();

**To retrieve a query:**

	$query = 'zend';
	$results = $index->find($query);
	if(empty($results)){
		echo 'empty';
	}else{		
		foreach($results as $result){
			echo $result->url;
		}
	}
  
See the Zend documentation for more information.

TODO
=======
	- Incorporate the possibility of changing the type of document
	- Activate the "analyzer"
