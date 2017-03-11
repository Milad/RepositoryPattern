<?php

namespace RepositoryPattern\Factories;

use RepositoryPattern\Entities\UserEntity;

class UserFactory implements FactoryInterface
{
    public function make($data): UserEntity
    {
        return new UserEntity($data[0], $data[1]);
    }
}
