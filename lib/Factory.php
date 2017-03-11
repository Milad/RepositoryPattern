<?php

namespace RepositoryPattern;

interface Factory
{
    public function make($data): User;
}
