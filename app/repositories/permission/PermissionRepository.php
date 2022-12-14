<?php

namespace App\repositories\permission;

use App\Models\Permission;
use App\repositories\BaseRepository;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{

    public function getModel()
    {
        return Permission::class;
    }

    public function getPermission()
    {
        return $this->model->search()->get();
    }
}
