<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\repositories\background\BackgroundRepositoryInterface;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    protected $backgroundRepo;

    public function __construct(BackgroundRepositoryInterface $backgroundRepository)
    {
        $this->backgroundRepo = $backgroundRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $backgrounds = $this->backgroundRepo->getBackground();
        return view('admin.background.index', [
            'model' => 'background',
            'title' => 'background',
            'backgrounds' => $backgrounds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.background.add', [
            'model' => 'background',
            'title' => 'background',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        return $this->backgroundRepo->store($request);

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
        if (is_numeric($id) ){
            $background = $this->backgroundRepo->find($id);
            return view('admin.background.edit', [
                'model' => 'background',
                'title' => 'background',
                'background'=>$background,
            ]);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        return $this->backgroundRepo->edit($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->backgroundRepo->delete($id)){

            return redirect()->back()->with('success', 'Xóa background Thành Công');
        }

        return  redirect()->back()->with('error', 'Xóa background Thất Bại ');
    }
}
