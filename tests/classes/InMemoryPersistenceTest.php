<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use RepositoryPattern\InMemoryPersistence;

class InMemoryPersistenceTest extends TestCase
{
    public function testAUserHasAllItsComposingParts()
    {
        $data1 = array('data1');
        $data2 = array('data2');

        $persistence = new InMemoryPersistence();
        $persistence->persist($data1);
        $persistence->persist($data2);

        $this->assertEquals($data1, $persistence->retrieve(0));
        $this->assertEquals($data2, $persistence->retrieve(1));
    }
}
