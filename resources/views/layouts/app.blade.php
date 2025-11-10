<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HealthNet - ඔබේ සෞඛ්‍ය සේවා වෙබ් ඇප්">
    <meta name="theme-color" content="#3b82f6">
    <title>@yield('title', 'HealthNet')</title>
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icons/icon-192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/icons/icon-512.png">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="text-2xl font-bold">🏥 HealthNet</a>
                
                <div class="flex items-center gap-4">
                    @auth
                        <span class="hidden md:inline">{{ auth()->user()->name }}</span>
                        <a href="{{ auth()->user()->isDoctor() ? route('doctor.dashboard') : route('patient.dashboard') }}" 
                           class="hover:underline">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="hover:underline">පිටවීම</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:underline">පුරනය වන්න</a>
                        <a href="{{ route('register') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50">ලියාපදිංචි වන්න</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 HealthNet. සියලු හිමිකම් ඇවිරිණි.</p>
        </div>
    </footer>

    <!-- PWA Install Prompt -->
    <div id="installPrompt" class="hidden fixed bottom-4 right-4 bg-white p-4 rounded-lg shadow-xl max-w-sm">
        <p class="mb-2">HealthNet App එක install කරන්නද?</p>
        <div class="flex gap-2">
            <button onclick="installPWA()" class="bg-blue-600 text-white px-4 py-2 rounded">Install</button>
            <button onclick="dismissPrompt()" class="bg-gray-300 px-4 py-2 rounded">පසුව</button>
        </div>
    </div>

    <script>
        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(reg => console.log('Service Worker registered', reg))
                .catch(err => console.log('Service Worker registration failed', err));
        }

        // PWA Install
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            document.getElementById('installPrompt').classList.remove('hidden');
        });

        function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    deferredPrompt = null;
                    document.getElementById('installPrompt').classList.add('hidden');
                });
            }
        }

        function dismissPrompt() {
            document.getElementById('installPrompt').classList.add('hidden');
        }
    </script>
</body>
</html>