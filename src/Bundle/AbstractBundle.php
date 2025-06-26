<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Bundle;

use LibertJeremy\Symfony\ConfigHelpers\Traits\ParametersInitializerHelperTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle as BaseAbstractBundle;

abstract class AbstractBundle extends BaseAbstractBundle
{
    use ParametersInitializerHelperTrait;

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        if (\count($config) > 0) {
            $this->initConfigurationParameters($builder, $config);
        }
    }

    /**
     * @return array<string|array>
     */
    protected function retrieveConfiguration(ContainerBuilder $builder): array
    {
        if (!($containerExtension = $this->getContainerExtension())) {
            return [];
        }

        if (empty(($configs = $builder->getExtensionConfig($containerExtension->getAlias())))) {
            return [];
        }

        $config = [];

        foreach ($configs as $configArray) {
            $config = array_merge($config, $configArray);
        }

        return $config;
    }
}
