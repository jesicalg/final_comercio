<?php

namespace App\Repositories\Contracts;

interface UserRepository
{
  public function create(array $data);
  public function findOrFail(int $pk);
  public function update(int $pk, array $data);
}