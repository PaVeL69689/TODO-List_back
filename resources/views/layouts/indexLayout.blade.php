<!DOCTYPE html>
<html lang="ru" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            DEFAULT: '#111827',
                            lighter: '#1f2937'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark text-gray-100 min-h-screen">

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Заголовок -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-400 mb-2">TODO List</h1>
            <p class="text-gray-400">Простой менеджер задач на Laravel</p>
        </header>

        @yield('content')
        <!-- Футер -->
        <footer class="mt-12 pt-6 border-t border-gray-800 text-center text-gray-500 text-sm">
            <p>TODO List &copy; {{ date('Y') }} - Laravel {{ app()->version() }}</p>
        </footer>
    </div>

</body>
</html>