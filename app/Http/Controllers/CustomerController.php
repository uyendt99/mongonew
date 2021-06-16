<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('pages.customer.index',compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $users = User::all();
        $classifys = array('Khách hàng mới','Khách hàng tiềm năng','Đã mua hàng');
        
        return view('pages.customer.create',compact('companies','users','classifys'));
    }

    public function store(Request $request)
    {
        $customer=new Customer();
        $customer->name = $request->get('name');
        $customer->age = $request->get('age');
        $customer->gender = $request->get('gender');        
        $customer->address = $request->get('address');
        $customer->classify = $request->get('classify');
        $customer->company_id = $request->get('company_id');
        $customer->job = $request->get('job');
        $customer->user_ids = $request->get('user_ids');
        $customer->save();
        return redirect('/customer');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $companies = Company::all();
        $classifys = array('Khách hàng mới','Khách hàng tiềm năng','Đã mua hàng');
        $users = User::all();
        return view('pages.customer.update',compact('customer','id','classifys','companies','users'));
    }

    public function destroy($id)
    {
        $customer = Customer::destroy($id);
        dd($id);
        return Response::json($customer);
    }
}

