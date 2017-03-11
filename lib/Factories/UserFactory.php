<?php

namespace RepositoryPattern\Factories;

use RepositoryPattern\Entities\UserEntity;

class UserFactory implements FactoryInterface
{
    public function __construct()
    {
        return $this;
    }

    public function make($data)
    {
        return new UserEntity($data[0], $data[1]);
    }
}
