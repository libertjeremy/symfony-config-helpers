<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

trait ParametersInitializerHelperTrait
{
    protected function initConfigurationParameters(ContainerBuilder $builder, array $config): array
    {
        if (!$this instanceof BundleInterface) {
            throw new \LogicException('This should be used in bundle configuration.');
        }

        if (!($containerExtension = $this->getContainerExtension()) instanceof ExtensionInterface) {
            throw new \RuntimeException('No Extension found.');
        }

        foreach ($config as $key => $parameter) {
            $builder->setParameter($containerExtension->getAlias().'.'.$key, $parameter);
        }

        return $config;
    }
}
