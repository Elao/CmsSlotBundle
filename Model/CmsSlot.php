<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\Model;

abstract class CmsSlot
{
    /**
     * @var string
     */
    protected $code;
   
    /**
     * @var array
     */
    protected $content;

    
    public function __construct(){
        
        $this->code    = '';
        $this->content = array();
    }
    
    public function getCode(){
        
    	return $this->code;
    }
    
    public function setCode($code){
        
    	$this->code = $code;
    }
    
    public function getContent(){
        
    	return $this->content;
    }
    
    public function setContent(array $content){
        
    	$this->content = $content;
    }
	
}