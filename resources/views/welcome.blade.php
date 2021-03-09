@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($Publications as $item)
            <div class="card my-2">
                <div class="card-body">
                    <h4 class="card-title">{{$item->title}}</h4>
                    <span class="text-muted"> <i class="fas fa-user-circle"></i> {{$item->user->name}} - {{$item->fecha}}</span>
                    <hr>
                    <p class="card-text">{!! $item->abstract.'...' !!}</p>
                    <a href="{{route('view', $item->id)}}" class="float-right"> <i class="fas fa-book-open"></i> ver mas</a>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        {{ $Publications->links() }}
    </div>
</div>
@endsection
