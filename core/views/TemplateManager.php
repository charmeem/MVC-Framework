<?php
/**
 * Tamplate Manager
 *
 * Class to handle Views by rendering Markup file using Template Tags
 *
 * @package    viewManager
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class TemplateManager
{

private $page;

public function __construct ($registry)
{
    $this->registry = $registry;
    require_once APP_PATH . '/core/views/Page.php' ;
	$this->page = new page();
}
/**
 * get the page object
 */
public function getPage()
{
    return $this->page;
} 

/**
* Replace tags in our page with content
* @return void
*/
private function replaceTags( )
{
    // get the tags in the page
    $tags = $this->page->getTags();
	
    // foreach record relating to the query...
		foreach( $tags as $tag => $data ) {
           	// replace the content	    	
		    	$newContent = str_replace( '{' . $tag . '}', $data, $this->page->getContent() );

		    	// update the pages content
		    	$this->page->setContent( $newContent );
	}
	}

	
/**
     * Replace content on the page with data from the database
     * @param String $tag the tag defining the area of content
     * @param int $cacheId the queries ID in the query cache
     * @return void
     */
    private function replaceDBTags( $tag, $cacheId )
    {
	    $block = '';
		$blockOld = $this->page->getBlock( $tag );
		
		// foreach record relating to the query...
		while ($tags = $this->registry->getObject('mysqlidb')->resultsFromCache( $cacheId ) )
		{
			$blockNew = $blockOld;
			// create a new block of content with the results replaced into it
			foreach ($tags as $ntag => $data) 
	       	{
	        	$blockNew = str_replace("{" . $ntag . "}", $data, $blockNew); 
	        }
	        $block .= $blockNew;
		}
		$pageContent = $this->page->getContent();
		// remove the seperator in the template, cleaner HTML
		$newContent = str_replace( '<!-- START ' . $tag . ' -->' . $blockOld . '<!-- END ' . $tag . ' -->', $block, $pageContent );
		// update the page content
		$this->page->setContent( $newContent );
	}
    
/**
 * Set the content of the page based on a number of templates
 * pass template file locations as individual arguments
 * @return void
 */
public function buildFromTemplates()
{
    $bits = func_get_args();
    $content = "";
    foreach( $bits as $bit) {
	
    $content .= file_get_contents($bit);

	}
    $this->page->setContent($content);    
}

/**
 * Parse the page object into some output
 * @return void
 */
public function parseOutput()
{
    $this->replaceTags();
}
    
        	   
}