<div class="form-group">
    {!! Form::label('name', 'Описание') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('order', 'Порядок') !!}
    {!! Form::text('order', null, ['class' => 'form-control']) !!}
</div>

<div class="col s12">
    <img src="/images/medium/{{ $item->img_url.$item->image }}" alt="" />
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-lg btn-primary"><i class="material-icons">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="text-center">
    <a href="{{ route('admin.photos.index') }}" class="btn btn-default">Отмена</a>
</div>