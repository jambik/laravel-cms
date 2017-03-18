@extends('admin.layouts.full')

@section('title', 'Администрирование - Фотогалереи')

@section('content')
	<h2 class="text-center">Редактировать</h2>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
            <div class="row">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Свойства</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Фотографии</a></li>
                </ul>
            </div>

			<div>&nbsp;</div>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="tab1">
					<div id="tab1"  class="row">
						{!! Form::model($item, ['url' => route('admin.galleries.update', $item->id), 'method' => 'PUT', 'files' => true]) !!}
						@include('admin.galleries.form', ['submitButtonText' => 'Обновить'])
						{!! Form::close() !!}
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab2">
					<div id="tab2" class="row">
						@include('admin.partials._photoable')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
