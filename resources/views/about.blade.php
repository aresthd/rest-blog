{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')           
    <h1>Halaman About</h1>

    {{-- Menerima data dari routes web --}}
    <h3>{{ $name }}</h3>        {{-- {{  }} ~> Berfungsi untuk melakukan echo --}}
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
@endsection
