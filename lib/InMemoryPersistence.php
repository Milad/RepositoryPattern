<?php

namespace RepositoryPattern;

class InMemoryPersistence implements Persistence
{
    private $safe = array();

    public function persist(array $data): void
    {
        $this->safe[] = $data;
    }

    public function retrieve($ids): array
    {
        return $this->safe[$ids];
    }
}
