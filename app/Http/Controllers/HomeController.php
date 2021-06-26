<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Company;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $customers = Customer::count();
        $orders = Order::count();
        $companies = Company::count();
        $users = User::count();
        return view('pages.home', compact('customers','orders','companies','users'));
    }
}
