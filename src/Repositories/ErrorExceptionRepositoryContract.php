<?php

namespace Dulat\ErrorHandler\Repositories;

interface ErrorExceptionRepositoryContract
{
    public function store(array $data);
}