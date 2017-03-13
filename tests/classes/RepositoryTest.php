<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use RepositoryPattern\Storage\InMemoryStorage;
use RepositoryPattern\Factories\UserFactory;
use RepositoryPattern\Repositories\UserRepository;

class RepositoryTest extends TestCase
{
    public function testMemoryItCallsThePersistenceWhenAddingAUser()
    {
        $persistenceGateway = new InMemoryStorage();
        $userFactory = new UserFactory();
        $userRepository = new UserRepository($persistenceGateway, $userFactory);

        $name = "Brown Smith";
        $email = "brownsmith@example.com";
        $userData = array($name, $email);
        $user = $userFactory->make($userData);

        $key = $userRepository->add($user);

        $this->assertEquals($userData, $persistenceGateway->retrieve($key));
    }

    public function testItCanFindAllUsers()
    {
        $persistenceGateway = new InMemoryStorage();
        $userFactory = new UserFactory();
        $repository = new UserRepository($persistenceGateway, $userFactory);

        $name = "Brown Smith";
        $email = "brownsmith@example.com";
        $userData1 = array($name, $email);
        $user1 = $userFactory->make($userData1);

        $name = "Patricia Smith";
        $email = "patriciasmith@example.com";
        $userData2 = array($name, $email);
        $user2 = $userFactory->make($userData2);

        $repository->add($user1);
        $repository->add($user2);

        $this->assertEquals(array($user1, $user2), $repository->findAll());
    }
}
