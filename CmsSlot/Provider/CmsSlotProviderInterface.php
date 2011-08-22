<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\CmsSlot\Provider;

use Elao\CmsSlotBundle\Model\CmsSlot;

interface CmsSlotProviderInterface
{
    public function getCmsSlot($code);
    
    public function updateCmsSlot(CmsSlot $cmsSlot);
    
}
