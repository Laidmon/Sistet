<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Comment;

class CompanyList extends Controller
{
    public function list(){            
        $companies=Company::all();
        return view('select')-> with ([
            'companies'=>$companies,
        ]);        
    }

    public function welcome(){            
        $companies=Company::all();
        return view('welcome')-> with ([
            'companies'=>$companies,
        ]);        
    }
}
