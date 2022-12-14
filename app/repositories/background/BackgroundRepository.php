<?php

namespace App\repositories\background;

use App\Models\Background;
use App\repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BackgroundRepository extends BaseRepository implements BackgroundRepositoryInterface
{

    public function getModel()
    {
        return Background::class;
    }

    public function getBackground()
    {
       return $this->model->search()->paginate(5);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $backgrounds = [
                'name'=>$request->name,
                'status'=>$request->status
            ];
            if ($request->hasFile('path_image')){
                upload_img('background',$request);
                $backgrounds['path_image'] = $request->input('path_image');
            }
            $this->model->create($backgrounds);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Thành Công background');

        }catch (\Exception $err){
            Log::error('Message'. $err->getMessage(). 'Line :'. $err->getLine());
        }

    }

    public function edit($id, $request)
    {
        try {
            DB::beginTransaction();
            $background = $this->model->find($id);
            $backgrounds = [
                'name'=>$request->name,
                'status'=>$request->status
            ];
            if ($request->hasFile('path_image')){

                upload_img('background',$request);
                File::delete(public_path($background->path_image));
                $backgrounds['path_image'] = $request->input('path_image');
            }
            $background->update($backgrounds);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Thành Công background');

        }catch (\Exception $err){
            Log::error('Message'. $err->getMessage(). 'Line :'. $err->getLine());
        }
    }

//    lấy sản phẩn đỏ ra giao diện

    public function getBackgroundIndex()
    {
        return $this->model->where('status', 1)->limit(3)->get();
    }

    public function getBackgroundLate()
    {
        return $this->model->where('status', 1)->limit(5)->get();
    }
}
