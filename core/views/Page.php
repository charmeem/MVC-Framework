<?php

/**
 * Page object for our template manager
 *
 * @author Mubashir Mufti
 * @version 1.0
 */
class Page {

//template tags
private $tags = array();

//page contents
private $content = "";

/**
 * Create our page object
 */
function __construct() { }
    
/**
 * Add a template tag, and its replacement value/data to the page
 * @param String $key the key to store within the tags array
 * @param String $data the replacement data (may also be an array)
 * @return void
 */
    
public function addTag($key, $data)
{
    $this->tags[$key] = $data;
}

/**
 * Set the page content
 * @param $content the page content
 * @return void
 */
public function setContent($content)
{
    $this->content = $content;
}

/**
     * Gets a chunk of page content
     * @param String the tag wrapping the block ( <!-- START tag --> block <!-- END tag --> )
     * @return String the block of content
     */
    public function getBlock( $tag )
    {
		preg_match ('#<!-- START '. $tag . ' -->(.+?)<!-- END '. $tag . ' -->#si', $this->content, $tor);
		
		$tor = str_replace ('<!-- START '. $tag . ' -->', "", $tor);
		$tor = str_replace ('<!-- END '  . $tag . ' -->', "", $tor);
		
		return $tor;
    }
    
/**
 * Get tags associated with the page
 * @return void
 */
public function getTags()
{
   return $this->tags;
}
    
/**
 * get the page content
 * @return $content
 */
public function getContent()
{
    return $this->content;
}

}
