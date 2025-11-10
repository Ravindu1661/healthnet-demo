@extends('layouts.app')

@section('title', 'වෛද්‍යවරු - HealthNet')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">වෛද්‍යවරු 👨‍⚕️</h1>
    <p class="text-gray-600 mt-2">ඔබට අවශ්‍ය වෛද්‍යවරයා තෝරා appointment book කරන්න</p>
</div>

@if($doctors->isEmpty())
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
        මේ මොහොතේ වෛද්‍යවරු නොමැත.
    </div>
@else
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($doctors as $doctor)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-24"></div>
                
                <div class="p-6 -mt-12">
                    <div class="w-20 h-20 bg-white rounded-full mx-auto mb-4 flex items-center justify-center text-4xl shadow-lg">
                        👨‍⚕️
                    </div>
                    
                    <h3 class="text-xl font-bold text-center mb-2">{{ $doctor->user->name }}</h3>
                    <p class="text-blue-600 text-center font-semibold mb-4">{{ $doctor->specialization }}</p>
                    
                    <div class="space-y-2 text-gray-600 text-sm mb-4">
                        <p><strong>SLMC:</strong> {{ $doctor->slmc_number }}</p>
                        <p><strong>උපදේශන ගාස්තුව:</strong> රු {{ number_format($doctor->consultation_fee, 2) }}</p>
                        @if($doctor->qualifications)
                            <p><strong>සුදුසුකම්:</strong> {{ Str::limit($doctor->qualifications, 50) }}</p>
                        @endif
                    </div>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('doctors.show', $doctor) }}" 
                           class="flex-1 bg-gray-200 text-gray-700 px-4 py-2 rounded text-center hover:bg-gray-300 transition">
                            විස්තර
                        </a>
                        <a href="{{ route('appointments.create', $doctor) }}" 
                           class="flex-1 bg-blue-600 text-white px-4 py-2 rounded text-center hover:bg-blue-700 transition">
                            Book කරන්න
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $doctors->links() }}
    </div>
@endif
@endsection