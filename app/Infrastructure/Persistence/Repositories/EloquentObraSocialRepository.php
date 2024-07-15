<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\ObraSocial\ObraSocial as DomainObraSocial;
use App\Domain\ObraSocial\Repositories\ObraSocialRepositoryInterface;
use App\Models\ObraSocial as EloquentObraSocial;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentObraSocialRepository implements ObraSocialRepositoryInterface
{
    public function save(DomainObraSocial $obraSocial): void
    {
        $eloquentObraSocial = EloquentObraSocial::updateOrCreate(
            ['id' => $obraSocial->getId() > 0 ? $obraSocial->getId() : null],
            [
                'nombre' => $obraSocial->getNombre(),
                'codigo_unico' => $obraSocial->getCodigoUnico(),
            ]
        );

        if ($obraSocial->getId() === 0) {
            $obraSocial->setId($eloquentObraSocial->id);
        }
    }

    public function getAll(): array
    {
        $obrasSociales = EloquentObraSocial::all();

        return $obrasSociales->map(function ($obraSocial) {
            return new DomainObraSocial(
                $obraSocial->id,
                $obraSocial->nombre,
                $obraSocial->codigo_unico
            );
        })->toArray();
    }

    public function findById(int $id): ?DomainObraSocial
    {
        $obraSocial = EloquentObraSocial::find($id);

        if (!$obraSocial) {
            return null;
        }

        return new DomainObraSocial($obraSocial->id, $obraSocial->nombre, $obraSocial->codigo_unico);
    }

    public function findByNombre(string $nombre): ?DomainObraSocial
    {
        $obraSocial = EloquentObraSocial::where('nombre', $nombre)->first();

        if (!$obraSocial) {
            return null;
        }

        return new DomainObraSocial($obraSocial->id, $obraSocial->nombre, $obraSocial->codigo_unico);
    }

    public function delete(DomainObraSocial $obraSocial): void
    {
        try {
            $eloquentObraSocial = EloquentObraSocial::findOrFail($obraSocial->getId());
            $eloquentObraSocial->delete();
        } catch (ModelNotFoundException $exception) {
            throw new \Exception('Obra Social no encontrada', 404);
        }
    }
}
