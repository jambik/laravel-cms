@extends('admin.layouts.full')

@section('title', 'Администрирование - Продукты')

@section('content')
	<h2 class="text-center">Создать</h2>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
			<div class="row">
				{!! Form::open(['url' => route('admin.products.store'), 'method' => 'POST', 'files' => true]) !!}
					@include('admin.products.form', ['submitButtonText' => 'Добавить'])
				{!! Form::close() !!}
            </div>
		</div>
	</div>
@endsection
