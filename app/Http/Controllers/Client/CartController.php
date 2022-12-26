<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use App\repositories\product\ProductRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public  function index()
   {
       $carts = Cart::content();
        $total = Cart::total();
        $total = str_replace('.00', '', $total);
       return view('client.cart',compact('carts', 'total'));
   }

   public function add(Request $request)
   {
       $product = $this->productRepo->find($request->product_id);
       $color = Color::find($request->color);
       $size = Size::find($request->size);
       Cart::add([
           'id'=>$product->id,
           'name'=>$product->name,
           'qty'=>$request->quantity,
           'price'=>($product->sale_price ?$product->price - $product->sale_price: $product->price ),
           'weight'=>0,
           'options'=>[
               'image'=>$product->path_image,
               'color'=>$color->name,
               'size'=>$size->name,
           ],
       ]);

       return redirect()->route('product_cart');
   }


   public  function delete($rowId)
   {
        Cart::remove($rowId);

        return back();
   }

    public  function destroy()
    {
        Cart::destroy();

        return back();
    }

    public function update(Request $request)
    {
        if ($request->ajax()){
            Cart::update($request->rowId, $request->qty);
        }
        return back();
    }


}
