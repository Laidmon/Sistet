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

    public function comdes($id){
        echo json_encode(DB::table('companies')->
        where('id',$id)->get());
    }
    public function listLocations($name){
        echo json_encode(DB::table('companies')->select('location')->distinct()->
        where('city',$name)->get());
    }



    public function buscar(Request $request){ 
        $provinces=Prov::all();          
        $search = $request->buscar;
        $companies=Company::where('name', 'LIKE', "%$search%")
                            ->orWhere('city', 'LIKE', "%$search%")
                            ->orWhere('location', 'LIKE', "%$search%")
                            ->paginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function orderASC($i){ 
        $provinces=Prov::all();          
        $search = $i;
        $companies=Company::where('name', 'LIKE', "%$search%")
                            ->orWhere('city', 'LIKE', "%$search%")
                            ->orWhere('location', 'LIKE', "%$search%")
                            ->orderBY('name', 'ASC')
                            ->paginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function orderDESC($i){ 
        $provinces=Prov::all();          
        $search = $i;
        $companies=Company::where('name', 'LIKE', "%$search%")
                            ->orWhere('city', 'LIKE', "%$search%")
                            ->orWhere('location', 'LIKE', "%$search%")
                            ->orderBY('name', 'DESC')
                            ->paginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function busquedavaloracion($i){ 
        $provinces=Prov::all();
        $search = $i;           
        $companies=DB::select("select companies.id AS id, companies.name AS name, companies.description AS description, 
        AVG(comments.total) AS total 
        from companies 
        join comments on companies.id = comments.idcomp 
        where comments.salarie >= $i
        group by companies.name, companies.id, companies.description
        LIMIT 3")
        ->paginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function welcome(){    
        $companies=DB::select("select companies.id AS comid, companies.name AS comname, companies.description AS comdes, 
        AVG(comments.total) AS comtot 
        from companies 
        join comments on companies.id = comments.idcomp 
        where comments.validate = 1
        group by companies.name, companies.id, companies.description         
        order by AVG(comments.total) DESC
        LIMIT 3");
            
        $companiesbad=DB::select("select companies.id AS comid, companies.name AS comname, companies.description AS comdes, 
        AVG(comments.total) AS comtot 
        from companies 
        join comments on companies.id = comments.idcomp 
        where comments.validate = 1
        group by companies.name, companies.id, companies.description         
        order by AVG(comments.total) ASC
        LIMIT 3");

        $companieslast=DB::select("select companies.id AS comid, companies.name AS comname, companies.description AS comdes, 
        AVG(comments.total) AS comtot 
        from companies 
        join comments on companies.id = comments.idcomp 
        where comments.validate = 1
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
                        ->where('validate', '=', 1)
                        ->paginate(4);
        return view('empresa')-> with ([        
        'companies'=>$companies,
        'comments'=>$comments
    ]); 
    }

    public function nuevaemp(){            
        $types=DB::select("select DISTINCT type from companies");          
        $companies=Company::all();                  
        $provinces=Prov::all();
        return view('newcmpy')-> with ([
            'companies'=>$companies,
            'types'=>$types,
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
        public function empresaselect(Request $request){        
            $companies=Company::where('id', '=', $request->comp)->get(); 
            return view('newcom')-> with ([        
                'companies'=>$companies
            ]); 
            }

        public function validarcomentarios(){  
            $comments=Comment::where('validate', '=', 0)
                            ->paginate(4);
            return view('admin')-> with ([
            'comments'=>$comments
        ]); 
        }

        public function comentvalidate($id){  
            $comments=DB::table('comments')
                        ->where('id', $id)
                        ->update(array('validate'=>1));
            return redirect('administrar'); 
        }

        public function comentborrado($id){  
            $comments=DB::table('comments')
                        ->where('id', $id)
                        ->delete();
            return redirect('administrar'); 
        }
}
