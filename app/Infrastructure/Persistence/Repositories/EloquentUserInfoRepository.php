<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\UserInfo\UserInfo as DomainUserInfo;
use App\Domain\UserInfo\Repositories\UserInfoRepositoryInterface;
use App\Models\UserInfo as EloquentUserInfo;

class EloquentUserInfoRepository implements UserInfoRepositoryInterface
{
    public function save(DomainUserInfo $userInfo): void
    {
        EloquentUserInfo::updateOrCreate(
            ['user_id' => $userInfo->getUserId()],
            [
                'nombre' => $userInfo->getNombre(),
                'apellido' => $userInfo->getApellido(),
                'direccion' => $userInfo->getDireccion(),
                'foto' => $userInfo->getFoto(),
                'telefono' => $userInfo->getTelefono(),
                'condicion_fiscal' => $userInfo->getCondicionFiscal(),
                'cuit' => $userInfo->getCuit(),
                'pais' => $userInfo->getPais(),
                'provincia' => $userInfo->getProvincia(),
                'localidad' => $userInfo->getLocalidad(),
            ]
        );
    }

    public function findByUserId(int $userId): ?DomainUserInfo
    {
        $userInfo = EloquentUserInfo::where('user_id', $userId)->first();

        if (!$userInfo) {
            return null;
        }

        return new DomainUserInfo(
            $userInfo->user_id,
            $userInfo->nombre,
            $userInfo->apellido,
            $userInfo->direccion,
            $userInfo->foto,
            $userInfo->telefono,
            $userInfo->condicion_fiscal,
            $userInfo->cuit,
            $userInfo->pais,
            $userInfo->provincia,
            $userInfo->localidad
        );
    }

    public function delete(DomainUserInfo $userInfo): void
    {
        EloquentUserInfo::where('user_id', $userInfo->getUserId())->delete();
    }
}
