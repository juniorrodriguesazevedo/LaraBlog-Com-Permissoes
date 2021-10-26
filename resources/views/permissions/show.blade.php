@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Visualizando Permissão</h4>
                </div>
                <div class="card-body">
                    
                    <b>Nome: </b> {{ $data->name }} <br>
                    <b>Descrição: </b> {{ $data->description }} <br><br>

                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar com grupos de botões">
                        <div class="btn-group mr-2" role="group" aria-label="Primeiro grupo">
                            {!!Form::open()->method('delete')->route('permissions.destroy', [$data->id])!!}
                                {!!Form::submit("Apagar")->color('danger')!!}
                            {!!Form::close()!!}
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Segundo grupo">
                            <a class="btn btn-primary" href="{{ route('permissions.index') }}">Volta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection