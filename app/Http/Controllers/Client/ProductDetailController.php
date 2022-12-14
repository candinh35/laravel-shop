<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\repositories\product\ProductRepositoryInterface;

class ProductDetailController extends Controller
{
   protected $productRepo;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public  function  index($id)
    {
        $product = $this->productRepo->find($id);
        $relatedProducts = $this->productRepo->getRelateProduct($product->category_id);
        return view('client.productDetail', compact('product', 'relatedProducts'));
    }
}
