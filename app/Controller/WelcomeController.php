<?php declare(strict_types=1);

namespace App\Controller;

use App\Exception\WelcomeException;
use App\Service\WelcomeService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Swoole\Http\Status;

class WelcomeController extends AbstractController
{
    private WelcomeService $welcomeService;

    public function __construct(WelcomeService $welcomeService)
    {
        parent::__construct();
        $this->welcomeService = $welcomeService;
    }

    public function index(RequestInterface $request, ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        try {
            $message = $this->welcomeService->welcome($request->getQueryParams());
            return $response->json(['error' => false, 'message' => $message]);
        } catch (WelcomeException $err) {
            return $response->json(['error' => true, 'message' => $err->getMessage()])
                ->withStatus(Status::BAD_REQUEST);
        }
    }
}