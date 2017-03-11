<?php

namespace RepositoryPattern\Factories;

use RepositoryPattern\Entities\UserEntity;

interface FactoryInterface
{
    public function make($data): UserEntity;
}
