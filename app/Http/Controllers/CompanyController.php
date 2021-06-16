<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('pages.company.index',compact('companies'));
    }

    public function create()
    {
        $company = Company::create($request->all());
        dd($company);
        return Response::json($company);
    }
    public function edit($id)
    {

    }
    
    public function destroy($id)
    {
        $company = Link::destroy($id);
        dd($id);
        return Response::json($company);
    }
}
