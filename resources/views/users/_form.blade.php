<div class="row">
    <div class="col-6">
        {!!Form::text('name', 'Nome')->required()!!}
    </div>
    <div class="col-6">
        {!!Form::text('email', 'Email')->type('email')->required()!!}
    </div>
    <div class="col-6">
        {!!Form::text('password', 'Senha')->required()!!}
    </div>
    <div class="col-6">
        {!!Form::select('roles_id', 'Tipo', [2 => 'Usuário', 1 => 'Administrador'])->required()!!}
    </div>
    <div class="col">
        {!!Form::submit("Salvar")->color('success')!!}
        {!!Form::reset("Limpar")->color('danger')!!}
        <a class="btn btn-primary" href="{{ route('users.index') }}">Volta</a>
    </div>
</div>