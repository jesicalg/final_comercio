<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use DB;

class UserEloquentRepository implements UserRepository
{
  public function create(array $data): void
  {
      DB::transaction(function() use ($data) {
          $user = User::create($data);
      });
  }
}
