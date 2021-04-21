<?php declare(strict_types=1);

namespace App\Controller;

use App\Request\SupplyRequest;
use App\Service\SupplyService;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Swoole\Http\Status;

class SupplyController extends AbstractController
{
    private SupplyService $supplyService;

    public function __construct(SupplyService $supplyService)
    {
        parent::__construct();
        $this->supplyService = $supplyService;
    }

    public function create(SupplyRequest $request, ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $supply = $this->supplyService->create($request->validated());
        return $response->json($supply)->withStatus(Status::CREATED);
    }

    public function show(string $id, ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $supply = $this->supplyService->find($id);

        if ($supply === null) {
            return $response
                ->json(['error' => true, 'message' => trans('messages.not_found', [
                    'resource' => 'Supply',
                    'id' => $id,
                    ])
                ])
                ->withStatus(Status::NOT_FOUND);
        }

        return $response->json($supply);
    }
}