<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Model\Company;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $a = Customer::with('company','orders','users')->get();
        foreach($a as $b){
            $c = $b->company->name;
            $d = $b->users->username;
            foreach($d as $i){
                dd($i);
                $e = $i->users->username;
                dd($e);
            }
            //dd($d);
        }

        //dd(Customer::all()->toArray());
        return Customer::all();
    }
}
