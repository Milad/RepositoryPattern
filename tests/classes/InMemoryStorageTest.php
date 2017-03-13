<?php

namespace RepositoryPattern\Tests;

use PHPUnit\Framework\TestCase;
use RepositoryPattern\Storage\InMemoryStorage;

class InMemoryStorageTest extends TestCase
{
    public function testAUserHasAllItsComposingParts()
    {
        $data1 = array('data1');
        $data2 = array('data2');

        $persistence = new InMemoryStorage();
        $key1 = $persistence->persist($data1);
        $key2 = $persistence->persist($data2);

        $this->assertEquals($data1, $persistence->retrieve($key1));
        $this->assertEquals($data2, $persistence->retrieve($key2));
    }
}
