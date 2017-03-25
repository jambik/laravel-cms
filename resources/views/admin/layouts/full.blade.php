<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Import Google Icon Font -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/admin.bundle.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/admin.css') }}" type="text/css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('/js/admin.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/admin.js') }}" type="text/javascript"></script>

    @yield('head_scripts')

    <title>@yield('title', 'Администрирование')</title>
</head>
<body>
<div id="app">

    <nav class="navbar navbar-default hidden-print">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin') }}">
                    <img src="{{ asset('img/logo.png') }}" style="height: 35px;">
                    <a class="navbar-brand" href="#" style="line-height: 35px; padding-left: 20px;">Laravel CMS</a>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.logout') }}" class="red-text" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i> Выход</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Настройки <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/" target="_blank" class="red-text"><i class="material-icons">open_in_new</i> Открыть сайт</a></li>
                            <li><a href="{{ route('admin.settings') }}" class="red-text"><i class="material-icons">settings</i> Настройки сайта</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 hidden-print">
                <ul class="list-group">
                    <a class="list-group-item" href="{{ route('admin.categories.index') }}"><i class="material-icons left">list</i> Категории</a>
                    <a class="list-group-item" href="{{ route('admin.products.index') }}"><i class="material-icons left">store</i> Продукты</a>
                    <div class="divider"></div>
                    <a class="list-group-item" href="{{ route('admin.pages.index') }}"><i class="material-icons left">content_copy</i> Страницы</a>
                    <a class="list-group-item" href="{{ route('admin.blocks.index') }}"><i class="material-icons left">text_format</i> Текстовые блоки</a>
                    <a class="list-group-item" href="{{ route('admin.articles.index') }}"><i class="material-icons left">library_books</i> Статьи</a>
                    <a class="list-group-item" href="{{ route('admin.news.index') }}"><i class="material-icons left">featured_play_list</i> Новости</a>
                    <a class="list-group-item" href="{{ route('admin.slides.index') }}"><i class="material-icons left">photo_size_select_actual</i> Слайды</a>
                    <a class="list-group-item" href="{{ route('admin.galleries.index') }}"><i class="material-icons left">photo_library</i> Фотогалереи</a>
                    {{--<a class="list-group-item" href="{{ route('admin.photos.index') }}"><i class="material-icons left">photo</i> Фотографии</a>--}}
                    <a class="list-group-item" href="{{ route('admin.files.index') }}"><i class="material-icons left">attach_file</i> Файлы</a>
                    <div class="divider"></div>
                    <a class="list-group-item" href="{{ route('admin.users.index') }}"><i class="material-icons left">account_box</i> Пользователи</a>
                </ul>

                <ul class="list-group">
                    <a class="list-group-item" href="{{ route('admin.settings') }}"><i class="material-icons left">settings</i> Настройки</a>
                    <a class="list-group-item" href="{{ route('admin.administrators.index') }}"><i class="material-icons">verified_user</i> Администраторы</a>
                    <a class="list-group-item" href="{{ route('admin.logs') }}" target="_blank"><i class="material-icons">info_outline</i> Лог</a>
                </ul>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8">
                @include('admin.partials._status')
                @include('admin.partials._errors')

                @yield('content')

                <p>&nbsp;</p>
            </div>
        </div>
    </main>

    @include('admin.partials._flash')

    <footer class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">

            </div>
        </div>
    </footer>
</div>

@yield('footer_scripts')

</body>
</html>