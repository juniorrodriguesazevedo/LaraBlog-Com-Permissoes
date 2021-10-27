@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Criar Post</h4>
                </div>
                <div class="card-body">
                    @include('includes.alert')

                    {!!Form::open()->method('post')->multipart()->route('posts.store')!!}
                        @include('posts._form')
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection