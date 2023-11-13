<?php

namespace App\Http\Controllers;

use App\Domain\Service\Interfaces\ITenantService;
use App\Domain\Shared\Responder\Interfaces\IApiHttpResponder;
use App\Http\Requests\CreateTenantRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TenantController extends Controller
{
    /**
     * @param ITenantService $tenantService
     * @param IApiHttpResponder $apiHttpResponder
     */
    public function __construct(private readonly ITenantService $tenantService, private readonly IApiHttpResponder $apiHttpResponder)
    {
    }

    /**
     * @param CreateTenantRequest $createTenantRequest
     * @return JsonResponse
     */
    public function storeTenant(CreateTenantRequest $createTenantRequest): JsonResponse
    {
        $this->tenantService->createNewTenant($createTenantRequest->validated());
        return $this->apiHttpResponder->response(message: trans('messages.success'),status: Response::HTTP_CREATED);
    }
}
