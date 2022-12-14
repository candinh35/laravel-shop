<?php

namespace App\repositories\banner;

use App\Models\Banner;
use App\repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    protected $path_image;
    public function getModel()
    {
        return Banner::class;
    }
    public function getBanner()
    {
       return $this->model->search()->paginate(5);
    }


    public function store($request)
    {
        try {
            DB::beginTransaction();
            $banners = [
                'name'=>$request->name,
                'path_link'=>$request->path_link,
                'description'=>$request->description,
                'status'=>$request->status,
            ];

            if ($request->hasFile('path_image')){
                upload_img('banner', $request);
                $banners['path_image'] = $request->input('path_image');
                $this->path_image = $request->input('path_image');
            }
            $this->model->create($banners);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Thành Công');
        }catch (\Exception $err){
            DB::rollBack();
            File::delete($this->path_image);
            Log::error('Messages :'.$err->getMessage() .'Line :'. $err->getLine());
            return redirect()->back()->with('error', 'Thêm Mới Tất Bại');
        }
    }

    public function edit($id, $request)
    {
        try {
            DB::beginTransaction();
            $banner = $this->find($id);
            $banners = [
                'name'=>$request->name,
                'path_link'=>$request->path_link,
                'description'=>$request->description,
                'status'=>$request->status,
            ];

            if ($request->hasFile('path_image')){
                upload_img('banner', $request);
                File::delete($banner->path_image);
                $banners['path_image'] = $request->input('path_image');
                $this->path_image = $request->input('path_image');
            }
            $banner->update($banners);
            DB::commit();
            return redirect()->back()->with('success', 'Sửa Mới Thành Công');
        }catch (\Exception $err){
            DB::rollBack();
            Log::error('Messages :'.$err->getMessage() .'Line :'. $err->getLine());
            return redirect()->back()->with('error', 'Sửa Mới Tất Bại');
        }
    }
}
