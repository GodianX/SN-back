<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\CoreUserDTO;
use App\Form\CoreUserForm;
use App\Service\CoreUserService;
use App\Service\SystemResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("user/", name="user_")
 */
class CoreUserController extends AbstractController
{
    private SystemResponse $systemResponse;
    private CoreUserService $coreUserService;

    public function __construct(
        SystemResponse $systemResponse,
        CoreUserService $coreUserService
    ) {
        $this->systemResponse = $systemResponse;
        $this->coreUserService = $coreUserService;
    }

    /**
     * @Route("create/", name="create", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $coreUserDto = new CoreUserDTO();
        $form = $this->createForm(CoreUserForm::class, $coreUserDto);
        $form->handleRequest($request);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->systemResponse->validationError();
        }

        $this->coreUserService->save($coreUserDto);

        return $this->systemResponse->success();
    }
}
