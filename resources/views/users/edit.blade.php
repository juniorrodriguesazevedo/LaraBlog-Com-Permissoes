@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Usuário</h4>
                </div>

                <div class="card-body">
                    @include('includes.alert')

                    {!!Form::open()->fill($data)->method('put')->route('users.update', [$data->id])!!}
                        @include('users._form')
                    {!!Form::close()!!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection