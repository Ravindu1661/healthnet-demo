@extends('layouts.app')

@section('title', 'පුරනය වන්න - HealthNet')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">🏥</div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">HealthNet</h2>
            <p class="text-gray-600">ඔබේ ගිණුමට පුරනය වන්න</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <p class="font-semibold">❌ දෝෂයක්!</p>
                    <ul class="mt-2 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        ඊමේල් ලිපිනය
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            📧
                        </span>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required
                               autofocus
                               placeholder="your@email.com"
                               class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        මුරපදය
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            🔒
                        </span>
                        <input type="password" 
                               name="password" 
                               required
                               placeholder="••••••••"
                               class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">මතක තබා ගන්න</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                        මුරපදය අමතකද?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    පුරනය වන්න
                </button>

                <!-- Demo Credentials Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-4">
                    <p class="text-sm text-blue-800 font-semibold mb-2">🔐 Demo Credentials:</p>
                    <div class="text-xs text-blue-700 space-y-1">
                        <p><strong>Patient:</strong> patient@test.com / password</p>
                        <p><strong>Doctor:</strong> nimal@healthnet.lk / password</p>
                    </div>
                </div>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">හෝ</span>
                </div>
            </div>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-gray-600">
                    ගිණුමක් නැද්ද? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                        ලියාපදිංචි වන්න
                    </a>
                </p>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-700">
                    ← මුල් පිටුවට ආපසු යන්න
                </a>
            </div>
        </div>

        <!-- Features -->
        <div class="mt-8 grid grid-cols-3 gap-4 text-center">
            <div class="bg-white bg-opacity-50 rounded-lg p-3">
                <div class="text-2xl mb-1">🔒</div>
                <p class="text-xs text-gray-600">ආරක්ෂිත</p>
            </div>
            <div class="bg-white bg-opacity-50 rounded-lg p-3">
                <div class="text-2xl mb-1">⚡</div>
                <p class="text-xs text-gray-600">වේගවත්</p>
            </div>
            <div class="bg-white bg-opacity-50 rounded-lg p-3">
                <div class="text-2xl mb-1">📱</div>
                <p class="text-xs text-gray-600">PWA</p>
            </div>
        </div>
    </div>
</div>
@endsection