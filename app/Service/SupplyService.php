<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Supply;
use Ramsey\Uuid\Uuid;

class SupplyService
{
    public function create(array $params): Supply
    {
        $params['id'] ??= Uuid::uuid4();
        $supply = Supply::create($params);
        $supply->save();
        return $supply;
    }

    public function find(string $id): ?Supply
    {
        return Supply::find($id);
    }
}