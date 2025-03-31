<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\DependencyInjection\ContainerBuilder;

trait MonologConfigHelperTrait
{
    protected function addMonologRotatingFilesHandler(ContainerBuilder $container, string $provider, string $path, int $maxFiles = 180): void
    {
        $container->prependExtensionConfig('monolog', [
            'handlers' => [
                $provider => [
                    'type' => 'rotating_file',
                    'path' => $path.'.'.$provider.'.log',
                    'level' => 'info',
                    'max_files' => $maxFiles,
                    'channels' => [$provider],
                ],
                'main' => [
                    'channels' => ['!'.$provider],
                ],
            ],
            'channels' => [$provider],
        ]);
    }
}
