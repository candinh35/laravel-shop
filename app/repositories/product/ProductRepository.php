<?php

namespace App\repositories\product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_color;
use App\Models\Product_image;
use App\Models\Product_size;
use App\Models\Size;
use App\repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $html;


    public function getModel(): string
    {
        return Product::class;
    }

    public function getProduct()
    {
        return $this->model->search()->orderBy('created_at', 'Desc')->paginate(5);
    }

//    lấy ra category
    public function getCategory($parent = 0, $text = '')
    {
        $categories = Category::where('parent_id', $parent)->get();
        foreach ($categories as $cateChild) {
            $this->html .= "<option value='$cateChild->id'>" . $text . $cateChild->name . "</option>";
            $this->getCategory($cateChild->id, $text . '--');
        }
        return $this->html;
    }

//    lấy ra category và selected vào option nào đang của sản phẩm này theo category_id truyên vào

    public function getCategoryEdit($category_id, $parent = 0, $text = '')
    {
        $categories = Category::where('parent_id', $parent)->get();

        foreach ($categories as $cateChild) {
            if ($category_id === $cateChild->id) {
                $this->html .= "<option selected value='$cateChild->id'>" . $text . $cateChild->name . "</option>";
            } else {
                $this->html .= "<option value='$cateChild->id'>" . $text . $cateChild->name . "</option>";
            }
            $this->getCategoryEdit($category_id, $cateChild->id, $text . '--');
        }
        return $this->html;
    }

    public function getBrand()
    {
        return Brand::all();
    }

    public function getColor(): \Illuminate\Database\Eloquent\Collection
    {
        return Color::all();
    }

    public function getSize(): \Illuminate\Database\Eloquent\Collection
    {
        return Size::all();
    }

    /**  hàm có nhiệm vụ thêm sản phẩm mới vào
     *
     * DB::beginTransaction() and DB::commit() có nhiệm vụ kiểm tra xem insert hoàn tất chưa nếu chưa sẽ không insert vào database
     */
    public function store($request)
    {
        $linkImage = '';
        try {
            DB::beginTransaction();
            $product = [
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'amount' => $request->amount,
                'content' => $request->content,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ];

            if ($request->hasFile('path_image')) {
                upload_img('product', $request);
                $linkImage = $request->input('path_image');
                $product['path_image'] = $linkImage;
            }
            $productId = $this->model->insertGetId($product);
//            insert vào Product Image
            if ($request->hasFile('image_detail')) {
                foreach ($request->image_detail as $proDetail) {
                    $path_image = upload_product_image('productImage', $proDetail);
                    Product_image::create([
                        'path_image' => $path_image,
                        'product_id' => $productId
                    ]);
                }
            }
//         insert vào colors

            if (!empty($request->colors)) {
                foreach ($request->colors as $colorName) {
                    $colorId = Color::firstOrCreate([
                        'name' => $colorName
                    ]);
//                    Product_color
                    Product_color::create([
                        'product_id' => $productId,
                        'color_id' => $colorId->id
                    ]);
                }
            }

//            insert vào size
            if (!empty($request->sizes)) {
                foreach ($request->sizes as $sizeName) {
                    $sizeId = Size::firstOrCreate([
                        'name' => $sizeName
                    ]);
//                    Product_size
                    Product_size::create([
                        'product_id' => $productId,
                        'size_id' => $sizeId->id
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Sản Phẩm Thành Công');
        } catch (\Exception $err) {
            DB::rollBack();
            File::delete(public_path($linkImage));
            Log::error('Messages :' . $err->getMessage() . 'Line: ' . $err->getLine());
            return redirect()->back()->with('error', 'Thêm Mới Sản Phẩm Thất Bại');
        }
    }

    public function edit($id, $request)
    {
        try {
            DB::beginTransaction();
            $product = $this->find($id);
            $productUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'amount' => $request->amount,
                'content' => $request->content,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ];
            if ($request->hasFile('path_image')) {
                upload_img('product', $request);
                File::delete(public_path($product->path_image));
                $productUpdate['path_image'] = $request->input('path_image');
            }
            $this->update($id, $productUpdate);
//            insert vào Product Image
            if ($request->hasFile('image_detail')) {
                $proImages = $product->productImages;
                foreach ($proImages as $image) {
                    $image->delete();
                    File::delete(public_path($image->path_image));
                }
                foreach ($request->image_detail as $proDetail) {
                    $path_image = upload_product_image('productImage', $proDetail);
                    Product_image::create([
                        'path_image' => $path_image,
                        'product_id' => $id
                    ]);
                }
            }
//         insert vào colors

            if (!empty($request->colors)) {
                foreach ($request->colors as $colorName) {
                    $colorId = Color::firstOrCreate([
                        'name' => $colorName
                    ]);
//                    Product_color
                    $product->productColors()->sync([
                        'product_id' => $product->id,
                        'color_id' => $colorId->id
                    ]);
                }
            }
//            insert vào size
            if (!empty($request->sizes)) {
                foreach ($request->sizes as $sizeName) {
                    $sizeId = Size::firstOrCreate([
                        'name' => $sizeName
                    ]);
                    $a = $sizeId;
//                    Product_size
                    $product->productSizes()->sync([
                        'product_id' =>$product->id,
                        'size_id' => $sizeId->id
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Sửa Sản Phẩm Thành Công');
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Messages :' . $err->getMessage() . 'Line: ' . $err->getLine());
            return redirect()->back()->with('error', 'Sửa Sản Phẩm Thất Bại');
        }
    }


    public function destroy($id)
    {
        try {
            $product = $this->delete($id);
            return redirect()->back()->with('success', 'Xóa Sản Phẩm Thành Công');
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Messages :' . $err->getMessage() . 'Line: ' . $err->getLine());
            return redirect()->back()->with('error', 'Xóa Sản Phẩm Thất Bại');
        }
    }

    public function getProductApi($category_id)
    {
        return $this->model->where('category_id', $category_id)->limit(10)->get();
    }

    public function getProductHome()
    {
        return $this->model->search()->limit(10)->get();
    }
    public function getProductShop()
    {
        return $this->model->search()->orderBy('created_at', 'Desc')->paginate(12);
    }

    public  function getRelateProduct( $category_id)
    {
       return $this->model->where('category_id',$category_id)->get();
    }

    public function getProductComments($id)
    {
        return $this->model->find($id)->productComments;
    }
}
