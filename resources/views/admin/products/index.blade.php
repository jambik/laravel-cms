@extends('admin.layouts.full')

@section('title', 'Администрирование - Продукты')

@section('content')
    <h2 class="text-center">Продукты</h2>

    <div class="row products">
        <div class="col-lg-3">
            <div class="list-group categories-list">
                <a href="{{ route('admin.products.index') }}" class="list-group-item active"><strong>Категории</strong></a>
                @foreach($categories as $category)
                    <a href="{{ route('admin.products.index').'?category='.$category->id }}" class="list-group-item depth-{{ $category->depth }}{{ request('category') == $category->id ? ' active' : '' }}">{{ $category->name }}{!! $category->products_count ? '<span class="badge">' . $category->products_count . '</span>' : '' !!}</a>
                @endforeach
            </div>
        </div>
        @if (request('category'))
            <div class="col-lg-9">
                <p><a href="{{ route('admin.products.create') }}" class="btn btn-success"><i class="material-icons">add_circle</i> Добавить</a></p>

                @if ($items->count())
                    <table id="table_items" class="table table-stripped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Фото</th>
                                <th>Название</th>
                                <th>Alias</th>
                                <th>Цена</th>
                                <th>Доступность</th>
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
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->available ? 'есть' : 'нет' }}</td>
                                    <td><a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-primary btn-small"><i class="material-icons">edit</i></a></td>
                                    <td><button onclick="confirmDelete(this, '{{ $item->id }}', '{{ route('admin.products.destroy', $item->id) }}')" class="btn btn-danger btn-small"><i class="material-icons">delete</i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="no-items"></div>
                @endif
            </div>
        @endif
    </div>
@endsection
