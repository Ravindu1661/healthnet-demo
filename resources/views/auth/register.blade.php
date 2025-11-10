@extends('layouts.app')

@section('title', 'ලියාපදිංචි වන්න - HealthNet')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">🏥</div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">HealthNet</h2>
            <p class="text-gray-600">නව ගිණුමක් සාදන්න</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <p class="font-semibold">❌ දෝෂයක්!</p>
                    <ul class="mt-2 text-sm">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Account Type Selection -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <p class="text-sm font-semibold text-blue-800 mb-3">📋 ගිණුම් වර්ගය තෝරන්න:</p>
                <div class="grid grid-cols-2 gap-4">
                    <label class="flex items-center justify-center bg-white border-2 border-blue-500 rounded-lg p-4 cursor-pointer hover:bg-blue-50 transition">
                        <input type="radio" name="account_type" value="patient" checked class="mr-3">
                        <div class="text-center">
                            <div class="text-3xl mb-1">👤</div>
                            <span class="font-semibold text-gray-800">රෝගී</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-center bg-white border-2 border-gray-300 rounded-lg p-4 cursor-pointer hover:bg-blue-50 transition">
                        <input type="radio" name="account_type" value="doctor" class="mr-3">
                        <div class="text-center">
                            <div class="text-3xl mb-1">👨‍⚕️</div>
                            <span class="font-semibold text-gray-800">වෛද්‍යවරයා</span>
                        </div>
                    </label>
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <div class="grid md:grid-cols-2 gap-5">
                    <!-- Full Name -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            සම්පූර්ණ නම *
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                👤
                            </span>
                            <input type="text" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required
                                   placeholder="ඔබගේ සම්පූර්ණ නම"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                        </div>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            ඊමේල් ලිපිනය *
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                📧
                            </span>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required
                                   placeholder="your@email.com"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            දුරකථන අංකය
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                📱
                            </span>
                            <input type="tel" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   placeholder="07XXXXXXXX"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            ලිපිනය
                        </label>
                        <div class="relative">
                            <span class="absolute top-3 left-0 flex items-start pl-4 text-gray-400">
                                📍
                            </span>
                            <textarea name="address" 
                                      rows="2"
                                      placeholder="ඔබගේ ලිපිනය"
                                      class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            මුරපදය *
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                🔒
                            </span>
                            <input type="password" 
                                   name="password" 
                                   required
                                   placeholder="අවම අක්ෂර 6ක්"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            මුරපදය තහවුරු කරන්න *
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                🔒
                            </span>
                            <input type="password" 
                                   name="password_confirmation" 
                                   required
                                   placeholder="මුරපදය නැවත ඇතුලත් කරන්න"
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="flex items-start">
                    <input type="checkbox" 
                           required
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 mt-1">
                    <label class="ml-3 text-sm text-gray-700">
                        මම <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">නියම සහ කොන්දේසි</a> සහ 
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">රහස්‍යතා ප්‍රතිපත්තිය</a> පිළිගනිමි
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    ලියාපදිංචි වන්න
                </button>
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

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-gray-600">
                    දැනටමත් ගිණුමක් තිබේද? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                        පුරනය වන්න
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

        <!-- Security Features -->
        <div class="mt-8 bg-white bg-opacity-50 rounded-lg p-4">
            <p class="text-sm text-gray-600 text-center mb-3">✅ ඔබේ තොරතුරු ආරක්ෂිතයි</p>
            <div class="flex justify-center gap-6 text-xs text-gray-500">
                <span>🔒 SSL Encrypted</span>
                <span>🛡️ GDPR Compliant</span>
                <span>🔐 Secure Storage</span>
            </div>
        </div>
    </div>
</div>

<script>
    // Account type selection styling
    document.querySelectorAll('input[name="account_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('input[name="account_type"]').forEach(r => {
                r.closest('label').classList.remove('border-blue-500', 'bg-blue-50');
                r.closest('label').classList.add('border-gray-300', 'bg-white');
            });
            this.closest('label').classList.remove('border-gray-300', 'bg-white');
            this.closest('label').classList.add('border-blue-500', 'bg-blue-50');
        });
    });
</script>
@endsection