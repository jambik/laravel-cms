@extends('admin.layouts.full')

@section('title', 'Администрирование - Файлы')

@section('content')
    <h2 class="text-center">Файлы</h2>
    <p><a href="{{ route('admin.files.create') }}" class="btn btn-success"><i class="material-icons">add_circle</i> Добавить</a></p>

    @if ($items->count())
        <table id="table_items" class="table table-stripped table-bordered table-hover">
            <thead>
                <tr>
                    <th data-orderable="false" class="btn-collumn"></th>
                    <th>Id</th>
                    <th>Имя файла</th>
                    <th>Описание</th>
                    <th data-orderable="false" class="btn-collumn"></th>
                    <th data-orderable="false" class="btn-collumn"></th>
                </tr>
            </thead>
            <tbody class="sortable" data-entity-name="files">
                @foreach($items as $item)
                    <tr data-item-id="{{ $item->id }}">
                        <td class="sortable-handle"><i class="material-icons">&#xE240;</i></td>
                        <td>{{ $item->id }}</td>
                        <td>@if ($item->file) <a class="file-icon-name" href="{{ route('fileable.download', $item->id) }}" target="_blank"><div class="file-icon" data-type="{{ substr($item->file, strrpos($item->file, '.') + 1) }}"></div><span>{{ $item->name . substr($item->file, strrpos($item->file, '.')) }}</span></a> @endif</td>
                        <td>{{ $item->description }}</td>
                        <td><a href="{{ route('admin.files.edit', $item->id) }}" class="btn btn-primary btn-small"><i class="material-icons">edit</i></a></td>
                        <td><button onclick="confirmDelete(this, '{{ $item->id }}')" class="btn btn-danger btn-small"><i class="material-icons">delete</i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-items"></div>
    @endif
@endsection
