<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Elao\CmsSlotBundle\DependencyInjection\AddCmsSlotTypesPass;

class ElaoCmsSlotBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddCmsSlotTypesPass());
    }
}
