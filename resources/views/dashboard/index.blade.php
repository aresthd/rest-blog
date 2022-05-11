{{-- Memanggil file view di views/dashboard/layouts/main.blade.php --}}
@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- Mengambil data user yg sudah login / authentication --}}
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>
@endsection



