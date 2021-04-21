<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\MailService;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;

/**
 * @Command
 */
class MailExpiringCommand extends HyperfCommand
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct('mail:expiring');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Mail restaurants with expiring supplies');
    }

    public function handle(): void
    {
        $this->output->info('Mailing expired supplies');
        $this->container->get(MailService::class)->expiring();
        $this->output->success('Done');
    }
}
