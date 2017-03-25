@extends('admin.layouts.full')

@section('title', 'Администрирование - Новости')

@section('content')
    <h2 class="text-center">Новости</h2>
    <p><a href="{{ route('admin.news.create') }}" class="btn btn-success"><i class="material-icons">add_circle</i> Добавить</a></p>

    <table id="table_items_ajax" class="table table-striped table-bordered table-hover" data-order="[[ 4, &quot;desc&quot; ]]">
        <thead>
            <tr>
                <th>Id</th>
                <th>Фото</th>
                <th>Заголовок</th>
                <th>Текст новости</th>
                <th>Дата публикации</th>
                <th data-orderable="false" class="btn-collumn"></th>
                <th data-orderable="false" class="btn-collumn"></th>
            </tr>
        </thead>
    </table>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        // Применяем плагин DataTable к таблице элементов
        if ($('#table_items_ajax').length) {

            $('#table_items_ajax').DataTable({
                "language": {
                    "url": "{{ asset('js/DataTable.Russian.json') }}"
                },
                "pagingType": "full",
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.news.index') }}"
                },
                "columns": [
                    { "data": "id" },
                    {
                        "className":      'td-img',
                        "data":           null,
                        "defaultContent" : ''
                    },
                    { "data": "title" },
                    { "data": "text" },
                    { "data": "published_at" },
                    {
                        "className":      'td-edit',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent" : '<a href="#" class="btn btn-primary btn-small"><i class="material-icons">edit</i></a>'
                    },
                    {
                        "className":      'td-delete',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent" : '<button data-id="1" onclick="confirmDelete(this)" class="btn btn-danger btn-small"><i class="material-icons">delete</i></button>'
                    },
                ],
                "createdRow": function ( row, data, index ) {
                    if (data.image) {
                        $(row).find('.td-img').html('<img src="/images/small/' + data.img_url + data.image + '" alt="" />');
                    }
                    $(row).find('.td-edit a').attr('href', '{{ route('admin.news.index') }}' + '/' + data.id + '/edit');
                    $(row).find('.td-delete button').attr('data-id', data.id)
                }
            });
        }
    </script>
@endsection
