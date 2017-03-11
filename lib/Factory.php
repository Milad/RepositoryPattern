<?php

namespace RepositoryPattern;

interface Factory
{
    public function make(string $name, string $email): User;
}
