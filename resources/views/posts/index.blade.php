@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Post</h4>
                    <a class="btn btn-success text-right" href="{{ route('posts.create') }}">Novo Post</a>
                </div>
                <div class="card-body">
                    @include('includes.alert')
                    
                    @foreach ($data as $item)
                        <div class="card mb-3">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->auxiliary_title }}</p>
                            <p class="card-text">{{ $item->body }}</p>
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