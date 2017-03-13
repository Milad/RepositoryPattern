<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use RepositoryPattern\Factories\UserFactory;

class UserFactoryTest extends TestCase
{
    public function testAUserHasAllItsComposingParts()
    {
        $name = "Brown Smith";
        $email = "brownsmith@example.com";

        $userFactory = new UserFactory();
        $user = $userFactory->make(array($name, $email));

        $this->assertEquals($name, $user->getName());
        $this->assertEquals($email, $user->getEmail());
    }
}
