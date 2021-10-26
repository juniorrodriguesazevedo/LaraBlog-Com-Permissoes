@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Editando Permissão: {{ $data->name }}</h4>
                </div>
                <div class="card-body">
                    @include('includes.alert')

                    {!!Form::open()->fill($data)->method('put')->route('permissions.update', [$data->id])!!}
                        @include('permissions._form')
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection