<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Prov;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $companies=Company::where([['name', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orWhere([['city', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orWhere([['location', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->simplePaginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function orderASC($i){ 
        $provinces=Prov::all();          
        $search = $i;
        $companies=Company::where([['name', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orWhere([['city', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orWhere([['location', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orderBY('name', 'ASC')
                            ->simplePaginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function orderDESC($i){ 
        $provinces=Prov::all();          
        $search = $i;
        $companies=Company::where([['name', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orWhere([['city', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orWhere([['location', 'LIKE', "%$search%"],['total', '<>', '']])
                            ->orderBY('name', 'DESC')
                            ->simplePaginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function busquedavaloracion($i){ 
        $provinces=Prov::all();                    
        $search = $i;
        $companies=DB::table('companies')
                    -> where ('total','>=', $i)
                    -> whereNotNull('total')
                    -> simplePaginate(6);
        return view('search', compact('companies'))-> with ([
            'provinces'=>$provinces,
            'search'=>$search,
        ]);            
    }

    public function welcome(){    
        $companies=DB::table('companies')
                        -> whereNotNull('total')
                        -> orderBy('total', 'desc')
                        -> limit (3)
                        -> get();
            
        $companiesbad=DB::table('companies')
                        -> whereNotNull('total')
                        -> orderBy('total', 'asc')
                        -> limit (3)
                        -> get();

        $companieslast=DB::table('companies')
                        -> whereNotNull('total')
                        -> orderBy('created_at', 'desc')
                        -> limit (6)
                        -> get();
        
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
                        ->simplePaginate(4);
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
        $date = today();     
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
        $newcompanie -> created_at = $date;
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

        public function comentvalidate($id,$comid){ 
            $mytime = Carbon::now();
            $comments=DB::table('comments')
                        ->where('id','=', $id)
                        ->update(array('validate'=>1));
            $comments=DB::table('comments')
                        ->where('id','=', $id)
                        ->update(['updated_at'=> $mytime]);                          
            $companytotal=DB::table('companies')
                        ->join('comments', "companies.id", "=", 'comments.idcomp')
                        ->where('companies.id','=', $comid)
                        ->where('comments.validate','=', 1)
                        ->avg('comments.total');                         
            $companyup=DB::table('companies')
                        ->where('id','=', $comid)
                        ->update(['total'=> $companytotal]);            
            return redirect('administrar'); 
        }

        public function comentborrado($id){  
            $comments=DB::table('comments')
                        ->where('id', $id)
                        ->delete();
            return redirect('administrar'); 
        }
}
