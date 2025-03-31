<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\DependencyInjection\ContainerBuilder;

trait DoctrineMigrationsConfigHelperTrait
{
    protected function addDoctrineMigrationsPath(ContainerBuilder $container, string $namespace, string $directory): void
    {
        $container->prependExtensionConfig('doctrine_migrations', [
            'migrations_paths' => [
                $namespace => $directory,
            ],
        ]);
    }
}
