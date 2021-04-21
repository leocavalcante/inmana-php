<?php declare(strict_types=1);

namespace App\Service;

use App\Mail\ExpiringSupplies;
use App\Model\Restaurant;
use HyperfExt\Mail\Mail;

class MailService
{
    public function expiring(): array
    {
        $restaurants = Restaurant::all();
        $results = [
            ['Count', $restaurants->count()],
        ];

        /** @var Restaurant $restaurant */
        foreach ($restaurants as $restaurant) {
            $supplies = $restaurant->expiringSupplies();

            if ($supplies->isNotEmpty()) {
                $results[] = [$restaurant->email, Mail::to($restaurant->email)->send(new ExpiringSupplies($supplies))];
            } else {
                $results[] = [$restaurant->email, 'Without expiring'];
            }
        }

        return $results;
    }
}