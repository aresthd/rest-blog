@extends('layouts.main')

@section('container')
    
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                {{-- Form untuk register yg datanya akan dikirim ke route register dengan metode post--}}
                <form action="/register" method="POST">
                    @csrf
                    {{-- Input name --}}
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        {{-- Apabila terjadi error untuk input name --}}
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- Input username --}}
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="Username" placeholder="Name" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        {{-- Apabila terjadi error untuk input username --}}
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- Input email --}}
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        {{-- Apabila terjadi error untuk input email --}}
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- Input password --}}
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        {{-- Apabila terjadi error untuk input password --}}
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">
                    Already registered? 
                    <a href="/login">Login</a>
                </small>
            </main>
        </div>
    </div>



@endsection


