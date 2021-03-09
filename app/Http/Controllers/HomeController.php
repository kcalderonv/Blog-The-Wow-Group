<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Entities\Publication;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Publications = Publication::with('comment')->where('user_id',auth()->id())->orderBy('id','desc')->paginate(5);
        return view('home',['publications'=>$Publications]);
    }

    public function create(Request $request)
    {
        if($request->id>0){
            /* modificar solo sus publicaciones */
            $Publication = Publication::where('user_id',auth()->id())->findOrFail($request->id);
        }else{
            $Publication = new Publication();
        }
        return view('publication.create',['publication'=>$Publication]);
    }

    public function store(Request $request)
    {
        /* Validacion */
        $this->validate($request, [
            'title' => 'required|min:3',
            'content'=> 'required|min:3',
        ]);

        if(empty($request->id)){
            /* Grabar  */
            $publication = new Publication();
            $publication->title = $request->title;
            $publication->content = $request->content;
            $publication->user_id = auth()->id();
            $publication->save();
            return redirect()->route('menu.index')->with('flash','Publicación guardado exitosamente');
        }else{
            $publication = Publication::find($request->id);
            $publication->title = $request->title;
            $publication->content = $request->content;
            $publication->user_id = auth()->id();
            $publication->save();
            return redirect()->route('menu.index')->with('flash','Publicación modificado exitosamente');
        }

       /* volver */

    }
}
