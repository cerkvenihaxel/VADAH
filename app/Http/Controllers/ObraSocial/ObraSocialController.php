<?php

namespace App\Http\Controllers\ObraSocial;

use App\Domain\ObraSocial\Services\ObraSocialService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObraSocial\CreateObraSocialRequest;
use App\Http\Requests\ObraSocial\UpdateObraSocialRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class ObraSocialController extends Controller
{
    private ObraSocialService $service;

    public function __construct(ObraSocialService $service)
    {
        $this->service = $service;
    }

    public function store(CreateObraSocialRequest $request): JsonResponse
    {
        $obraSocial = $this->service->createObraSocial($request->nombre);

        return response()->json([
            'message' => 'Obra social creada correctamente',
            'data' => [
                'id' => $obraSocial->getId(),
                'nombre' => $obraSocial->getNombre(),
                'codigoUnico' => $obraSocial->getCodigoUnico(),
            ]], 201);

    }

    public function index(): JsonResponse
    {
        try {
            $obrasSociales = $this->service->getAllObrasSociales();

            return response()->json([
                'data' => $obrasSociales,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al obtener las obras sociales',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        $obraSocial = $this->service->getObraSocialById($id);

        if (!$obraSocial) {
            return response()->json(['message' => 'Obra Social no encontrada'], 404);
        }
        return response()->json([
            'data' => [
                'id' => $obraSocial->getId(),
                'nombre' => $obraSocial->getNombre(),
                'codigoUnico' => $obraSocial->getCodigoUnico(),
            ]
        ]);
    }

    public function update(UpdateObraSocialRequest $request, int $id): JsonResponse
    {
        $obraSocial = $this->service->getObraSocialById($id);

        if (!$obraSocial) {
            return response()->json(['message' => 'Obra Social no encontrada'], 404);
        }

        $updatedObraSocial = $this->service->updateObraSocial($id, $request->nombre);

        return response()->json([
            'message' => 'Obra Social actualizada correctamente',
            'data' => [
                'id' => $updatedObraSocial->getId(),
                'nombre' => $updatedObraSocial->getNombre(),
                'codigoUnico' => $updatedObraSocial->getCodigoUnico(),
            ]
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $obraSocial = $this->service->getObraSocialById($id);

        if (!$obraSocial) {
            return response()->json(['message' => 'Obra Social no encontrada'], 404);
        }

        $this->service->deleteObraSocial($id);

        return response()->json(['message' => 'Obra Social eliminada correctamente']);
    }
}
