<?php

namespace RepositoryPattern;

interface Persistence
{
    public function persist(array $data): void;
    public function retrieve($ids): array;
}
