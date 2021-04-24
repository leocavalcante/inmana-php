<?php declare(strict_types=1);

$expiring_supplies = (new \Hyperf\Crontab\Crontab())
    ->setName('Expiring supplies')
    ->setRule('* * * * *') // Every minute
    ->setType('command')
    ->setCallback(['command' => 'mail:expiring']);

return [
    'enable' => true,
    'crontab' => [$expiring_supplies],
];
