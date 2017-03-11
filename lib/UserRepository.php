<?php

namespace RepositoryPattern;

class UserRepository
{
    private $persistence;

    public function __construct(Persistence $persistence = null)
    {
        $this->persistence = $persistence ? : new InMemoryPersistence();
    }

    public function add(User $user)
    {
        $this->persistence->persist(array(
            $user->getName(),
            $user->getEmail()
        ));
    }
}
