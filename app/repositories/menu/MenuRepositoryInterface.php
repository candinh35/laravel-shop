<?php

namespace App\repositories\menu;

use App\repositories\RepositoryInterface;

interface MenuRepositoryInterface extends RepositoryInterface
{
    public  function getMenu();
    public  function getAdd($parent, $text);
    public  function getEdit($id,$parent, $text);
    public  function checkChild($id);
}
