<?php

namespace App\Domain\ObraSocial\Repositories;

use App\Domain\ObraSocial\ObraSocial;

// Defino las interfaces y lo que devuelve
interface ObraSocialRepositoryInterface
{
    public function save(ObraSocial $obraSocial): void;
    public function getAll(): array;
    public function findById(int $id): ?ObraSocial;
    public function findByNombre(string $nombre): ?ObraSocial;
    public function delete(ObraSocial $obraSocial): void;
}


