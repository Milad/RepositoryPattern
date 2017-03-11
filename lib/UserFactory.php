<?php

namespace RepositoryPattern;

class UserFactory implements Factory
{
    public function __construct()
    {
        return $this;
    }

    public function make($data): User
    {
        return new User($data[0], $data[1]);
    }
}
