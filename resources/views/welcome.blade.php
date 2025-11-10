<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HealthNet - ඔබේ සෞඛ්‍ය සේවා වෙබ් ඇප්">
    <meta name="theme-color" content="#3b82f6">
    <title>HealthNet - සෞඛ්‍ය සේවා වෙබ් ඇප්</title>
    
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icons/icon-192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/icons/icon-512.png">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-2xl font-bold text-blue-600">
                    🏥 <span class="text-gray-800">HealthNet</span>
                </div>
                
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ auth()->user()->isDoctor() ? route('doctor.dashboard') : route('patient.dashboard') }}" 
                           class="text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-blue-600 transition">පිටවීම</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-gray-700 hover:text-blue-600 transition font-medium">
                            පුරනය වන්න
                        </a>
                        <a href="{{ route('register') }}" 
                           class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition shadow-md">
                            ලියාපදිංචි වන්න
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h1 class="text-6xl font-bold text-gray-800 mb-6">
                🏥 HealthNet
            </h1>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                ඔබේ සෞඛ්‍යය<br/>
                <span class="text-blue-600">අපගේ ප්‍රමුඛතාවය</span>
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                වෛද්‍යවරුන්, රෝහල්, ඖෂධාගාර සහ රසායනාගාර සේවා එක තැනකින් ලබා ගන්න
            </p>
            
            <div class="flex flex-wrap gap-4 justify-center">
                @guest
                    <a href="{{ route('register') }}" 
                       class="bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-blue-700 transition shadow-lg">
                        දැන්ම ආරම්භ කරන්න
                    </a>
                    <a href="#features" 
                       class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-50 transition shadow-lg border-2 border-blue-600">
                        තවත් දැනගන්න
                    </a>
                @else
                    <a href="{{ auth()->user()->isDoctor() ? route('doctor.dashboard') : route('patient.dashboard') }}" 
                       class="bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-blue-700 transition shadow-lg">
                        Dashboard එකට යන්න
                    </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
                අපගේ සේවා
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl hover:shadow-xl transition text-center">
                    <div class="text-6xl mb-4">👨‍⚕️</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">වෛද්‍යවරු</h3>
                    <p class="text-gray-600">
                        විශේෂඥ වෛද්‍යවරුන් සමඟ ඔන්ලයින් appointments book කරන්න
                    </p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl hover:shadow-xl transition text-center">
                    <div class="text-6xl mb-4">🏥</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">රෝහල්</h3>
                    <p class="text-gray-600">
                        රජයේ හා පෞද්ගලික රෝහල් සේවා එක තැනකින්
                    </p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl hover:shadow-xl transition text-center">
                    <div class="text-6xl mb-4">💊</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">ඖෂධාගාර</h3>
                    <p class="text-gray-600">
                        බෙහෙත් ඇණවුම් කර නිවසටම ලබා ගන්න
                    </p>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-2xl hover:shadow-xl transition text-center">
                    <div class="text-6xl mb-4">🔬</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">රසායනාගාර</h3>
                    <p class="text-gray-600">
                        ලැබ් රිපෝට් ඔන්ලයින් ලබා ගන්න
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold mb-2">500+</div>
                    <div class="text-xl opacity-90">වෛද්‍යවරු</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">50+</div>
                    <div class="text-xl opacity-90">රෝහල්</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">10,000+</div>
                    <div class="text-xl opacity-90">සතුටුදායක රෝගීන්</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; 2024 HealthNet. සියලු හිමිකම් ඇවිරිණි.</p>
        </div>
    </footer>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('✅ Service Worker registered'))
                    .catch(err => console.log('❌ SW registration failed:', err));
            });
        }
    </script>
</body>
</html>