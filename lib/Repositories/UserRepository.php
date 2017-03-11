<?php

namespace RepositoryPattern\Repositories;

use RepositoryPattern\Factories\UserFactory;
use RepositoryPattern\Entities\UserEntity;
use RepositoryPattern\Storage\InMemoryStorage;
use RepositoryPattern\Storage\StorageInterface;

class UserRepository
{
    private $persistence;
    private $userFactory;

    public function __construct(StorageInterface $persistence = null)
    {
        $this->persistence = $persistence ? : new InMemoryStorage();
    }

    public function add(UserEntity $user)
    {
        $this->persistence->persist(array(
            $user->getName(),
            $user->getEmail()
        ));
    }

    public function findAll()
    {
        $allUsersData = $this->persistence->retrieveAll();

        $this->userFactory = new UserFactory();

        $users = array();

        foreach ($allUsersData as $userData) {
            $users[] = $this->userFactory->make($userData);
        }

        return $users;
    }
}
