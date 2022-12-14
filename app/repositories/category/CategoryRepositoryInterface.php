<?php

namespace App\repositories\category;

use App\repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getCategory();

    public function getAdd($parent, $text);

    public function  getEdit($parent,$text);
}
