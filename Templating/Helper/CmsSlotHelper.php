<?php

namespace Elao\CmsSlotBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;

use Elao\CmsSlotBundle\CmsSlot\CmsSlotManager;

/**
 * 
 * @author Vyacheslav Salakhutdinov <salakhutdinov@experium.ru>
 */
class CmsSlotHelper extends Helper
{
   /**
    *
    * @var EngineInterface
    */
   protected $engine;
   
   /**
    *
    * @var RouterInterface
    */
   protected $slotManager;

   /**
    * Constructor
    * 
    * @param EngineInterface $engine The template engine service
    * @param RouterInterface $router The router service
    */
   public function __construct(EngineInterface $engine, CmsSlotManager $slotManager)
   {
      $this->engine = $engine;
      
      $this->slotManager = $slotManager;
   }

    public function getSlotManager() {
        return $this->slotManager;
    }
   
    public function renderCmsSlot($slotType, $slotName, $parameters = array ()) {
        
        // Slot Type
        $slotType  = $this->getSlotManager()->getSlotType($slotType);
        $slotName  = $this->getSlotManager()->formatSlotName($slotName);
        $editMode  = 1 || $this->getSlotManager()->isEditMode();
        
        if (!$slotType){
            throw new Exception("The slotType $slotType is not found");
        }
        
        // Slot object
        $slot      = $this->getSlotManager()->getSlot($slotName);
        
        // Je suis en mode édition
        if ($editMode){
            $template   = $slotType->getTemplateEdit();
            $parameters = $slotType->getTemplateEditParameters($slot, $parameters);
        }else{
            $template   = $slotType->getTemplateDisplay();
            $parameters = $slotType->getTemplateDisplayParameters($slot, $parameters);
        }
        return $this->engine->render($template, $parameters);
    }
   
   public function getName()
   {
      'cms_slot';
   }

}