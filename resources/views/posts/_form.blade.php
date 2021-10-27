<div>
    <div class="col-6">
        {!!Form::text('title', 'Título')->required()!!}
    </div>
    <div class="col-6">
        {!!Form::text('auxiliary_title', 'Título Auxiliar')->required()!!}
    </div>
    <div class="col-md-6">
        {!!Form::file('image', 'Imagem')->required()!!}
    </div>
    <div class="col-12">
        {!!Form::textarea('body', 'Corpo da Notícia')->required()!!}
    </div>
    <div class="col">
        {!!Form::submit("Salvar")->color('success')!!}
        {!!Form::reset("Limpar")->color('danger')!!}
        <a class="btn btn-primary" href="{{ route('posts.index') }}">Volta</a>
    </div>
</div>