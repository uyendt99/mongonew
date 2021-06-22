<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Imports\OrdersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::paginate(5);
        return view('pages.order.index',compact('orders'));
    }

    public function create()
    {
        return view('pages.order.create');
    }

    public function store(Request $request)
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
       return view('import');
    }
     
    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
     
    public function import() 
    {
        Excel::import(new OrdersImport,request()->file('file'));
           
        return back();
    }
}
