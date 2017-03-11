<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use Mockery;
use RepositoryPattern\InMemoryPersistence;
use RepositoryPattern\UserFactory;
use RepositoryPattern\UserRepository;

class RepositoryTest extends TestCase
{
    protected function tearDown()
    {
        Mockery::close();
    }

    /*
    public function testItCallsThePersistenceWhenAddingAUser()
    {
        $persistenceGateway = Mockery::mock('RepositoryPattern\Persistence');
        $userRepository = new UserRepository($persistenceGateway);

        $name = "Brown Smith";
        $email = "brownsmith@gmail.com";
        $userData = array($name, $email);
        $user = (new UserFactory())->make($name, $email);

        $persistenceGateway->shouldReceive('persist')->once()->with($userData);

        $userRepository->add($user);
    }
    */

    public function testMemoryItCallsThePersistenceWhenAddingAUser()
    {
        $persistenceGateway = new InMemoryPersistence();
        $userRepository = new UserRepository($persistenceGateway);

        $name = "Brown Smith";
        $email = "brownsmith@gmail.com";
        $userData = array($name, $email);
        $user = (new UserFactory())->make($name, $email);

        $userRepository->add($user);

        $this->assertEquals($userData, $persistenceGateway->retrieve(0));
    }
}
