@php $user = Auth::user() @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Popperjs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha256-BRqBN7dYgABqtY9Hd4ynE+1slnEw+roEPFzQ7TRRfcg=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link href="{{ asset('css/bootstrap-select.custom.css') }}" rel="stylesheet">
    <!-- Tempus Dominus -->
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/js/tempus-dominus.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/css/tempus-dominus.min.css" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css"></link>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body bs-theme="dark">
    @if (!isset($attributes['hide-navbar']))
    <nav class="bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div>
                <a class="navbar-brand me-3" href="{{ route('dashboard') }}">WOTA</a>
            </div>
            <ul class="navbar-nav gap-4 align-items-center flex-row justify-content-center">
                <li class="nav-item dropdown" data-bs-toggle="tooltip" title="Notification" data-bs-placement="bottom">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="width:300px">
                        <li><a class="dropdown-item" href="#">Notification</a></li>
                        <li><a class="dropdown-item" href="#">Notifications</a></li>
                        <li class="px-2">
                            <a href="" class="btn btn-link btn-sm text-end w-100">View all notifications</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown" title="User preferences">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="" class="rounded-circle border" alt="Profile picture" style="height:2em;width:2em;max-height:2em;max-width:2em;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="width:200px">
                        <li>
                            <div class="px-3">
                                <div class="fw-semibold">{{ $user->name }}</div>
                                <div class="text-muted">{{ $user->email }}</div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('notification') }}">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    @endif

    <div class="container-fluid">
        <div class="py-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    @php echo $message @endphp
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->has('flash'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @php echo $errors->first('flash') @endphp
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
