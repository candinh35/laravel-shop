<?php

namespace App\repositories\customer;

use App\repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function getCustomer();

    public function store($request);
    public function edit($id, $request);
}
