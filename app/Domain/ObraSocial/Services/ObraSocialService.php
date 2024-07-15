<?php

namespace App\Domain\ObraSocial\Services;

use App\Domain\ObraSocial\ObraSocial;
use App\Domain\ObraSocial\Repositories\ObraSocialRepositoryInterface;

// Lógica de negocios
class ObraSocialService
{
    private ObraSocialRepositoryInterface $repository;

    public function __construct(ObraSocialRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createObraSocial(string $nombre): ObraSocial
    {
        $codigoUnico = $this->generateCodigoUnico();
        $obraSocial = ObraSocial::create($nombre, $codigoUnico);
        $this->repository->save($obraSocial);

        return $obraSocial;
    }

    public function getAllObrasSociales(): array
    {
        $obrasSociales = $this->repository->getAll();
        return array_map(function ($obraSocial) {
            return [
                'id' => $obraSocial->getId(),
                'nombre' => $obraSocial->getNombre(),
                'codigoUnico' => $obraSocial->getCodigoUnico(),
            ];
        }, $obrasSociales);    }
    public function getObraSocialById(int $id): ?ObraSocial
    {
        return $this->repository->findById($id);
    }

    public function getObraSocialByName(string $name): ?ObraSocial
    {
        return $this->repository->findByNombre($name);
    }

    public function updateObraSocial(int $id, string $nombre): ObraSocial
    {

        $obraSocial = $this->repository->findById($id);

        if (!$obraSocial) {
            throw new \Exception('Obra Social no encontrada', 404);
        }

        $obraSocial->setName($nombre);

        $this->repository->save($obraSocial);

        return $obraSocial;
    }

    public function deleteObraSocial(int $id): void
    {
        $obraSocial = $this->repository->findById($id);

        if (!$obraSocial) {
            throw new \Exception('Obra Social no encontrada', 404);
        }

        $this->repository->delete($obraSocial);
    }

    private function generateCodigoUnico(): string
    {
        return bin2hex(random_bytes(16)); // Generar un código único
    }

    //TODO Agregar otros métodos de negocio según sea necesario
}
