{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')       
    {{-- Mengecek apakah ada posts atau tidak --}}
    @if ( $posts->count() )

        <div class="container">
            {{-- Hero Post --}}
            <div class="row my-5">
                {{-- Hero --}}
                <div class="col-md-7 border-end border-4 pe-4">
                    <img src="https://source.unsplash.com/1200x400" class="img-fluid" alt="...">
                    <p class="text-muted d-flex justify-content-between mb-4 mt-2" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 12px;
                    color: #546463;"> 
                        <span>tgl • time </span>
                        <span class="text-uppercase">—By User</span>
                    </p>
                    
                    <p class="h2 mt-4" style="font-family: 'Vollkorn', serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 2.5em;
                    line-height: 56px;
                    letter-spacing: -0.015em;
                    color: #303030;">
                        Judul
                    </p>
                    <p style="font-family: 'Cantarell', sans-serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 1.2em;
                    line-height: 23px;
                    letter-spacing: -0.015em;
                    color: #666666;">
                        excerpt
                    </p>
                </div>
    
                {{-- Sub Hero --}}
                <div class="col-md-5 ps-4">
                    <div class="row mb-4">
                        <img src="https://source.unsplash.com/1200x200" class="img-fluid" alt="...">
                        <p class="text-muted d-flex justify-content-between mb-1 mt-1" style="font-family: 'Montserrat';
                        font-style: normal;
                        font-weight: 300;
                        font-size: .75em;
                        color: #546463;"> 
                            <span>tgl • time </span>
                            <span class="text-uppercase">—By User</span>
                        </p>
                        
                        <p class="h3 mt-1 mb-0" style="font-family: 'Vollkorn', serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1.5em;
                        line-height: 56px;
                        letter-spacing: -0.015em;
                        color: #303030;">
                            Judul
                        </p>
                        <p class="mt-0" style="font-family: 'Cantarell', sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1em;
                        letter-spacing: -0.015em;
                        color: #666666;">
                            excerpt
                        </p>
                    </div>
                    <div class="row">
                        <img src="https://source.unsplash.com/1200x200" class="img-fluid" alt="...">
                        <p class="text-muted d-flex justify-content-between mb-1 mt-1" style="font-family: 'Montserrat';
                        font-style: normal;
                        font-weight: 300;
                        font-size: .75em;
                        color: #546463;"> 
                            <span>tgl • time </span>
                            <span class="text-uppercase">—By User</span>
                        </p>
                        
                        <p class="h3 mt-1 mb-0" style="font-family: 'Vollkorn', serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1.5em;
                        line-height: 56px;
                        letter-spacing: -0.015em;
                        color: #303030;">
                            Judul
                        </p>
                        <p class="mt-0" style="font-family: 'Cantarell', sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1em;
                        letter-spacing: -0.015em;
                        color: #666666;">
                            excerpt
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
        
        
        <div class="container">
            {{-- Sub Heading Lastest Post --}}
            <div class="row my-5 border-top border-bottom border-4 py-2 d-flex align-items-center">
                <div class="col-auto me-auto">
                    <p class="h1 text-uppercase" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 600;
                    font-size: 2.5em;
                    line-height: 49px;
                    letter-spacing: -0.015em;
                    text-shadow: 1px 2px 2px rgba(0,0,0,0.15);
                    color: #202020;">
                        The lastest articles
                    </p>
                </div>
                <div class="col-auto">
                    {{-- Link view all posts --}}
                    <a class="link-secondary" href="" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 17px;
                    letter-spacing: -0.015em;                
                    color: #7A7B7A;">
                        View all
                    </a>
                </div>
            </div>

            {{-- Post 1 --}}
            <div class="row my-5">
                <div class="col-md-4 me-2">
                    <img src="https://source.unsplash.com/1200x500" class="img-fluid" alt="...">
                </div>
                <div class="col-md">
                    <p class="text-uppercase text-muted my-2" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 10px;
                    color: #546463;">
                        —By User
                    </p>
                    
                    <p class="h2 mt-4" style="font-family: 'Vollkorn', serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 2.5em;
                    line-height: 56px;
                    letter-spacing: -0.015em;
                    color: #303030;">
                        Judul
                    </p>
                    
                    <p class="mb-2" style="font-family: 'Cantarell', sans-serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 1.2em;
                    line-height: 23px;
                    letter-spacing: -0.015em;
                    color: #666666;">
                        excerpt
                    </p>
    
                    <p class="text-muted mt-4" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 10px;
                    color: #546463;">
                        tgl • time 
                    </p>
                </div>
            </div>
    
            {{-- Post 2 --}}
            <div class="row my-5">
                <div class="col-md-4 me-2">
                    <img src="https://source.unsplash.com/1200x500" class="img-fluid" alt="...">
                </div>
                <div class="col-md">
                    <p class="text-uppercase text-muted my-2" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 10px;
                    color: #546463;">
                        —By User
                    </p>
                    
                    <p class="h2 mt-4" style="font-family: 'Vollkorn', serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 2.5em;
                    line-height: 56px;
                    letter-spacing: -0.015em;
                    color: #303030;">
                        Judul
                    </p>
                    
                    <p class="mb-2" style="font-family: 'Cantarell', sans-serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 1.2em;
                    line-height: 23px;
                    letter-spacing: -0.015em;
                    color: #666666;">
                        excerpt
                    </p>
    
                    <p class="text-muted mt-4" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 10px;
                    color: #546463;">
                        tgl • time 
                    </p>
                </div>
            </div>
    
            {{-- Post 3 --}}
            <div class="row my-5">
                <div class="col-md-4 me-2">
                    <img src="https://source.unsplash.com/1200x500" class="img-fluid" alt="...">
                </div>
                <div class="col-md">
                    <p class="text-uppercase text-muted my-2" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 10px;
                    color: #546463;">
                        —By User
                    </p>
                    
                    <p class="h2 mt-4" style="font-family: 'Vollkorn', serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 2.5em;
                    line-height: 56px;
                    letter-spacing: -0.015em;
                    color: #303030;">
                        Judul
                    </p>
                    
                    <p class="mb-2" style="font-family: 'Cantarell', sans-serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 1.2em;
                    line-height: 23px;
                    letter-spacing: -0.015em;
                    color: #666666;">
                        excerpt
                    </p>
    
                    <p class="text-muted mt-4" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 10px;
                    color: #546463;">
                        tgl • time 
                    </p>
                </div>
            </div>
        </div>
        
        
    {{-- Apabila post-nya tidak ada --}}
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
    
    @include('partials.footer')

    
@endsection