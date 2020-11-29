<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class SystemResponse extends JsonResponse
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer();
        parent::__construct();
    }

    /**
     * @param mixed $data
     */
    public function success($data = null): JsonResponse
    {
        $serializedData = 'Success';
        if ($data) {
            $serializedData = $this->serializer->serialize($data, 'json');
        }

        return new JsonResponse($serializedData, Response::HTTP_OK);
    }

    public function validationError(): JsonResponse
    {
        return new JsonResponse([], Response::HTTP_BAD_REQUEST);
    }
}