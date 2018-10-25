<?php

namespace Chrzanek98\PimcoreObjectEventListenersBundle;

use Chrzanek98\PimcoreObjectEventListenersBundle\DependencyInjection\Compiler\LoadObjectHandlersCompilerPass;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Chrzanek98PimcoreObjectEventListenersBundle extends AbstractPimcoreBundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new LoadObjectHandlersCompilerPass());
    }
}
