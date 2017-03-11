<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use RepositoryPattern\UserFactory;

class UserFactoryTest extends TestCase
{
    public function testAUserHasAllItsComposingParts()
    {
        $name = "Brown Smith";
        $email = "brownsmith@gmail.com";

        $user = (new UserFactory())->make($name, $email);

        $this->assertEquals($name, $user->getName());
        $this->assertEquals($email, $user->getEmail());
    }
}
