<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    public  function apiPermission($key)
    {
        $routes = [];
        $allRoute = Route::getRoutes();
        foreach($allRoute as $value){
            $routeName = $value->getName();
            $position = strpos($routeName, $key);
            if ($position !== false){
                $routes[] = $routeName;
            }
        }

        return $routes;
    }
}
