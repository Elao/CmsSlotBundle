<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Add all dependencies to the Admin class, this avoid to write to many lines
 * in the configuration files.
 *
 * @author Vincent Bouzeran <vincent.bouzeran@elao.com>
 */
class AddCmsSlotTypesPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('elao.cms_slot.manager')) {
            return;
        }

        $definition = $container->getDefinition('elao.cms_slot.manager');

        foreach ($container->findTaggedServiceIds('elao.cms_slot.type') as $id => $attributes) {
            $definition->addMethodCall('addType', array(new Reference($id), $attributes));
        }
    }
}
