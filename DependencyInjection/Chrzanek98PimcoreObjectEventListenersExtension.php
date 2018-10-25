<?php

namespace Chrzanek98\PimcoreObjectEventListenersBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Chrzanek98PimcoreObjectEventListenersExtension extends Extension
{
    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // use this to load your custom configurations
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        try {
            $loader->load('services.yml');
        } catch (\Exception $e) {
            throw new \Symfony\Component\HttpKernel\Exception\HttpException(409, "services.yml not found");
        }
    }
}
