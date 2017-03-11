<?php

namespace RepositoryPattern;

class UserFactory implements Factory
{
    public function __construct()
    {
        return $this;
    }

    public function make(string $name, string $email): User
    {
        return new User($name, $email);
    }
}
