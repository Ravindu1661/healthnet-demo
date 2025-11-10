@extends('layouts.app')

@section('title', 'Dashboard - HealthNet')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">සාදරයෙන් පිළිගනිමු, {{ auth()->user()->name }}! 👋</h1>
    <p class="text-gray-600 mt-2">ඔබේ සෞඛ්‍ය කළමනාකරණය පහසුවෙන් කරගන්න</p>
</div>

<!-- Quick Actions -->
<div class="grid md:grid-cols-3 gap-6 mb-8">
    <a href="{{ route('doctors.index') }}" 
       class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="text-4xl mb-3">👨‍⚕️</div>
        <h3 class="text-xl font-semibold mb-2">වෛද්‍යවරු</h3>
        <p class="text-gray-600">වෛද්‍යවරු සොයා appointment book කරන්න</p>
    </a>

    <a href="{{ route('patient.appointments') }}" 
       class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="text-4xl mb-3">📅</div>
        <h3 class="text-xl font-semibold mb-2">මගේ Appointments</h3>
        <p class="text-gray-600">ඔබේ appointments බලන්න</p>
    </a>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
        <div class="text-4xl mb-3">💊</div>
        <h3 class="text-xl font-semibold mb-2">ඖෂධාගාර</h3>
        <p class="text-gray-600">බෙහෙත් ඇණවුම් කරන්න</p>
        <span class="text-xs text-gray-400">(ඉදිරියේදී)</span>
    </div>
</div>

<!-- Health Tips -->
<div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-8 text-white">
    <h2 class="text-2xl font-bold mb-4">සෞඛ්‍ය උපදෙස් 💡</h2>
    <ul class="space-y-2">
        <li>✓ දිනකට වතුර ලීටර් 2-3ක් පානය කරන්න</li>
        <li>✓ දිනකට මිනිත්තු 30ක වත් ව්‍යායාම කරන්න</li>
        <li>✓ සෑම වසරකම සෞඛ්‍ය පරීක්ෂණ කරවන්න</li>
        <li>✓ පලතුරු හා එළවළු වැඩියෙන් අනුභව කරන්න</li>
    </ul>
</div>

<!-- Stats -->
<div class="grid md:grid-cols-2 gap-6 mt-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">පැතිකඩ තොරතුරු</h3>
        <div class="space-y-2 text-gray-600">
            <p><strong>නම:</strong> {{ auth()->user()->name }}</p>
            <p><strong>ඊමේල්:</strong> {{ auth()->user()->email }}</p>
            @if(auth()->user()->phone)
                <p><strong>දුරකථන:</strong> {{ auth()->user()->phone }}</p>
            @endif
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">ඉක්මන් සබැඳි</h3>
        <ul class="space-y-2">
            <li><a href="{{ route('doctors.index') }}" class="text-blue-600 hover:underline">→ වෛද්‍යවරු සොයන්න</a></li>
            <li><a href="{{ route('patient.appointments') }}" class="text-blue-600 hover:underline">→ මගේ Appointments</a></li>
            <li><a href="#" class="text-gray-400">→ මගේ වාර්තා (ඉදිරියේදී)</a></li>
        </ul>
    </div>
</div>
@endsection