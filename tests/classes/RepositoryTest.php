<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use Mockery;
use RepositoryPattern\InMemoryPersistence;
use RepositoryPattern\UserFactory;
use RepositoryPattern\UserRepository;

class RepositoryTest extends TestCase
{
    /**
     * tear down mockery
     *
     * @SuppressWarnings(StaticAccess)
     */
    protected function tearDown()
    {
        Mockery::close();
    }

    public function testMemoryItCallsThePersistenceWhenAddingAUser()
    {
        $persistenceGateway = new InMemoryPersistence();
        $userRepository = new UserRepository($persistenceGateway);

        $name = "Brown Smith";
        $email = "brownsmith@example.com";
        $userData = array($name, $email);
        $user = (new UserFactory())->make($userData);

        $userRepository->add($user);

        $this->assertEquals($userData, $persistenceGateway->retrieve(0));
    }

    public function testItCanFindAllComments()
    {
        $repository = new UserRepository();

        $name = "Brown Smith";
        $email = "brownsmith@example.com";
        $userData1 = array($name, $email);
        $user1 = (new UserFactory())->make($userData1);

        $name = "Patricia Smith";
        $email = "patriciasmith@example.com";
        $userData2 = array($name, $email);
        $user2 = (new UserFactory())->make($userData2);

        $repository->add($user1);
        $repository->add($user2);

        $this->assertEquals(array($user1, $user2), $repository->findAll());
    }
}
