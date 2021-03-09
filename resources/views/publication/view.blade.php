@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 my-2">
            <div class="card my-2">
                <div class="card-body">
                    <h4 class="card-title">{{$Publications->title}}</h4>
                    <span class="text-muted"> <i class="fas fa-user-circle"></i> {{$Publications->user->name}} - {{$Publications->fecha}}</span>
                    <hr>
                    <p class="card-text">{!! $Publications->content !!}</p>
                @auth
                    @if (empty($Publicado))
                    <form method="post" action="{{route('comment.store')}}">
                        @csrf
                        <input type="hidden" name="publication_id" value="{{$Publications->id}}">
                        <div class="form-group">
                            <textarea class="form-control" name="content" id="content" rows="5" required placeholder="Ingrese su comentario"></textarea>
                            <span class="text-muted">Solo puede ingresar un solo comentario</span>
                        </div>
                        <button type="submit" class="float-right btn btn-secondary" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </form>
                    @endif
                @endauth
                    <a href="{{route('index')}}" class=""> <i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h3>Comentarios</h3>
            <div class="row">
            @foreach ($Comments as $item)
                <div class="col-12 col-md-6 my-2">
                    <div class="card p-1">
                        <div class="card-body p-2">
                            <span class="text-muted"> <i class="fas fa-user-alt"></i> {{$item->user->name}} - {{$item->fecha}}</span>
                            <p class="card-text">{{$item->content}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            {{ $Comments->links() }}
        </div>

    </div>
</div>
@endsection
