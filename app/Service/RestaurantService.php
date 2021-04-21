<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Restaurant;
use Ramsey\Uuid\Uuid;

class RestaurantService
{
    public function create(array $params): Restaurant
    {
        $params['id'] ??= Uuid::uuid4();
        $restaurant = Restaurant::create($params);
        $restaurant->save();
        return $restaurant;
    }
}