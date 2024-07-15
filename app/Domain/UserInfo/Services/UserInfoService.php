<?php

namespace App\Domain\UserInfo\Services;

use App\Domain\UserInfo\Repositories\UserInfoRepositoryInterface;
use App\Domain\UserInfo\UserInfo;

class UserInfoService
{
    private UserInfoRepositoryInterface $repository;

    public function __construct(UserInfoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createOrUpdateUserInfo(array $data): UserInfo
    {
        $userInfo = new UserInfo(
            $data['user_id'],
            $data['nombre'],
            $data['apellido'],
            $data['direccion'],
            $data['foto'] ?? null,
            $data['telefono'],
            $data['condicion_fiscal'],
            $data['cuit'],
            $data['pais'],
            $data['provincia'],
            $data['localidad']
        );

        $this->repository->save($userInfo);

        return $userInfo;
    }

    public function getUserInfoByUserId(int $userId): ?UserInfo
    {
        return $this->repository->findByUserId($userId);
    }

    public function deleteUserInfo(UserInfo $userInfo): void
    {
        $this->repository->delete($userInfo);
    }
}
