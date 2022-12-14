<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\repositories\product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = $this->productRepo->getProduct();

        return view('admin.product.index', [
            'model'=>'product',
            'title'=>'product',
            'products'=>$products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $colors = $this->productRepo->getColor();
        $sizes = $this->productRepo->getSize();
        $categories = $this->productRepo->getCategory();
        $brands = $this->productRepo->getBrand();
        return view('admin.product.add', [
            'model'=>'product',
            'title'=>'product',
            'categories'=>$categories,
            'brands'=>$brands,
            'colors'=>$colors,
            'sizes'=>$sizes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        return $this->productRepo->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product =  $this->productRepo->find($id);
        return view('admin.product.show', [
            'model'=>'product',
            'title'=>'product',
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = $this->productRepo->find($id);
        $categories = $this->productRepo->getCategoryEdit($product->category_id);
        $brands = $this->productRepo->getBrand();

        return view('admin.product.edit', [
            'model'=>'product',
            'title'=>'product',
            'product'=>$product,
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        return  $this->productRepo->edit($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->productRepo->destroy($id);
    }
}
