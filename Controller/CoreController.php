<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class CoreController extends Controller {

    public function saveAction() {
        $sCode     = $this->getRequest()->request->get('code');
        $sType     = $this->getRequest()->request->get('type');
        
        $slotManager  = $this->container->get('elao.cms_slot.manager');
        $slotType     = $slotManager->getSlotType($sType);
        $slot         = $slotManager->getSlot($slotType, $sCode);

        $slotType->updateSlot($slot, $this->getRequest()->request->all());
        $slotManager->updateSlot($slotType, $slot);
        
        return $this->render($slotType->getTemplateDisplay(), $slotType->getTemplateDisplayParameters($slot));
    }

}