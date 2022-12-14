<?php

namespace App\repositories\user;

use App\repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUser();

    public function store($request);
    public function edit($id, $request);
    public function getRole();
}
