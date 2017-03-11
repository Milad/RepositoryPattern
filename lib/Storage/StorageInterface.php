<?php

namespace RepositoryPattern\Storage;

interface StorageInterface
{
    public function persist(array $data);
    public function retrieve($ids);
    public function retrieveAll();
}
