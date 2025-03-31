<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

trait YamlFileLoaderHelperTrait
{
    /**
     * @param array<string>|string $yamlFiles
     */
    protected function loadYamlFiles(ContainerBuilder $containerBuilder, array|string $yamlFiles, string $path = __DIR__.'/../Resources/config'): void
    {
        $loader = new YamlFileLoader($containerBuilder, new FileLocator($path));

        $yamlFiles = (array) $yamlFiles;

        foreach ($yamlFiles as $yamlFile) {
            $loader->load($yamlFile);
        }
    }
}
