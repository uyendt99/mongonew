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

    public function edit($id)
    {

    }
    
    public function destroy($id)
    {
        
    }
}
