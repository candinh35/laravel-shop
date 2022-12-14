<?php

namespace App\repositories\brand;

use App\Models\Brand;
use App\repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{

    public function getModel()
    {
        return Brand::class;
    }

    public function getBrand()
    {
       return $this->model->search()->paginate(5);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $brands = [
                'name'=>$request->name,
                'status'=>$request->status
            ];
            if ($request->hasFile('path_image')){
                upload_img('brand',$request);
                $brands['path_image'] = $request->input('path_image');
            }
            $this->model->create($brands);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Thành Công Brand');

        }catch (\Exception $err){
            Log::error('Message'. $err->getMessage(). 'Line :'. $err->getLine());
        }

    }

    public function edit($id, $request)
    {
        try {
            DB::beginTransaction();
            $brand = $this->model->find($id);
            $brands = [
                'name'=>$request->name,
                'status'=>$request->status
            ];
            if ($request->hasFile('path_image')){

                upload_img('brand',$request);
                File::delete(public_path($brand->path_image));
                $brands['path_image'] = $request->input('path_image');
            }
            $brand->update($brands);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Thành Công Brand');

        }catch (\Exception $err){
            Log::error('Message'. $err->getMessage(). 'Line :'. $err->getLine());
        }
    }

//    lấy sản phẩn đỏ ra giao diện

    public function getBrandIndex()
    {
        return $this->model->where('status', 1)->limit(3)->get();
    }

    public function getBrandLate()
    {
        return $this->model->where('status', 1)->limit(5)->get();
    }
}
