<?php

namespace RepositoryPattern\Storage;

class InMemoryStorage implements StorageInterface
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

    public function retrieveAll(): array
    {
        return $this->safe;
    }
}
