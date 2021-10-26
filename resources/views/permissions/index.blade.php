@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Permissões</h4>
                    <a class="btn btn-success text-right" href="{{ route('permissions.create') }}">Nova Permissão</a>
                </div>
                <div class="card-body">
                    @include('includes.alert')
                    
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col" style="width: 150px">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('permissions.show', $item->id) }}">Ver</a>
                                        <a class="btn btn-primary" href="{{ route('permissions.edit', $item->id) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection