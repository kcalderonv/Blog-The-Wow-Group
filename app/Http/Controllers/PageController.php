<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Entities\Publication;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $Publications = Publication::orderBy('id','desc')->paginate(5);
        return view('welcome',['Publications'=>$Publications]);
    }

    public function view(Request $request)
    {
        $Publications = Publication::findOrFail($request->id);
        $Comments = Comment::where('publication_id',$Publications->id)->paginate(10);
        $Publicado = Comment::where(['publication_id'=>$Publications->id,'user_id'=>auth()->id()])->first();
        
        return view('publication.view',['Publications'=>$Publications,'Comments'=>$Comments,'Publicado'=>$Publicado]);
    }

}
