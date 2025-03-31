<!DOCTYPE html>
<html lang="{{ $locale ?? 'en' }}" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="d-flex flex-column h-100 bg-dark text-white">
    @php $locale = session()->get('locale'); @endphp
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm" aria-label="Main navigation">
            <a href="/"><img style="height: 60px;" src="https://logosandtypes.com/wp-content/uploads/2022/03/college-maisonneuve.svg" alt=""></a>
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="/">
                    <i class="fas fa-house fa-lg me-2"></i>{{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('student.index')}}"><i class="fas fa-list fa-lg me-1"></i> @lang('list_students')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href=""><i class="fas fa-users fa-lg me-1"></i> Forum</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-dove fa-lg me-1"></i> @lang('chirping')</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item" href=""><i class=" me-1"></i>@lang('chirping_new')</a></li>
                                <li><a class="dropdown-item" href=""><i class=" me-1"></i>@lang('chirping_recent')</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-sm-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-globe me-1"></i>@lang('languages') {{$locale == '' ? '' : "($locale)" }}</a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><a class="dropdown-item" href="{{ route('language', 'en') }}">@lang('english')</a></li>
                                <li><a class="dropdown-item" href="{{ route('language', 'fr') }}">@lang('french')</a></li>
                            </ul>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('user.create') }}"><i class="fas fa-user-plus me-2"></i>@lang("register")</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            @guest
                            <a class="nav-link active" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> @lang('login')</a>
                            @else
                            <a class="nav-link active" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-1"></i> @lang('logout')</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0 p-3">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @yield('content')
    </main>
    <footer class="footer mt-auto py-4 border-top text-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{date('Y')}} {{ config('app.name')}}. @lang('footer_text')</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div>
                        @lang('footer_socials')
                    </div>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>