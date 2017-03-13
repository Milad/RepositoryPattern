<?php

namespace RepositoryPattern\Storage;

interface StorageInterface
{
    public function persist(array $data): int;
    public function retrieve($ids);
    public function retrieveAll(): array;
}
