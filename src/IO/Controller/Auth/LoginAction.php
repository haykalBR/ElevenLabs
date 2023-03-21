<?php

declare(strict_types=1);

namespace IO\Controller\Auth;

use App\Application\Command\CommandBusInterface;
use App\Auth\Application\Command\SignIn\SignInCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

#[AsController]
final class LoginAction
{
    public function __construct(private readonly CommandBusInterface $commandBus)
    {
    }

    /**
     * @OA\Response(
     *     response=200,
     *     description="Login success",
     *     @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="token", type="string"
     *        )
     *     )
     * )
     * @OA\Response(
     *     response=400,
     *     description="Bad request"
     * )
     * @OA\Response(
     *     response=401,
     *     description="Bad credentials"
     * )
     * @OA\RequestBody(
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="_token", type="string"),
     *     )
     * )
     *
     * @OA\Tag(name="Auth")
     */
    #[Route(path: '/api/auth_check', name: 'auth_check', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $token = (string) $request->request->get('_token');
        $signInCommand = new SignInCommand(
            $token
        );
        $this->commandBus->handle($signInCommand);
        return new JsonResponse();
    }
}
