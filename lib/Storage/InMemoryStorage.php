<?php

namespace RepositoryPattern\Storage;

class InMemoryStorage implements StorageInterface
{
    private $safe = array();

    public function persist(array $data): int
    {
        $this->safe[] = $data;
        // return id
        end($this->safe);
        return key($this->safe);
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
