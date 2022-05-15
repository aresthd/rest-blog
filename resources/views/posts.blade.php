{{-- Mengextends halaman main.blade.php --}}
@extends('layouts.main')

{{-- Mengisi halaman parent untuk section container --}}
@section('container')     

    {{-- Heading --}}
    <div class="contaier">
        {{-- Heading --}}
        <h1 class="h1 mt-5" style="font-family: 'Vollkorn';
        font-style: normal;
        font-weight: 400;
        font-size: 5em;
        line-height: 111px;
        text-shadow: 1px 2px 2px rgba(0,0,0,0.15);
        color: #000000;">
            Blog
        </h1>
        
        {{-- Search Bar --}}
        <div class="row mt-4 mb-5">
            <div class="col-md-8">
                {{-- Data dari form-nya akan dikirim ke url di halaman posts --}}
                <form action="/posts" method="get">
                    {{-- Apabila telah memilih suatu category --}}
                    @if (request('category'))
                        {{-- Melakukan input category --}}
                        <input type="hidden" name='category' value="{{ request('category') }}">
                    @endif
                    {{-- Apabila telah memilih suatu author --}}
                    @if (request('author'))
                        {{-- Melakukan input author --}}
                        <input type="hidden" name='author' value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        {{-- Melakukan input search --}}
                        <label class="input-group-text" for="searchBar"><span data-feather="search" ></span></label>
                        <input type="text" class="form-control" placeholder="Search..." name="search"  value="{{ request('search') }}" id="searchBar">
                        <button class="btn btn-secondary" type="submit" >Button</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Mengecek apakah ada posts atau tidak --}}
    @if ( $posts->count() )
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

            {{-- Lastest Posts --}}
            <div class="row mb-5">
                @foreach ($lastestPosts as $lastPost)
                    <div class="col-md-4">
                        {{-- Apabila ada gambar di table post --}}
                        @if ( $lastPost->image )
                            <div style="max-height: 400px; overflow:hidden;">
                                <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none">
                                    {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                                    <img src="{{ asset('storage/' . $lastPost->image) }}" alt="{{ $lastPost->category->name }}" class="img-fluid rounded-1"  width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                                </a>
                            </div>
                        @else
                            <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none">
                                {{-- Menampilkan gambar random dari unsplash --}}
                                <img src="https://source.unsplash.com/1200x720?{{ $lastPost->category->name }}" class="img-fluid rounded-1" alt="{{ $lastPost->category->name }}" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                            </a>
                        @endif
                        
                        {{-- Info Post --}}
                        <p class="text-secondary d-flex justify-content-between mb-1 mt-1" style="font-family: 'Montserrat';
                        font-style: normal;
                        font-weight: 300;
                        font-size: .75em;
                        color: #546463;"> 
                            <span>{{ $lastPost->created_at->diffForHumans() }}</span>
                            <span class="text-uppercase">
                                —By <a href="/posts?author={{ $lastPost->author->username }}#categories" class="text-decoration-none link-secondary">{{ $lastPost->author->name }}</a>
                            </span>
                        </p>
                        
                        {{-- Title Post --}}
                        <h3 class="h3 mt-3 mb-4" style="font-family: 'Vollkorn', serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1.5em;
                        letter-spacing: -0.015em;
                        color: #303030;">
                            <a href="/posts/{{ $lastPost->slug }}" class="text-decoration-none text-dark">{{ $lastPost->title }}</a>
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>  

        {{-- Posts --}}
        <div class="container" id="categories">
            {{-- Categories --}}
            <div class="row my-5" >
                <ul class="nav justify-content-center align-items-center border-top border-bottom border-4 py-2 text-capitalize" style="font-family: 'Montserrat';
                font-style: normal;
                font-weight: 600;
                font-size: 1.25em;
                line-height: 24px;
                letter-spacing: -0.015em;
                ">
                    <li class="nav-item px-3">
                        <a class="nav-link {{ ($activeCategory === "") ? 'active link-dark text-decoration-underline' : 'link-secondary' }}" href="/posts?{{ request('author') ? 'author=' . $author->username : ''}}#categories">{{ $titleUser }}</a>
                    </li>
                    {{-- Melakukan looping untuk setiap category yg diterima dari route web --}}
                    @foreach ($categories as $category)
                        <li class="nav-item px-3">
                            <a class="nav-link {{ ($activeCategory === $category->name) ? 'active link-dark text-decoration-underline' : 'link-secondary' }}" href="/posts?category={{ $category->slug }}#categories">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    @if ( request('author') && !request('search') )
                        <li class="nav-item px-auto">
                            {{-- Link view all posts --}}
                            <a class="nav-link {{ ($activeCategory === $category->name) ? 'active link-dark text-decoration-underline' : 'link-secondary' }}" href="/posts#categories">
                                View all
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Post --}}
            @foreach ($posts as $post)
                <div class="row my-5">
                    {{-- Image Post --}}
                    <div class="col-md-4 me-2">
                        {{-- Apabila ada gambar di table post --}}
                        @if ( $post->image )
                            {{-- Mengambil gambar dari storage sesuai dengan nama file gambar di table post --}}
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid rounded-1" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
                            </a>
                        @else
                            {{-- Menampilkan gambar random dari unsplash --}}
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                <img src="https://source.unsplash.com/1200x720?{{ $post->category->name }}" class="img-fluid rounded-1" alt="{{ $post->category->name }}" width="720" style="box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.5);">
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
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none link-dark">
                                {{ $post->title }}
                            </a>
                        </p>
                        
                        <p class="mb-2" style="font-family: 'Cantarell', sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 1.2em;
                        line-height: 23px;
                        letter-spacing: -0.015em;
                        color: #666666;">
                            {{ $post->excerpt }}
                        </p>

                        {{-- Link untuk menuju single post dari suatu post tertentu --}}
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more</a>

                        <p class="text-muted mt-4" style="font-family: 'Montserrat';
                        font-style: normal;
                        font-weight: 300;
                        font-size: 1em;
                        line-height: 10px;
                        color: #546463;">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $posts->links() }}
            </div>
            

            {{-- Show More --}}
            <div class="row my-5 mx-1 d-none">
                {{-- <button class="see-more" data-page="2" data-link="localhost:8000/post?page=" data-div="#posts">See more</button>  --}}
                <button type="button" id="load-more" class="btn btn-outline-dark p-2" data-page="2" data-link="/posts?page=" data-div="#posts">Show more</button>
                {{-- <a wire:click="load" class="btn btn-outline-dark p-2" data-page="2" data-link="/posts?page=" data-div="#posts">Show more</a> --}}
            </div>
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
