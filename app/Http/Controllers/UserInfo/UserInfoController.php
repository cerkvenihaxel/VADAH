<?php

namespace App\Http\Controllers\UserInfo;

use App\Domain\UserInfo\Services\UserInfoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfo\CreateUserInfoRequest;
use App\Models\UserInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    private UserInfoService $service;

    public function __construct(UserInfoService $service)
    {
        $this->service = $service;
    }

    public function store(CreateUserInfoRequest $request): JsonResponse
    {
        $user = Auth::user();

        $userInfo = UserInfo::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'foto' => $request->foto,
            'telefono' => $request->telefono,
            'condicion_fiscal' => $request->condicion_fiscal,
            'cuit' => $request->cuit,
            'pais' => $request->pais,
            'provincia' => $request->provincia,
            'localidad' => $request->localidad,
        ]);

        return response()->json([
            'data' => $userInfo,
        ], 201);
    }

    public function show(int $userId): JsonResponse
    {
        $userInfo = $this->service->getUserInfoByUserId($userId);

        if (!$userInfo) {
            return response()->json(['message' => 'User Info not found'], 404);
        }

        return response()->json(['data' => $userInfo->getUserData()]);
    }

    public function delete(int $userId): JsonResponse
    {
        $userInfo = $this->service->getUserInfoByUserId($userId);

        if (!$userInfo) {
            return response()->json(['message' => 'User Info not found'], 404);
        }

        $this->service->deleteUserInfo($userInfo);

        return response()->json(['message' => 'User Info deleted']);
    }
}
