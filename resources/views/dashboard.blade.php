@extends('layouts.app')
@section('title', 'Register')
@section('nav')
    <nav class="bg-white shadow-sm p-4 flex justify-between items-center">
        <h1 class="font-bold text-xl text-blue-600">Brothers Pro</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
        </form>
    </nav>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800">Welcome, {{ auth()->user()->name }}!</h2>
        <p class="text-gray-600 mt-2">Your registered email is: <span
                class="font-mono font-bold">{{ auth()->user()->email }}</span></p>

        <div class="mt-6 p-4 bg-blue-50 border-l-4 border-blue-400">
            <p class="text-blue-700 text-sm">
                Account Status:
                <span class="font-bold">
                    {{ auth()->user()->status == 1 ? 'Active' : 'Pending Approval' }}
                </span>
            </p>
        </div>
    </div>
@endsection
