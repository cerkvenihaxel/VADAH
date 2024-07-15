<?php

namespace App\Domain\ObraSocial;

class ObraSocial
{
    private int $id;
    private string $nombre;
    private string $codigoUnico;

    public function __construct(int $id, string $nombre, string $codigoUnico)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigoUnico = $codigoUnico;
    }

    public static function create(string $nombre, string $codigoUnico): self
    {
        return new self(0, $nombre, $codigoUnico);
    }

    //GETTERS
    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCodigoUnico(): string
    {
        return $this->codigoUnico;
    }


    //SETTERS
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    //TODO Agregar más métodos!!
}
