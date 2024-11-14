<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Contracts\Database\Query\Builder;
use DB;

class UserEloquentRepository implements UserRepository
{

  private Builder $builder;

  public function __construct()
  {

      $this->builder = User::query();
  }
  public function create(array $data): void
  {
      DB::transaction(function() use ($data) {
          $user = User::create($data);
      });
  }
  public function findOrFail(int $pk)
  {
    return User::findOrFail($pk);
  }
  public function update(int $pk, array $data)
  {
    $user = $this->findOrFail($pk);
    DB::transaction(function() use ($user, $data){
      $user->update($data);
    });
  }
}
