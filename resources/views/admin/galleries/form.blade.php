<div class="form-group">
    {!! Form::label('name', 'Название') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

@if (isset($item))
    <div class="form-group">
        {!! Form::label('slug', 'Alias') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        <small>alias для красивого отображения url</small>
    </div>
@endif

<div class="form-group">
    {!! Form::label('text', 'Описание фотогалереи') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

@include('admin.partials._imageable')

@include('admin.partials._headerable')

<div class="form-group text-center">
    <button type="submit" class="btn btn-lg btn-primary"><i class="material-icons">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="text-center">
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-default">Отмена</a>
</div>