<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\Twig\Extension;

use Elao\CmsSlotBundle\CmsSlot\CmsSlotManager;

class ElaoCmsSlotExtension extends \Twig_Extension {

    protected $templating;
    protected $slotManager;

    public function __construct(CmsSlotManager $slotManager) {
        $this->slotManager = $slotManager;
    }

    /**
     * {@inheritdoc}
     */
    public function initRuntime(\Twig_Environment $environment) {
        $this->environment = $environment;
    }

    public function getSlotManager() {
        return $this->slotManager;
    }

    /**
     * (non-PHPdoc)
     * @see Twig_Extension::getFunctions()
     */
    public function getFunctions() {
        return array (
            'cms_slot' => new \Twig_Function_Method($this, 'renderCmsSlot', array ('is_safe' => array ('html')))
        );
    }

    public function renderCmsSlot($slotType, $slotName, $parameters = array ()) {
        
        // Slot Type
        $slotType  = $this->getSlotManager()->getSlotType($slotType);
        $slotName  = $this->getSlotManager()->formatSlotName($slotName);
        $editMode  = $this->getSlotManager()->isEditMode();
        
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
        $_template = $this->environment->loadTemplate($template);
        return $_template->render($parameters);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return 'elao_cms_slot';
    }

    /**
     * set the templating engine
     *
     * @param  $templating
     * @return void
     */
    public function setTemplating($templating) {
        $this->templating = $templating;
    }

    /**
     * return the templating engine
     *
     * @return Engine
     */
    public function getTemplating() {
        return $this->templating;
    }

}

