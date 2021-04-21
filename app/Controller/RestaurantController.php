<?php declare(strict_types=1);

namespace App\Controller;

use App\Request\RestaurantRequest;
use App\Service\RestaurantService;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Swoole\Http\Status;

class RestaurantController extends AbstractController
{
    private RestaurantService $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        parent::__construct();
        $this->restaurantService = $restaurantService;
    }

    public function create(RestaurantRequest $request, ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $restaurant = $this->restaurantService->create($request->validated());
        return $response->json($restaurant)->withStatus(Status::CREATED);
    }
}