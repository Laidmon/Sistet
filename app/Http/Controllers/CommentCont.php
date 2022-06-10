<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Prov;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentCont extends Controller
{
    public function insertarcomentario(Request $request){
        $comentario = new Comment;
        $comentario -> title = $request->comTitle;
        $comentario -> salarie = $request->salarie;
        $comentario -> equality = $request->equal;
        $comentario -> value = $request->values;
        $comentario -> comments = $request->comment;
        $comentario -> idcomp = (int) $request->comid;
        $comentario -> iduser = (int) $request->usid;    
        $comentario -> total = ((int)$request->values + (int) $request->salarie + (int)$request->equal) / 3;
         $comentario -> save();    
        return redirect('/');
    }
}
