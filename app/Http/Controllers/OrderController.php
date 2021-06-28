<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Imports\OrdersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ImportRequest;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.order.index',compact('orders'));
    }

    public function create()
    {
        return view('pages.order.create');
    }

    public function store(OrderRequest $request)
    {
        $order = new Order();
        $order->name = $request->get('name');
        $order->total_price = $request->get('total_price');
        $order->save();
        return redirect('/order')->with('success','Thêm đơn hàng thành công');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('pages.order.update',compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->name = $request->get('name');
        $order->total_price = $request->get('total_price');
        $order->save();
        return redirect('/order')->with('success','Cập nhật đơn hàng thành công');
    }

    public function destroy($id)
    {
        $order = Order::destroy($id);
        return redirect('/order')->with('success',"Xóa đơn hàng thành công");
    }

    public function importExportView()
    {
       return view('pages.order.importExport');
    }
     
    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
     
    public function import(ImportRequest $request) 
    {
       $import = Excel::import(new OrdersImport,request()->file('file'));
       $import = new OrdersImport;
        Excel::import($import, request()->file('file'));
        if(isset($import)){
            return redirect('/order')->with('success','Import danh sách đơn hàng thành công');
        }else{
            return back()->with('error','Import thất bại');
        }
        
    }
}
