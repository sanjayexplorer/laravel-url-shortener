<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <header class="bg-white shadow">
        <nav class="container mx-auto flex justify-between items-center px-4 py-4">
            <div class="text-lg font-bold">URL Shortener</div>

            @auth
                @php
                    $role = strtolower(auth()->user()->roles->first()?->name);
                @endphp

                <div class="flex items-center space-x-4">
                    @if ($role == 'superadmin')
                        <a href="{{ route('superadmin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                    @elseif ($role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                    @elseif ($role == 'member')
                        <a href="{{ route('member.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                    @endif

                    <a href="#" class="text-red-500 hover:underline"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            @endauth
        </nav>
    </header>

    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <footer class="bg-white shadow mt-auto">
        <div class="container mx-auto px-4 py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} URL Shortener. All rights reserved.
        </div>
    </footer>

</body>
</html>
