<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\repositories\background\BackgroundRepositoryInterface;
use App\repositories\banner\BannerRepositoryInterface;
use App\repositories\blog\BlogRepositoryInterface;
use App\repositories\brand\BrandRepositoryInterface;
use App\repositories\category\CategoryRepositoryInterface;
use App\repositories\menu\MenuRepositoryInterface;
use App\repositories\product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $productRepo;
    protected $menuRepo;
    protected $bannerRepo;
    protected $backgroundRepo;
    protected $brandRepo;
    protected $categoryRepo;
    protected $blogRepo;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        MenuRepositoryInterface $menuRepository,
        BannerRepositoryInterface $bannerRepository,
        BrandRepositoryInterface $brandRepository,
        BackgroundRepositoryInterface $backgroundRepository,
        CategoryRepositoryInterface $categoryRepository,
        BlogRepositoryInterface $blogRepository
    )
    {
        $this->productRepo = $productRepository;
        $this->menuRepo = $menuRepository;
        $this->bannerRepo = $bannerRepository;
        $this->brandRepo = $brandRepository;
        $this->categoryRepo = $categoryRepository;
        $this->backgroundRepo = $backgroundRepository;
        $this->blogRepo = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $banners = $this->bannerRepo->getBanner();
        $backgrounds = $this->backgroundRepo->getBackgroundIndex();
        $backgroundLate = $this->backgroundRepo->getBackgroundLate();
        $backgroundLate = $backgroundLate->toArray();
        $backgroundLate = array_slice($backgroundLate, 3);
        $categories = $this->categoryRepo->getAll();
        $products = $this->productRepo->getProductHome();
        $bestSales = Product::select(DB::raw('SUM(order_details.quantity) as total'),'products.id','products.name',  'products.path_image', 'products.price', 'products.sale_price', 'products.category_id')
            ->join('order_details','products.id', 'order_details.product_id')
            ->groupBy('products.id','products.name',  'products.path_image', 'products.price', 'products.sale_price','products.category_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $blogs = $this->blogRepo->getNewPost();
       return view('client.index',[
           'banners'=>$banners,
           'backgrounds'=>$backgrounds,
           'categories'=>$categories,
           'products'=>$products,
           'backgroundLate'=>$backgroundLate,
           'bestSales' =>$bestSales,
           'blogs'=>$blogs
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProduct($category_id)
    {
        $result = $this->productRepo->getProductApi($category_id);

        return response([
            'result'=>$result,
            'message'=>'Thành Công'
        ], 200);
    }
}
