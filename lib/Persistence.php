<?php

namespace RepositoryPattern;

interface Persistence
{
    public function persist(array $data);
    public function retrieve($ids);
}
