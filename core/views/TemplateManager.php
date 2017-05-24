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
           	
			// Check if tag value is an array as in the case of list
			if ( !is_array( $data)) {
			// replace the content	    	
		    	$newContent = str_replace( '{' . $tag . '}', $data, $this->page->getContent() );

		    	// update the pages content
		    	$this->page->setContent( $newContent );
	    } else {
		        foreach( $data as $f => $v) {
				    $newContent = str_replace( '{' . $f . '}', $v, $this->page->getContent() );
					// update the pages content
		    	    $this->page->setContent( $newContent );
                }
		    }
	}
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