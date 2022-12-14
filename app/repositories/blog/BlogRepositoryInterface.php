<?php

namespace App\repositories\blog;

use App\repositories\RepositoryInterface;

interface BlogRepositoryInterface extends RepositoryInterface
{
    public  function getBlog();

    public function store($request);

    public function edit($id , $request);

    public  function  destroy($id);

    public function getNewPost();

    public function getComment($id);

}
