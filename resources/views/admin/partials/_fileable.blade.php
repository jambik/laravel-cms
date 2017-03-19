<div class="form-group">
    <label for="image">Фото</label>
    <input type="file" class="filestyle" data-buttonText="Выберите файл" data-buttonBefore="true" name="file" id="file">
</div>

@if (isset($item) && $item->image)
    <div class="col s12">
        <div><a href="/files/{{ $item->file }}">{{ $item->name }}</a></div>
        <div>&nbsp;</div>
        <button class="btn btn-danger" type="button" title="Удалить файл" onclick="deleteFile(this)" data-request-url="{{ route('fileable.delete') }}" data-model-class="{{ get_class($item) }}" data-model-id="{{ $item->id }}"><i class="material-icons">delete</i></button>
        <div style="display: none;" class="preloader loader"></div>
    </div>
@endif