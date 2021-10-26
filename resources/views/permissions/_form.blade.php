<div>
    <div class="col-5">
        {!!Form::text('name', 'Nome')->required()!!}
    </div>
    <div class="col-5">
        {!!Form::text('description', 'Descrição')->required()!!}
    </div>
    <div class="col">
        {!!Form::submit("Salvar")->color('success')!!}
        {!!Form::reset("Limpar")->color('danger')!!}
        <a class="btn btn-primary" href="{{ route('permissions.index') }}">Volta</a>
    </div>
</div>