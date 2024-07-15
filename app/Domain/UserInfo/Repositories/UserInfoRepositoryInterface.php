<?php

namespace App\Domain\UserInfo\Repositories;

use App\Domain\UserInfo\UserInfo;

interface UserInfoRepositoryInterface
{
    public function save(UserInfo $userInfo): void;
    public function findByUserId(int $userId): ?UserInfo;
    public function delete(UserInfo $userInfo): void;
}
