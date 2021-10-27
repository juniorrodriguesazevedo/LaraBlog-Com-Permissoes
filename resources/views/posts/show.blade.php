@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Visualizando Post</h4>
                </div>
                <div class="card-body">
                    
                    <div class="card mb-3">
                        <img src="{{ Storage::url($data->image) }}" class="card-img-top" alt="{{ $data->name }}" style="height: 450px">
                        <div class="card-body">
                            <h1 class="card-title">{{ $data->title }}</h1>
                            <h5 class="card-text">{{ $data->auxiliary_title }}</h5>
                            <p class="card-text">{{ $data->body }}</p>

                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar com grupos de botões">
                                @can('post_delete')
                                    <div class="btn-group mr-2" role="group" aria-label="Primeiro grupo">
                                        {!!Form::open()->method('delete')->route('posts.destroy', [$data->id])!!}
                                            {!!Form::submit("Deletar")->color('danger')!!}
                                        {!!Form::close()!!}
                                    </div>
                                @endcan
                                @can('post_edit')
                                    <div class="btn-group mr-2" role="group" aria-label="Segundo grupo">
                                        <a class="btn btn-success" href="{{ route('posts.edit', $data->id) }}">Editar</a>
                                    </div>
                                @endcan
                                <div class="btn-group mr-2" role="group" aria-label="Segundo grupo">
                                    <a class="btn btn-primary" href="{{ route('posts.index') }}">Volta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection