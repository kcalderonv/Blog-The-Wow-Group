@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h3>Mis Publicaciones</h3>
                <a href="{{ route('menu.create')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> agregar</a>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Coments</th>
                                <th>Fecha Registro</th>
                                <th>Ver</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ count($item->comment) }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><a  href="{{route('view', $item->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye    "></i></a> </td>
                                <td><a  href="{{route('menu.create', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $publications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
