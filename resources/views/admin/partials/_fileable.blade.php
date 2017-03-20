<div class="form-group">
    <label for="image">Фото</label>
    <input type="file" class="filestyle" data-buttonText="Выберите файл" data-buttonBefore="true" name="file" id="file">
</div>

@if (isset($item) && $item->file)
    <div class="col s12">
        <div class="file-icon-name"><a href="{{ route('fileable.download', $item->id) }}" target="_blank"><div class="file-icon" data-type="{{ substr($item->file, strrpos($item->file, '.') + 1) }}"></div><span>{{ $item->name . substr($item->file, strrpos($item->file, '.')) }}</span></a></div>
        <button class="btn btn-danger" type="button" title="Удалить файл" onclick="deleteFile(this)" data-request-url="{{ route('fileable.delete') }}" data-model-class="{{ get_class($item) }}" data-model-id="{{ $item->id }}"><i class="material-icons">delete</i></button>
        <div style="display: none;" class="preloader loader"></div>
        <div>&nbsp;</div>
    </div>
@endif