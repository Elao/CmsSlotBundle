<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Elao\CmsSlotBundle\CmsSlot\Provider\CmsSlotProviderInterface;
use Elao\CmsSlotBundle\Model\CmsSlot as BaseCmsSlot;
use Elao\CmsSlotBundle\Entity\CmsSlot;

class CmsSlotRepository extends EntityRepository implements CmsSlotProviderInterface
{

    public function getCmsSlot($code)
    {
        $cmsSlot = $this->findOneBy(array('code' => $code));
        if (!$cmsSlot) {
            $cmsSlot = new CmsSlot();
            $cmsSlot->setCode($code);
        }

        return $cmsSlot;
    }

    public function updateCmsSlot($cmsSlot)
    {
        if (!$cmsSlot instanceof BaseCmsSlot) {
            throw new Exception("Cms Slot passed to updateCmsSlot must be instance of CmsSlot Model");
        }

        $this->_em->persist($cmsSlot);
        $this->_em->flush();
    }

}
