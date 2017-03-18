<div class="headerable">
    <div class="title"><i class="material-icons">featured_play_list</i> Настройки Хидера</div>

    <div class="row">

        <div>&nbsp;</div>

        <div class="form-group col-lg-6">
            {!! Form::label('header_title', 'Title (META)') !!}
            {!! Form::text('header[title]', isset($item) && $item->header ? $item->header->title : '', ['class' => 'form-control', 'id' => 'header_title']) !!}
        </div>

        <div class="form-group col-lg-6">
            {!! Form::label('header_keywords', 'Keywords (META)') !!}
            {!! Form::text('header[keywords]', isset($item) && $item->header ? $item->header->keywords : '', ['class' => 'form-control', 'id' => 'header_keywords']) !!}
        </div>

        <div class="form-group col-lg-6">
            {!! Form::label('header_description', 'Description (META)') !!}
            {!! Form::text('header[description]', isset($item) && $item->header ? $item->header->description : '', ['class' => 'form-control', 'id' => 'header_description']) !!}
        </div>

        <div class="form-group col-lg-6">
            {!! Form::label('header_caption', 'Надпись на странице') !!}
            {!! Form::text('header[caption]', isset($item) && $item->header ? $item->header->caption : '', ['class' => 'form-control', 'id' => 'header_caption']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="header_image">Фото</label>
        <input type="file" class="filestyle" data-buttonText="Выберите файл" data-buttonBefore="true" name="header[image]" id="header_image">
    </div>

    @if (isset($item) && $item->header && $item->header->image)
        <div class="col s12">
            <div><img src="/images/medium/{{ $item->header->img_url . $item->header->image }}" alt="" /></div>
            <div>&nbsp;</div>
            <button class="btn btn-danger" type="button" title="Удалить фото" onclick="deleteImage(this)" data-request-url="{{ route('headerable.delete') }}" data-model-class="{{ get_class($item) }}" data-model-id="{{ $item->id }}"><i class="material-icons">delete</i></button>
            <div style="display: none;" class="preloader loader"></div>
        </div>
    @endif
</div>