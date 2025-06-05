<!DOCTYPE html>
<html>

<head>
    <title>URL Shortener - @yield('title')</title>
</head>

<body>
    <header>
        <nav>
            @auth
                @php
                    $role = strtolower(auth()->user()->roles->first()?->name);
                @endphp

                @if ($role == 'superadmin')
                    <a href="{{ route('superadmin.dashboard') }}">Dashboard</a>
                @elseif ($role == 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @elseif ($role == 'member')
                    <a href="{{ route('member.dashboard') }}">Dashboard</a>
                @endif

                <a href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @endauth
        </nav>

    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
