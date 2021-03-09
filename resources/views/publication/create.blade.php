@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h3>Formulario Publicaciones</h3>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('menu.store')}}" method="post" autocomplete="off">
                        @csrf
                        <input type="hidden" name="id" value="{{$publication->id}}">
                        <div class="form-group">
                          <label for="title">Titulo</label>
                          <input type="text" class="form-control" name="title" id="title" required maxlength="199" value="{{ old('title',$publication->title) }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Detalle</label>
                            <input id="x" type="hidden" name="content" id="content" value="{{ old('content',$publication->content) }}">
                            <trix-editor input="x"></trix-editor>
                        </div>
                        @if ($publication->id>0)
                        <button type="submit" class="btn btn-warning float-right"><i class="fas fa-pencil-alt"></i> Modificar</button>
                        @else
                        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Guardar</button>
                        @endif
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('menu.index')}}" class="btn btn-primary"> <i class="fas fa-arrow-left    "></i> volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
