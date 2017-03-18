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

<div class="form-group input-html">
    {!! Form::label('text', 'Текст статьи') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group input-tags">
    {!! Form::label('tags', 'Теги') !!}
    {!! Form::text('tags', isset($item) ? $item->tags_string : null, ['class' => '']) !!}
</div>

@include('admin.partials._headerable')

<div class="form-group text-center">
    <button type="submit" class="btn btn-lg btn-primary"><i class="material-icons">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="text-center">
    <a href="{{ route('admin.articles.index') }}" class="btn btn-default">Отмена</a>
</div>

@section('footer_scripts')
    <script>
        var tags = [@foreach ($tags as $tag) {tag: "{{$tag}}" }, @endforeach];
        $(document).ready(function() {
            $('#tags').selectize({
                delimiter: ',',
                persist: false,
                valueField: 'tag',
                labelField: 'tag',
                searchField: 'tag',
                options: tags,
                create: function(input) {
                    return {
                        tag: input
                    }
                }
            });
        });
    </script>
@endsection