<?php

namespace App\repositories\Api\home;

use App\Models\Product;
use App\repositories\BaseRepository;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }
}
