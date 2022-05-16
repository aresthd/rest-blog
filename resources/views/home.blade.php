{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')       
    {{-- Mengecek apakah ada posts atau tidak --}}
    @if ( $posts->count() )

        <div class="container">
            {{-- Hero Post --}}
            <div class="row mt-5">
                {{-- Hero --}}
                <div class="col-md-7 border-end border-4 pe-4 mt-5">
                    {{-- Apabila ada gambar di table post --}}
                    @if ( $heroPosts[0]->image )
                        {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                        <a href="/posts/{{ $heroPosts[0]->slug }}" class="text-decoration-none">
                            <img src="{{ asset('storage/' . $heroPosts[0]->image) }}" alt="{{ $heroPosts[0]->category->name }}" class="img-fluid rounded-1" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                        </a>
                    @else
                        {{-- Menampilkan gambar random dari unsplash --}}
                        <a href="/posts/{{ $heroPosts[0]->slug }}" class="text-decoration-none">
                            <img src="https://source.unsplash.com/1200x720?{{ $heroPosts[0]->category->name }}" class="img-fluid rounded-1" alt="{{ $heroPosts[0]->category->name }}" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                        </a>
                    @endif

                    <p class="text-muted d-flex justify-content-between mb-5 mt-3" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 300;
                    font-size: 1em;
                    line-height: 12px;
                    color: #546463;"> 
                        <span>{{ $heroPosts[0]->created_at->diffForHumans() }}</span>
                        <span class="text-uppercase">
                            —By <a href="/posts?author={{ $heroPosts[0]->author->username }}#categories" class="text-decoration-none link-secondary">{{ $heroPosts[0]->author->name }} </a>
                        </span>
                    </p>
                    
                    <p class="h2 mt-4" style="font-family: 'Vollkorn', serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 2.5em;
                    line-height: 56px;
                    letter-spacing: -0.015em;
                    color: #303030;">
                        <a href="/posts/{{ $heroPosts[0]->slug }}" class="text-decoration-none link-dark">
                            {{ $heroPosts[0]->title }}
                        </a>
                    </p>
                    <p style="font-family: 'Cantarell', sans-serif;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 1.2em;
                    line-height: 23px;
                    letter-spacing: -0.015em;
                    color: #666666;">
                        {{ $heroPosts[0]->excerpt }}
                    </p>
                </div>
    
                {{-- Sub Hero --}}
                <div class="col-md-5 ps-4 mt-5">
                    @foreach ($heroPosts->skip(1) as $heroPost)
                        <div class="row mb-4">
                            {{-- Apabila ada gambar di table post --}}
                            @if ( $heroPost->image )
                                {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                                <a href="/posts/{{ $heroPost->slug }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/' . $heroPost->image) }}" alt="{{ $heroPost->category->name }}" class="img-fluid rounded-1" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                                </a>
                            @else
                                {{-- Menampilkan gambar random dari unsplash --}}
                                <a href="/posts/{{ $heroPost->slug }}" class="text-decoration-none">
                                    <img src="https://source.unsplash.com/1200x720?{{ $heroPost->category->name }}" class="img-fluid rounded-1" alt="{{ $heroPost->category->name }}" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                                </a>
                            @endif
                                                    
                            <p class="text-muted d-flex mb-3 mt-2" style="font-family: 'Montserrat';
                            font-style: normal;
                            font-weight: 300;
                            font-size: .75em;
                            color: #546463;"> 
                                <span>{{ $heroPost->created_at->diffForHumans() }}</span>
                                <span class="text-uppercase ms-auto">
                                    —By <a href="/posts?author={{ $heroPost->author->username }}#categories" class="text-decoration-none link-secondary">{{ $heroPost->author->name }} </a>
                                </span>
                            </p>
                            
                            <p class="h3 mt-2 mb-2" style="font-family: 'Vollkorn', serif;
                            font-style: normal;
                            font-weight: 500;
                            font-size: 1.5em;
                            line-height: 1em;
                            letter-spacing: -0.015em;
                            color: #303030;">
                                {{ $heroPost->title }}
                            </p>
                            <p class="mt-0" style="font-family: 'Cantarell', sans-serif;
                            font-style: normal;
                            font-weight: 500;
                            font-size: 1em;
                            letter-spacing: -0.015em;
                            color: #666666;">
                                {{ $heroPost->excerpt }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        {{-- Lastest Post --}}
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
                    <a class="link-secondary" href="/posts#categories" style="font-family: 'Montserrat';
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

            {{-- Posts of Lastest Post --}}
            @foreach ($lastestPosts as $lastPost)
                <div class="row my-5">
                    {{-- Image Post --}}
                    <div class="col-md-4 me-2">
                        {{-- Apabila ada gambar di table post --}}
                        @if ( $lastPost->image )
                            {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                            <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none">
                                <img src="{{ asset('storage/' . $lastPost->image) }}" alt="{{ $lastPost->category->name }}" class="img-fluid rounded-1" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                            </a>
                        @else
                            {{-- Menampilkan gambar random dari unsplash --}}
                            <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none">
                                <img src="https://source.unsplash.com/1200x720?{{ $lastPost->category->name }}" class="img-fluid rounded-1" alt="{{ $lastPost->category->name }}" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                            </a>
                        @endif
                    </div>
                    {{-- Detail Post --}}
                    <div class="col-md">
                        <p class="text-uppercase text-secondary my-1" style="font-family: 'Montserrat';
                        font-style: normal;
                        font-weight: 300;
                        font-size: 1em;
                        line-height: 10px;
                        color: #546463;">
                            —By <a href="/posts?author={{ $lastPost->author->username }}#categories" class="text-decoration-none link-secondary">{{ $lastPost->author->name }} </a>
                        </p>
                        
                        <p class="h2 mt-4" style="font-family: 'Vollkorn', serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 2.5em;
                        line-height: 56px;
                        letter-spacing: -0.015em;
                        color: #303030;">
                            <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none link-dark">
                                {{ $lastPost->title }}
                            </a>
                        </p>
                        
                        <p class="mb-2" style="font-family: 'Cantarell', sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1.2em;
                        line-height: 23px;
                        letter-spacing: -0.015em;
                        color: #666666;">
                            {{ $lastPost->excerpt }}
                        </p>

                        {{-- Link untuk menuju single post dari suatu post tertentu --}}
                        <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none">Read more</a>

                        <p class="text-muted mt-4" style="font-family: 'Montserrat';
                        font-style: normal;
                        font-weight: 300;
                        font-size: 1em;
                        line-height: 10px;
                        color: #546463;">
                            {{ $lastPost->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        
        
    {{-- Apabila post-nya tidak ada --}}
    @else
        <div class="container">
            <div class="row my-5 border-top border-bottom border-3 py-2 d-flex align-items-center">
                <div class="col-auto mx-auto">
                    <p class="h1 text-capitalize my-4" style="font-family: 'Montserrat';
                    font-style: normal;
                    font-weight: 600;
                    font-size: 2.5em;
                    line-height: 49px;
                    letter-spacing: -0.015em;
                    text-shadow: 1px 2px 2px rgba(0,0,0,0.15);
                    color: #202020;">
                        No post found
                    </p>    
                </div>
            </div>
        </div>
    @endif
    
    @include('partials.footer')

    
@endsection