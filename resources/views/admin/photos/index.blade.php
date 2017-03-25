@extends('admin.layouts.full')

@section('title', 'Администрирование - Фотографии')

@section('content')
    <h2 class="text-center">Фотографии</h2>

    @if ($items->count())
        <table id="table_items" class="table table-stripped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th data-orderable="false">Фото</th>
                    <th>Описание</th>
                    <th>Порядок</th>
                    <th>Morph type</th>
                    <th>Morph id</th>
                    <th data-orderable="false" class="btn-collumn"></th>
                    <th data-orderable="false" class="btn-collumn"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src='/images/small/{{ $item->img_url.$item->image }}' alt='' /></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->photoable_type }}</td>
                        <td>{{ $item->photoable_id }}</td>
                        <td><a href="{{ route('admin.photos.edit', $item->id) }}" class="btn btn-primary btn-small"><i class="material-icons">edit</i></a></td>
                        <td><button onclick="confirmDelete(this, '{{ $item->id }}')" class="btn btn-danger btn-small"><i class="material-icons">delete</i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-items"></div>
    @endif
@endsection
