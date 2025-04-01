<?php

declare(strict_types=1);

namespace LibertJeremy\Symfony\ConfigHelpers\Traits;

use Symfony\Component\DependencyInjection\ContainerBuilder;

trait FrameworkMailerConfigHelperTrait
{
    protected function addFrameworkMailerTransport(ContainerBuilder $container, string $name, string $value): void
    {
        $container->prependExtensionConfig('framework', [
            'mailer' => [
                'transports' => [
                    $name => $value,
                ],
            ],
        ]);
    }

    /**
     * @param array<string> $recipients
     */
    protected function addFrameworkMailerRecipients(ContainerBuilder $container, array $recipients): void
    {
        $container->prependExtensionConfig('framework', [
            'mailer' => [
                'envelope' => [
                    'recipients' => $recipients,
                ],
            ],
        ]);
    }

    protected function setFrameworkMailerSender(ContainerBuilder $container, string $sender): void
    {
        $container->prependExtensionConfig('framework', [
            'mailer' => [
                'envelope' => [
                    'sender' => $sender,
                ],
            ],
        ]);
    }
}
