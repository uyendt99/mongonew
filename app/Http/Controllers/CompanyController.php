<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $companies = Company::all();
        return view('pages.company.index',compact('companies'));
    }

    public function create()
    {
       return view('pages.company.create');
    }
    public function store(Request $request)
    {
        $order = new Company();
        $order->name = $request->get('name');
        $order->save();
        return redirect('/company');
    }
    public function edit($id)
    {

    }
    
    public function destroy($id)
    {
        $company = Company::destroy($id);
        return redirect('/company')->with('success', "Xóa công ty thành công");
    }
}
