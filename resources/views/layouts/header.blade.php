<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SofiaConseil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Texte de bienvenue -->
            <span class="navbar-text">
                Bonjour {{ Auth::user()->name }}
            </span>
            <!-- Navigation Links -->
            <ul class="navbar-nav ml-auto nav-fill">
                <li class="nav-item">
                    <x-nav-link :href="route('profile.edit')">
                        <button type="button" class="btn btn-warning">{{ __('Profile') }}</button>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <button type="button" class="btn btn-danger">{{ __('Déconnexion') }}</button>
                        </x-nav-link>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
