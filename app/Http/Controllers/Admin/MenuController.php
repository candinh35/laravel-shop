<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuAddRequest;
use App\repositories\menu\MenuRepositoryInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    protected $menuRepo;
    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepo = $menuRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $menus = $this->menuRepo->getMenu();
        return view('admin.menu.index', [
            'model' => 'menu',
            'title' => 'menu   ',
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $menus = $this->menuRepo->getAdd();
        return view('admin.menu.add', [
            'model' => 'menu',
            'title' => 'menu',
            'menus'=>$menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MenuAddRequest $request)
    {
        if ($this->menuRepo->create($request->all())){
            return redirect()->back()->with('success', 'Tạo Mới Menu Thành Công');
        }

        return  redirect()->back()->with('error', 'Tạo Mới Menu Thất Bại');
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
            $menu = $this->menuRepo->find($id);
            $menus = $this->menuRepo->getEdit($menu->parent_id);
            return view('admin.menu.edit', [
                'model' => 'menu',
                'title' => 'menu',
                'menu'=>$menu,
                'menus'=>$menus
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
        if ($this->menuRepo->update($id,$request->all())){
            return redirect()->back()->with('success', 'Sửa Menu Thành Công');
        }

        return  redirect()->back()->with('error', 'Sửa Menu Thất Bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->menuRepo->checkChild($id)){
            $this->menuRepo->delete($id);
            return redirect()->back()->with('success', 'Xóa Menu Thành Công');
        }

        return  redirect()->back()->with('error', 'Xóa Menu Thất Bại Do Có Child');
    }
}
