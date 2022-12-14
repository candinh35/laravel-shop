<?php

namespace App\repositories\role;

use App\repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function getRole();

    public function getPermission();

    public function store($request);

    public function edit($id, $request);

    public function destroy($id);
}
