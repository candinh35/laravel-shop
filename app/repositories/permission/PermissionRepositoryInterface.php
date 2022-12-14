<?php

namespace App\repositories\permission;

use App\repositories\RepositoryInterface;

interface PermissionRepositoryInterface extends RepositoryInterface
{
    public  function getPermission();
}
