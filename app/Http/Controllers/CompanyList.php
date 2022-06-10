<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Prov;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CompanyList extends Controller
{
    public function list(){            
        $companies=Company::all();
        return view('select')-> with ([
            'companies'=>$companies,
        ]);        
    }

    public function buscar(Request $request){            
        $companies=Company::orderBy('name')
                            ->paginate(3);
        return view('search', compact('companies'));        
    }



    public function welcome(){    
        $companies=DB::select("select companies.id AS comid, companies.name AS comname, companies.description AS comdes, 
        AVG(comments.total) AS comtot 
        from companies 
        join comments on companies.id = comments.idcomp 
        group by companies.name, companies.id, companies.description         
        order by AVG(comments.total) DESC
        LIMIT 3");
            
        $companiesbad=DB::select("select companies.id AS comid, companies.name AS comname, companies.description AS comdes, 
        AVG(comments.total) AS comtot 
        from companies 
        join comments on companies.id = comments.idcomp 
        group by companies.name, companies.id, companies.description         
        order by AVG(comments.total) ASC
        LIMIT 3");

        $companieslast=DB::select("select companies.id AS comid, companies.name AS comname, companies.description AS comdes, 
        AVG(comments.total) AS comtot 
        from companies 
        join comments on companies.id = comments.idcomp 
        group by companies.name, companies.id, companies.description         
        order by AVG(companies.created_at) DESC
        LIMIT 6");
        
        return view('welcome')-> with ([
            'companies'=>$companies,
            'companiesbad'=>$companiesbad,
            'companieslast'=>$companieslast,
        ]);        
    }

    public function detalle($i){  
        $companies=Company::where('id', '=', $i)->get();
        $comments=Comment::where('idcomp', '=', $i)
                        ->paginate(4);
        return view('empresa')-> with ([        
        'companies'=>$companies,
        'comments'=>$comments
    ]); 
    }

    public function nuevaemp(){            
        $companies=Company::all();            
        $provinces=Prov::all();
        return view('newcmpy')-> with ([
            'companies'=>$companies,
            'provinces'=>$provinces
        ]);        
    }

    public function insertarempresa(Request $request){        
        $newcompanie = new Company;
        if ($request->filled('newlocat')){
            $newcompanie -> location = $request->newlocat;
        }else{            
            $newcompanie -> location = $request->locat;
        }
        if ($request->filled('newtype')){ 
            $newcompanie -> type = $request->newtype;  
        }else{         
            $newcompanie -> type = $request->type;
        }
        $newcompanie -> name = $request->namep;
        $newcompanie -> city = $request->prov;
        $newcompanie -> description = $request->descrip;
        $newcompanie -> save();                
        $companies=Company::where('name', '=', $newcompanie -> name)->get(); 
        return view('newcom')-> with ([        
            'companies'=>$companies
        ]); 
        }
}
