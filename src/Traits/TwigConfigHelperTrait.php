<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\DependencyInjection\ContainerBuilder;

trait TwigConfigHelperTrait
{
    protected function addTwigPath(ContainerBuilder $container, string $directory, string $prefix): void
    {
        $container->prependExtensionConfig('twig', [
            'paths' => [
                $directory => $prefix,
            ],
        ]);
    }

    protected function addTwigFormTheme(ContainerBuilder $container, string $template): void
    {
        $container->prependExtensionConfig('twig', [
            'form_themes' => [
                $template,
            ],
        ]);
    }
}
