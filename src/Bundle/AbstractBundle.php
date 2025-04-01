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
}
