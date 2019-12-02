<?php

namespace App\Controller;

use App\Service\UserService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractFOSRestController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function putUserAction(): JsonResponse
    {
        try {
            $user = $this->userService->create();
        } catch (\Exception $exception) {
            return new JsonResponse(
                [
                    'status' => 'fail',
                    'message' => $exception->getMessage(),
                ],
                Response::HTTP_OK
            );
        }

        return new JsonResponse(
            [
                'status' => 'success',
                'user_name' => $user->getName(),
            ],
            Response::HTTP_OK
        );
    }

    public function getUserByAgeAction(): JsonResponse
    {
        $users = $this->userService->getUserByAge(11);

        return new JsonResponse(
            ['User' => $users],
            Response::HTTP_OK
        );
    }
}
