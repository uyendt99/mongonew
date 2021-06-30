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
use App\Http\Requests\CustomerRequest;
use Auth;
use App\Http\Requests\ImportRequest;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        foreach(Auth::user()->roles as $role){
            foreach($role->permissions as $per){
                if($per->name == 'read_customer_for_user'){
                    $customers = Customer::with('company')->whereHas('users', function($q){
                        $q->where('_id', Auth::user()->id);
                    })->orderBy('created_at', 'desc')->get();
                }else{
                    $customers = Customer::with('company')->orderBy('created_at', 'desc')->get();
                }
            }
            
        }
        
        return view('pages.customer.index',compact('customers'));
    }
    public function create()
    {
        $companies = Company::all();
        $users = User::all();
        $orders = Order::all();
        $classifys = array('Khách hàng mới','Khách hàng tiềm năng','Đã mua hàng');

        return view('pages.customer.create',compact('companies','users','classifys','orders'));
    }

    public function store(CustomerRequest $request)
    {
        $user_ids = $request->get('user_ids');
        $order_ids = $request->get('order_ids');
        $customer=new Customer();
        $customer->name = $request->get('name');
        $customer->age = $request->get('age');
        $customer->phone = $request->get('phone');
        $customer->email = $request->get('email');
        $customer->gender = $request->get('gender');
        $customer->address = $request->get('address');
        $customer->classify = $request->get('classify');
        $customer->company_id = $request->get('company_id');
        $customer->job = $request->get('job');
        $customer->save();
        $customer->users()->attach($user_ids);
        $customer->orders()->attach($order_ids);
        return redirect('/customer')->with('success','Thêm khách hàng thành công');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $order = $customer->order_ids;
        $orders = Order::whereIn('_id',$order)->paginate(1);
        $user_id = $customer->user_ids;
        $users = User::whereIn('_id',$user_id)->get();
        return view('pages.customer.show',compact('customer','orders','users'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $companies = Company::all();
        $classifys = array('Khách hàng mới','Khách hàng tiềm năng','Đã mua hàng');
        $users = User::all();
        $orders = Order::all();
        return view('pages.customer.update',compact('customer','id','classifys','companies','users','orders'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->get('name');
        $customer->age = $request->get('age');
        $customer->gender = $request->get('gender');
        $customer->phone = $request->get('phone');
        $customer->email = $request->get('email');
        $customer->address = $request->get('address');
        $customer->classify = $request->get('classify');
        $customer->company_id = $request->get('company_id');
        $customer->job = $request->get('job');
        $customer->users()->detach($customer->user_ids);
        $customer->orders()->detach($customer->order_ids);
        $customer->users()->attach($request->get('user_ids'));
        $customer->orders()->attach($request->get('order_ids'));
        $customer->update();
        
        return redirect('/customer')->with('success',"Cập nhật thông tin khách hàng thành công");
    }

    public function destroy($id)
    {
        $customer = Customer::destroy($id);
        return redirect('/customer')->with('success',"Xóa khách hàng thành công");
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Customer::whereIn('_id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);
    }

    public function export(Request $request)
    {
        $ids = $request->ids;
        $idsArr = explode(",",$ids);
        if(isset($ids)){
           $export =  Excel::download(new CustomersExport($idsArr), 'customers.xlsx');
        }else{
            return Excel::download(new CustomersExport, 'customers.xlsx');
        }
    }

    public function import(ImportRequest $request)
    {
        $import = Excel::import(new CustomersImport,request()->file('file'));
        if(isset($import)){
            return redirect('/customer')->with('success','Import danh sách khách hàng thành công');
        }else{
            return back()->with('error','Import thất bại');
        }
    }
}

