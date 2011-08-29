<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\CmsSlot;

use Elao\CmsSlotBundle\CmsSlot\Type\CmsSlotTypeInterface;
use Elao\CmsSlotBundle\CmsSlot\Provider\CmsSlotProviderInterface;
use Elao\CmsSlotBundle\Model\CmsSlot;

use Symfony\Component\Security\Acl\Voter\FieldVote;
use Symfony\Component\Security\Core\SecurityContextInterface;

use Symfony\Component\Translation\TranslatorInterface;

class CmsSlotManager {

    protected $types;
    protected $slotProvider = array();
    protected $securityContext = null;
    protected $translator      = null;
    
    protected $permission = false;
    protected $useI18n    = false;
    
    public function __construct(SecurityContextInterface $securityContext, TranslatorInterface $translator, $options = array()) {
        
        $this->securityContext = $securityContext;
        $this->translator      = $translator;
        
        $this->useI18n    = isset($options['i18n']) && $options['i18n'];
        $this->permission = $options['permission'];
        $this->types      = array ();
    }
    
    public function getSlotProvider($slotType){
        //var_dump($slotType->getName(), $this->slotProvider);die();
        return $this->slotProvider[$slotType->getName()];
    }
    
    public function setSlotProvider($type, CmsSlotProviderInterface $slotProvider){
        $this->slotProvider[$type] = $slotProvider;
    }
    
    public function getUseI18n(){
        
        return ($this->translator !== null) && $this->useI18n;
    }
    
    public function getPermission(){
        
        return $this->permission;
    }
    
    
    public function formatSlotName($name, $parameters = array()){
        $suffix = false;
        
        if (isset($parameters['i18n'])){
            $suffix = $parameters['i18n'];
        }elseif ($this->getUseI18n()){
            $suffix = true;
        }
        
        $suffix = $suffix && ($this->translator !== null);
        
        if ($suffix){
            $culture   = $this->translator->getLocale();
            $name     .= '_'.$culture;
        }
        return $name;
    }
    
    public function isEditMode(){
        if (null === $this->securityContext) {
            return false;
        }

        return $this->securityContext->isGranted($this->getPermission());
    }
    
    public function addType(CmsSlotTypeInterface $type, $attributes = array ()) {
       
        if (isset($attributes[0]['template_display'])) {
            $type->setTemplateDisplay($attributes[0]['template_display']);
        }

        if (isset($attributes[0]['template_edit'])) {
            $type->setTemplateEdit($attributes[0]['template_edit']);
        }

        $this->types[$type->getName()] = $type;
    }

    public function getSlotType($slotType) {

        if (!isset($this->types[$slotType])) {
            throw new \Exception("The Cms Slot Type $slotType doesn't exist");
        }

        return $this->types[$slotType];
    }

    public function getTypes() {

        return $this->types;
    }

    public function getSlot($slotType, $slotName) {
        
        return $this->getSlotProvider($slotType)->getCmsSlot($slotName);
    }
    
    public function updateSlot(CmsSlot $slot) {
        
        $this->getSlotProvider()->updateCmsSlot($slot);
    }

}