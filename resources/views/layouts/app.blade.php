<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #563d7c;">
            {{-- <nav class="navbar navbar-expand-md navbar-dark bg-warning shadow-sm"> --}}
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Census Managment Systsem') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        {{-- for not resident only --}}
                        @if (!auth()->user()->is_resident)
                        <li class="nav-item <?=(Route::current()->uri() == '/' ? 'active':'')?>">
                            <a class="nav-link" href="/">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'posts' ? 'active':'')?>">
                            <a class="nav-link" href="/posts">{{ __('Posts') }}</a>
                        </li>
                        @endif

                        @if (auth()->user()->is_admin)
                        <li class="nav-item <?=(Route::current()->uri() == 'account' ? 'active':'')?>">
                            <a class="nav-link" href="/account">{{ __('Account Management') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'supervisor-reports' ? 'active':'')?>">
                            <a class="nav-link" href="/supervisor-reports">{{ __('Supervisors Report') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'resident-feedbacks' ? 'active':'')?>">
                            <a class="nav-link" href="/resident-feedbacks">{{ __('Residents Feedback') }}</a>
                        </li>
                        @elseif(auth()->user()->is_supervisor)
                        <li
                            class="nav-item <?=(Route::current()->uri() == '/counting-report-list-card-of-enumnators' ? 'active':'')?>">
                            <a class="nav-link" href="/">{{ __('Enumerators Report') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'send-report' ? 'active':'')?>">
                            <a class="nav-link" href="/send-report">{{ __('Send Report') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'account/users' ? 'active':'')?>">
                            <a class="nav-link" href="/account/users">{{ __('Enumnators') }}</a>
                        </li>

                        @elseif(auth()->user()->is_enumerator)
                        <li class="nav-item <?=(Route::current()->uri() == 'houses' ? 'active':'')?>">
                            <a class="nav-link" href="/houses">{{ __('Houses') }}</a>
                        </li>

                        @elseif(auth()->user()->is_resident)
                        <li class="nav-item <?=(Route::current()->uri() == '/' ? 'active':'')?>">
                            <a class="nav-link" href="/">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'send-feedback' ? 'active':'')?>">
                            <a class="nav-link" href="/send-feedback">{{ __('Send Feedback') }}</a>
                        </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item <?=(Route::current()->uri() == 'profile' ? 'active':'')?>"
                                    href="/profile">
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
    {{-- CKeditor files --}}
    <script src="/ckeditor5/ckeditor.js"></script>
    <script src="/ckeditor5/ckeditor.js.map"></script>
    <script>
        const watchdog = new CKSource.EditorWatchdog();

    window.watchdog = watchdog;

    watchdog.setCreator( ( element, config ) => {
        return CKSource.Editor
            .create( element, config )
            .then( editor => {




                return editor;
            } )
    } );

    watchdog.setDestructor( editor => {



        return editor.destroy();
    } );

    watchdog.on( 'error', handleError );

    watchdog
        .create( document.querySelector( '.editor' ), {

            toolbar: {
                items: [
                    'heading',
                    '|',
                    'underline',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'undo',
                    'redo',
                    '-',
                    'alignment',
                    'fontBackgroundColor',
                    'fontColor',
                    'fontFamily',
                    'fontSize',
                    'highlight',
                    'horizontalLine',
                    'subscript',
                    'superscript',
                    'strikethrough',
                    'insertTable',
                    'blockQuote'
                ],
                shouldNotGroupWhenFull: true
            },
            language: 'en',
            licenseKey: '',



        } )
        .catch( handleError );

    function handleError( error ) {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: 8uo7e3v0si9i-uk35tb5rkyg' );
        console.error( error );
    }

    </script>
</body>

</html>
