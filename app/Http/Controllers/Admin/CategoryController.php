<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAddRequest;
use App\repositories\category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepo->getCategory();
        return view('admin.category.index', [
            'model' => 'category',
            'title' => 'category   ',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepo->getAdd();
        return view('admin.category.add', [
            'model' => 'category',
            'title' => 'category',
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryAddRequest $request)
    {
        if ($this->categoryRepo->create($request->all())){
            return redirect()->back()->with('success', 'Tạo Mới Danh Mục Thành Công');
        }

        return  redirect()->back()->with('error', 'Tạo Mới Danh Mục Thất Bại');
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
            $category = $this->categoryRepo->find($id);
            $categories = $this->categoryRepo->getEdit($category->parent_id, '');
            return view('admin.category.edit', [
                'model' => 'category',
                'title' => 'category',
                'category'=>$category,
                'categories'=>$categories
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
        if ($this->categoryRepo->update($id,$request->all())){
            return redirect()->back()->with('success', 'Sửa Danh Mục Thành Công');
        }

        return  redirect()->back()->with('error', 'Sửa Danh Mục Thất Bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->categoryRepo->delete($id)){
            return redirect()->back()->with('success', 'Xóa Danh Mục Thành Công');
        }

        return  redirect()->back()->with('error', 'Xóa Danh Mục Thất Bại');
    }
}
