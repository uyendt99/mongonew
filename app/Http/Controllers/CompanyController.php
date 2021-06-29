<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();
        return view('pages.company.index',compact('companies'));
    }

    public function create()
    {
       return view('pages.company.create');
    }
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->get('name');
        $company->save();
        return redirect('/company');
    }
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('pages.company.update',compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->get('name');
        $company->update();
        return redirect('/company')->with('success','Cập nhật công ty thành công');
    }
    
    public function destroy($id)
    {
        $company = Company::destroy($id);
        return redirect('/company')->with('success', "Xóa công ty thành công");
    }
}
