<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerAddRequest;
use App\repositories\banner\BannerRepositoryInterface;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    protected $bannerRepo;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepo = $bannerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $banners = $this->bannerRepo->getBanner();

        return view('admin.banner.index',[
            'model' => 'banner',
            'title' => 'banner',
            'banners'=>$banners
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.banner.add',[
            'model' => 'banner',
            'title' => 'banner',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BannerAddRequest $request)
    {
        return $this->bannerRepo->store($request);

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $banner = $this->bannerRepo->find($id);
        return view('admin.banner.edit',[
            'model' => 'banner',
            'title' => 'banner',
            'banner'=>$banner
        ]);
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
        return $this->bannerRepo->edit($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->bannerRepo->delete($id)){
            return redirect()->back()->with('success', 'Xóa Thành Công');
        }
        return redirect()->back()->with('error', 'Xóa Thất Bại');
    }
}
