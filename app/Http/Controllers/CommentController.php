<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Entities\Publication;
use App\Mail\MailComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Request $request){

        /* Validacion */
        $this->validate($request, [
            'content' => 'required',
            'publication_id'=> 'required',
        ]);
        /* obtenemos los datos de la publicacion */
        $Publicacion = Publication::with('user')->find($request->publication_id);
        /* registro de comentarios */
        $Comment = new Comment();
        $Comment->content = $request->content;
        $Comment->publication_id = $Publicacion->id;
        $Comment->status = 1;
        $Comment->user_id = auth()->id();
        $Comment->save();
        /* enviar un correo de comentario */
        $data = array(
            'correo'=>$Publicacion->user->email,
            'title'=>$Publicacion->title,
            'comment'=>$Comment->content,
            'fecha'=>$Comment->fecha,
        );
        Mail::to($data['correo'])->queue(
            new MailComment($data)
         );

        return back()->with('flash','Comentario guardado exitosamente');
    }
}
