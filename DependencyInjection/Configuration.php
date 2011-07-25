<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Michael Williams <mtotheikle@gmail.com>
 */
class Configuration
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\Config\Definition\NodeInterface
     */
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('elao_cms_slot', 'array');

        $rootNode
            ->children()
            	->scalarNode('db_driver')->cannotBeOverwritten()->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('slot_provider')->end()
                ->scalarNode('permission')->defaultValue('CMS_SLOT_EDIT')->end()
                ->arrayNode('tinymce')
                    ->children()
                        ->scalarNode('enabled')->defaultFalse()->end()
                        ->scalarNode('path')->defaultNull()->end()
                    ->end()
                ->end()
                ->scalarNode('i18n')->defaultFalse()->end()
            ->end()
        ->end();

        return $treeBuilder->buildTree();
    }
}
