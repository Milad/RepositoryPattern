<?php

namespace RepositoryPattern\Repositories;

use RepositoryPattern\Factories\FactoryInterface;
use RepositoryPattern\Entities\UserEntity;
use RepositoryPattern\Storage\StorageInterface;

class UserRepository
{
    private $persistence;
    private $userFactory;

    public function __construct(StorageInterface $persistence, FactoryInterface $userFactory)
    {
        $this->persistence = $persistence;
        $this->userFactory = $userFactory;
    }

    public function add(UserEntity $user)
    {
        $this->persistence->persist(array(
            $user->getName(),
            $user->getEmail()
        ));
    }

    public function findAll(): array
    {
        $allUsersData = $this->persistence->retrieveAll();

        $users = array();

        foreach ($allUsersData as $userData) {
            $users[] = $this->userFactory->make($userData);
        }

        return $users;
    }
}
