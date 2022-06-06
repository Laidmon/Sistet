<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyList extends Controller
{
    public function list(){
            
        $companies=Company::all();
        return view('select')-> with ([
            'companies'=>$companies,
        ]);        
    }
}
