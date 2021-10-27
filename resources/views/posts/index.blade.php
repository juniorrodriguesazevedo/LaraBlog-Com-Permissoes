@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Post</h4>
                    @can('post_create')
                        <a class="btn btn-success text-right" href="{{ route('posts.create') }}">Novo Post</a>
                    @endcan
                </div>
                <div class="card-body">
                    @include('includes.alert')
                    
                    @foreach ($data as $item)
                        <div class="card mb-3">
                            <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 450px">
                            <div class="card-body">
                                <h1 class="card-title">{{ $item->title }}</h1>
                                <h5 class="card-text">{{ $item->auxiliary_title }}</h5>

                                <a class="btn btn-success" href="{{ route('posts.show', $item->id) }}">Ver Completo</a>
                                @can('post_edit')
                                    <a class="btn btn-primary" href="{{ route('posts.edit', $item->id) }}">Editar</a>
                                @endcan
                            </div>
                        </div>
                    @endforeach

                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection