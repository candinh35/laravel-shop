<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\repositories\product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function index(Request $request)
    {

//        TÌm kiếm theo search and sort
        $products = Product::search()->orderBy('id', 'DESC');
        $sortBy = $request->sort_by ?? 'latest';


//        get Category and brand and Menu and Size
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $colors = Color::get();
        $sizes = Size::get();
        $products = $this->filter($products, $request);
        $products = $this->sort($products, $sortBy);
        return view('client.shop',
            compact('categories', 'brands', 'colors', 'sizes', 'products'));
    }

    public function category($categoryName, Request $request)
    {
        //        get Category and brand and Menu and Size
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $colors = Color::get();
        $sizes = Size::get();
        $sortBy = $request->sort_by ?? 'latest';
        $products = Category::where('name', $categoryName)->first()->products->toQuery();
        $products = $this->filter($products, $request);
        $products = $this->sort($products, $sortBy);
        return view('client.shop',
            compact('categories', 'brands', 'colors', 'sizes', 'products'));
    }


    public function sort($products, $sortBy)
    {
        switch ($sortBy) {
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderBy('id', 'DESC');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-decrease':
                $products = $products->orderBy('name', 'DESC');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price', 'ASC');
                break;
            case 'price-decrease':
                $products = $products->orderBy('price', 'DESC');
                break;
        }

        return $products->paginate(12);
    }

    public  function filter($products,$request)
    {
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);

        $price = $request->price ?? [];
        if ($price != null){
        $price = str_replace(' - ', '', $price);
        $price = explode(' Đ',$price);
        $priceMin = $price[0];
        $priceMax = $price[1];
        $products = ($priceMin != null && $priceMax != null) ? $products->whereBetween('price',[$priceMin, $priceMax]) : $products;
        }
        return $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;
    }

    public function colors($colorId, Request $request)
    {
//        get Category and brand and Menu and Size
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $colors = Color::get();
        $sizes = Size::get();
        $sortBy = $request->sort_by ?? 'latest';
        $products = Color::where('id', $colorId)->get();
        foreach ($products as $product){
            $products = $product->products;
        }
        return view('client.shop',
            compact('categories', 'brands', 'colors', 'sizes', 'products'));
    }
}
