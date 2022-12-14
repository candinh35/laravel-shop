<?php

namespace App\repositories\brand;

use App\repositories\RepositoryInterface;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function getBrand();

    public function store($request);
    public function edit($id, $request);
    public function getBrandIndex();
    public function getBrandLate();
}
