<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\Entity;

use Elao\CmsSlotBundle\Model\CmsSlot as AbstractCmsSlot;

class CmsSlot extends AbstractCmsSlot
{
    protected $id;

    public function getId(){
        
        return $this->id;
    }

	
	
}