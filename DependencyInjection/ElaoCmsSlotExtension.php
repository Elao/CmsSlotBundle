<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;

/**
 * @author Vincent Bouzeran <vincent.bouzeran@elao.com>
 */
class ElaoCmsSlotExtension extends Extension {

    public function load(array $configs, ContainerBuilder $container) {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->process($configuration->getConfigTree(), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        if (!in_array(strtolower($config['db_driver']), array ('orm', 'mongodb'))) {
            throw new \InvalidArgumentException(sprintf('Invalid db driver "%s".', $config['db_driver']));
        }
        
        $container->setParameter('elao.cms_slot.manager.i18n',       $config['i18n']);
        $container->setParameter('elao.cms_slot.manager.permission', $config['permission']);
        
        $loader->load('services.xml');
        $loader->load('cms_slot_types.xml');
        
        if (isset($config['slots_provider'])){
            $slotProvider = $config['slots_provider'];
        }else{
            if ($config['db_driver'] == 'orm'){
                // Charge le slot provider par défaut
                $loader->load('orm.xml');
                
                $slotProvider = 'elao.cms_slot.provider.orm';
            }elseif ($config['db_driver'] == 'odm'){
                
            }
        }
        
        $container->getDefinition('elao.cms_slot.manager')->addMethodCall('setSlotProvider', array(new Reference($slotProvider)));
    }

    protected function doConfigLoad(array $config, ContainerBuilder $container) {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        foreach ($this->resources as $key => $resource) {
            if (isset($config[$key])) {
                $loader->load($resource['file']);
            }
        }
    }

}
