<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\repositories\customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerRepo;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customers = $this->customerRepo->getcustomer();

        return view('admin.customer.index', [
            'model' => 'customer',
            'title' => 'customer',
            'customers' => $customers,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.customer.add', [
            'model' => 'customer',
            'title' => 'customer',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        return  $this->customerRepo->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $customer = $this->customerRepo->find($id);
        return view('admin.customer.show', [
            'model' => 'customer',
            'title' => 'customer',
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $customer = $this->customerRepo->find($id);
        return view('admin.customer.edit', [
            'model' => 'customer',
            'title' => 'customer',
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        return $this->customerRepo->edit($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->customerRepo->delete($id)) {
            return redirect()->back()->with('success', 'Xóa Thành Công');
        }
    }

}
