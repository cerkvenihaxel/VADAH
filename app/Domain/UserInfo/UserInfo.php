<?php

namespace App\Domain\UserInfo;

class UserInfo
{
    private int $userId;
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private ?string $foto;
    private string $telefono;
    private string $condicionFiscal;
    private string $cuit;
    private string $pais;
    private string $provincia;
    private string $localidad;

    public function __construct(
        int $userId,
        string $nombre,
        string $apellido,
        string $direccion,
        ?string $foto,
        string $telefono,
        string $condicionFiscal,
        string $cuit,
        string $pais,
        string $provincia,
        string $localidad
    ) {
        $this->userId = $userId;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->condicionFiscal = $condicionFiscal;
        $this->cuit = $cuit;
        $this->pais = $pais;
        $this->provincia = $provincia;
        $this->localidad = $localidad;
    }

    // Getters


    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function getCondicionFiscal(): string
    {
        return $this->condicionFiscal;
    }

    public function getCuit(): string
    {
        return $this->cuit;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    public function getProvincia(): string
    {
        return $this->provincia;
    }

    public function getLocalidad(): string
    {
        return $this->localidad;
    }

    public function getUserData(): array
    {
        return [
            'userId' => $this->userId,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'direccion' => $this->direccion,
            'foto' => $this->foto,
            'telefono' => $this->telefono,
            'condicionFiscal' => $this->condicionFiscal,
            'cuit' => $this->cuit,
            'pais' => $this->pais,
            'provincia' => $this->provincia,
            'localidad' => $this->localidad
        ];
    }

    // Setters (if needed)
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function setFoto(?string $foto): void
    {
        $this->foto = $foto;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function setCondicionFiscal(string $condicionFiscal): void
    {
        $this->condicionFiscal = $condicionFiscal;
    }

    public function setCuit(string $cuit): void
    {
        $this->cuit = $cuit;
    }

    public function setPais(string $pais): void
    {
        $this->pais = $pais;
    }

    public function setProvincia(string $provincia): void
    {
        $this->provincia = $provincia;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->localidad = $localidad;
    }
}
