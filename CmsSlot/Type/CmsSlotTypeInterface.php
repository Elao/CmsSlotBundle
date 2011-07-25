<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\CmsSlot\Type;

interface CmsSlotTypeInterface
{
    function retrieveParams();

    /**
     * return the cmslot type name
     * @return string
     */
    function getName();
    
    /**
     * Set the display template for this slot type
     */
    function setTemplateDisplay($templateDisplay);
    
    /**
     * Get the display template for this slot type
     */
    function getTemplateDisplay();
    
    
    /**
     * Set the edit template for this slot type
     */
    function setTemplateEdit($templateEdit);
    
    /**
     * Get the edit template for this slot type
     */
    function getTemplateEdit();
    
}
