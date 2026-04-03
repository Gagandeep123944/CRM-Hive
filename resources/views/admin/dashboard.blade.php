@extends('layouts.app')
@section('title', 'Register')
@section('nav')
    <nav class="bg-gray-800 border-b border-gray-700 p-4 flex justify-between items-center">
        <h1 class="font-bold text-xl text-yellow-500">ADMIN CONTROL PANEL</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 px-3 py-1 rounded text-sm hover:bg-red-700">Logout</button>
        </form>
    </nav>
@endsection
@section('content')
    <div class="max-w-6xl mx-auto mt-10 p-8">
        <div class="bg-gray-800 rounded-xl shadow-2xl p-6 border border-gray-700">
            <h2 class="text-3xl font-bold">Welcome back, Administrator {{ auth()->user()->name }}</h2>
            <p class="text-gray-400 mt-2">Logged in as: {{ auth()->user()->email }}</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="p-4 bg-gray-700 rounded-lg">
                    <p class="text-gray-400 text-sm">System Status</p>
                    <p class="text-green-400 font-bold text-lg">Online</p>
                </div>
                <div class="p-4 bg-gray-700 rounded-lg">
                    <p class="text-gray-400 text-sm">User Role</p>
                    <p class="text-yellow-500 font-bold text-lg">Super Admin</p>
                </div>
            </div>
        </div>
    </div>
@endsection
