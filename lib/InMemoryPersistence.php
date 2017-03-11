<?php

namespace RepositoryPattern;

class InMemoryPersistence implements Persistence
{
    private $safe = array();

    public function persist(array $data)
    {
        $this->safe[] = $data;
    }

    public function retrieve($ids)
    {
        return $this->safe[$ids];
    }
}
