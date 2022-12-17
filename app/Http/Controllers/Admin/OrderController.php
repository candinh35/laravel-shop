<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\repositories\order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{



    protected $orderRepo;
    private string $model = 'order';
    private string $title = 'order';

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepo = $orderRepository;
    }
//  in ra file PDF
     public function print_order($checkout_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code)
    {
        $order = $this->orderRepo->find($checkout_code);
        return view('admin.order.bill',compact('order'));
    }

//    cạp nhật Status

    public function updateStatus($id,$status)
    {
     return  $this->orderRepo->find($id)->update(['status'=>$status]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = $this->orderRepo->getOrder();
        return view('admin.order.index',[
           'model'=>$this->model,
           'title'=>$this->title,
            'orders'=>$orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $order = $this->orderRepo->find($id);
        return view('admin.order.show', [
           'model'=>$this->model,
           'title'=>$this->title,
           'order'=>$order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $order = $this->orderRepo->find($id);
        return view('admin.order.edit', [
            'model'=>$this->model,
            'title'=>$this->title,
            'order'=>$order,
        ]);
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
        $this->orderRepo->update($id, $request->all());

        return back()->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
