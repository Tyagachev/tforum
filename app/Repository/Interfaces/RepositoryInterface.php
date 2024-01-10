<?php

namespace App\Repository\Interfaces;

interface RepositoryInterface
{
    public function getAll();

    public function getOneObj(int $id);
}
