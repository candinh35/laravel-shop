<?php

namespace App\repositories\banner;

use App\repositories\RepositoryInterface;

interface BannerRepositoryInterface extends RepositoryInterface
{
    public function getBanner();

    public function store($request);
    public function edit($id,$request);
}
