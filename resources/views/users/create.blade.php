@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Cadastrar Usuário</h4>
                </div>

                <div class="card-body">
                    @include('includes.alert')

                    {!!Form::open()->method('post')->route('users.store')!!}
                        @include('users._form')
                    {!!Form::close()!!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection