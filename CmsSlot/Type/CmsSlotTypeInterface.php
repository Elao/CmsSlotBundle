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
    public function retrieveParams();

    /**
     * return the cmslot type name
     * @return string
     */
    public function getName();

    /**
     * Set the display template for this slot type
     */
    public function setTemplateDisplay($templateDisplay);

    /**
     * Get the display template for this slot type
     */
    public function getTemplateDisplay();

    /**
     * Set the edit template for this slot type
     */
    public function setTemplateEdit($templateEdit);

    /**
     * Get the edit template for this slot type
     */
    public function getTemplateEdit();

}
