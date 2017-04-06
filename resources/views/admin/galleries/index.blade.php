@extends('admin.layouts.full')

@section('title', 'Администрирование - Фотогалереи')

@section('content')
    <h2 class="text-center">Фотогалереи</h2>
    <p><a href="{{ route('admin.galleries.create') }}" class="btn btn-success"><i class="material-icons">add_circle</i> Добавить</a></p>

    @if ($items->count())
        <table id="table_items" class="table table-stripped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Alias</th>
                    <th>Описание</th>
                    <th data-orderable="false" class="btn-collumn"></th>
                    <th data-orderable="false" class="btn-collumn"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>@if ($item->image)<img src='/images/small/{{ $item->img_url.$item->image }}' alt='' />@endif</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ str_limit($item->text, 300) }}</td>
                        <td><a href="{{ route('admin.galleries.edit', $item->id) }}" class="btn btn-primary btn-small"><i class="material-icons">edit</i></a></td>
                        <td><button onclick="confirmDelete(this, '{{ $item->id }}')" class="btn btn-danger btn-small"></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-items"></div>
    @endif
@endsection
