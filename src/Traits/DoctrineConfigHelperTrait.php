<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\DependencyInjection\ContainerBuilder;

trait DoctrineConfigHelperTrait
{
    protected function addDoctrineResolveTargetEntity(ContainerBuilder $container, string $classOrEntity, string $resolvedEntity): void
    {
        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'resolve_target_entities' => [
                    $classOrEntity => $resolvedEntity,
                ],
            ],
        ]);
    }

    protected function addDoctrineEntityType(ContainerBuilder $container, string $name, string $class): void
    {
        $container->prependExtensionConfig('doctrine', [
            'dbal' => [
                'types' => [
                    $name => $class,
                ],
            ],
        ]);
    }

    protected function addDoctrineEntityMappingAsAttribute(
        ContainerBuilder $container,
        string $name,
        string $directory,
        string $namespace
    ): void
    {
        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'mappings' => [
                    $name => [
                        'dir' => $directory,
                        'prefix' => $namespace,
                        'type' => 'attribute',
                    ],
                ],
            ],
        ]);
    }
}
