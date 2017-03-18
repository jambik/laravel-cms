<div class="form-group">
    {!! Form::label('title', 'Заголовок слайда') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('text', 'Текст слайда') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'Url (ссылка)') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

@include('admin.partials._imageable')

<div class="form-group text-center">
    <button type="submit" class="btn btn-lg btn-primary"><i class="material-icons">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="text-center">
    <a href="{{ route('admin.slides.index') }}" class="btn btn-default">Отмена</a>
</div>