<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;
use App\Models\User;
use App\Models\Order;
use App\Exports\CustomersExport;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
        foreach($customers as $customer){
            $user_id = $customer->user_ids;
            $users = User::whereIn('_id',$user_id)->get();
            //dd($user);
        }
        
        //dd($user_id);
        return view('pages.customer.index',compact('customers','users'));
    }

    public function create()
    {
        $companies = Company::all();
        $users = User::all();
        $orders = Order::all();
        $classifys = array('Khách hàng mới','Khách hàng tiềm năng','Đã mua hàng');
        
        return view('pages.customer.create',compact('companies','users','classifys','orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|number|min:1',
            'gender' => 'required',
            'address' => 'required|string',
            'classify[]' => 'required',
            'company_id' => 'required',
            'job' => 'required',
            'user_ids[]' => 'required'
        ]);

        $customer=new Customer();
        $customer->name = $request->get('name');
        $customer->age = $request->get('age');
        $customer->gender = $request->get('gender');        
        $customer->address = $request->get('address');
        $customer->classify = $request->get('classify');
        $customer->company_id = $request->get('company_id');
        $customer->job = $request->get('job');
        $customer->user_ids = $request->get('user_ids');
        $customer->order_ids = $request->get('order_ids');
        $customer->save();
        return redirect('/customer')->with('success','Thêm khách hàng thành công');
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $order = $customer->order_ids;
        $orders = Order::whereIn('_id',$order)->paginate(1);
        $user_id = $customer->user_ids;
        $users = User::whereIn('_id',$user_id)->get();
        return view('pages.customer.show',compact('customer','orders','users'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $companies = Company::all();
        $classifys = array('Khách hàng mới','Khách hàng tiềm năng','Đã mua hàng');
        $users = User::all();
        $orders = Order::all();
        return view('pages.customer.update',compact('customer','id','classifys','companies','users','orders'));
    }
    
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->get('name');
        $customer->age = $request->get('age');
        $customer->gender = $request->get('gender');        
        $customer->address = $request->get('address');
        $customer->classify = $request->get('classify');
        $customer->company_id = $request->get('company_id');
        $customer->job = $request->get('job');
        $customer->user_ids = $request->get('user_ids');
        $customer->order_ids = $request->get('order_ids');
        $customer->save();
        return redirect('/customer')->with('success',"Cập nhật thông tin khách hàng thành công");
    }

    public function destroy($id)
    {
        $customer = Customer::destroy($id);
        return redirect('/customer')->with('success',"Xóa khách hàng thành công");
    }

    public function export() 
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
     
    public function import() 
    {
        Excel::import(new CustomersImport,request()->file('file'));
             
        return back();
    }
}

