<?php

namespace App\repositories\product;

use App\repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getProduct();

//lấy các category in ra create
    public function getCategory($parent, $text);

    public function getBrand();

//  câu lệnh insert được thưc thi trong hàm này
    public function store($request);

//  câu lệnh update được thưc thi trong hàm này
    public function edit($id, $request);

//lấy các category in ra edit
    public function getCategoryEdit($category_id, $parent, $text);

    public function getColor();

    public function getSize();

    public function destroy($id);

    public function getProductApi($category_id);

    public function getProductHome();

    public function getProductShop();

    public function getRelateProduct( $category_id);

    public function getProductComments($id);

}
