<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="text-xl font-bold text-red-600">
                📝 Blog Laravel
            </a>
            <div class="flex gap-4 items-center">
                <a href="{{ route('posts.create') }}"
                   class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    + Tambah Post
                </a>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm text-slate-600 hover:text-red-600">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6 py-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-16 py-6 bg-slate-800 text-slate-400 text-center text-sm">
        &copy; {{ date('Y') }} Rafael Tamtama Pasaribu — Tugas Rutin 11
    </footer>
</body>
</html>