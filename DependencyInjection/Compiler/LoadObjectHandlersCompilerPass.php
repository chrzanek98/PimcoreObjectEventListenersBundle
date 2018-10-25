<?php

namespace Chrzanek98\PimcoreObjectEventListenersBundle\DependencyInjection\Compiler;

use Chrzanek98\PimcoreObjectEventListenersBundle\EventListeners\Providers\HandlerInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class LoadObjectHandlersCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $context = $container->findDefinition('chrzanek98_pimcore_object_event_listeners.object.handler.context');
        $taggedServices = $container->findTaggedServiceIds('object.handler');
        $taggedServiceIds = array_keys($taggedServices);

        foreach ($taggedServiceIds as $taggedServiceId) {
            /** @var HandlerInterface $taggedServiceId */
            $context->addMethodCall('addHandler', [new Reference($taggedServiceId)]);
        }
    }
}