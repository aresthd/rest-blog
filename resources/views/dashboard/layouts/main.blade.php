<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rest Blog | Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet">

        {{-- Trix Editor --}}
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>

        <style>
            trix-toolbar [data-trix-button-group="file-tools"] {
                display: none;
            }
        </style>

        {{-- Feather Icon --}}
        <script src="https://unpkg.com/feather-icons"></script>

        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/a0aef73b98.js" crossorigin="anonymous"></script>

        {{-- Font --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Seaweed+Script&family=Vollkorn:wght@500&display=swap" rel="stylesheet">

		
        
    </head> 
    <body>
    
    {{-- Memanggil file view di views/dashboard/layouts/header.blade.php --}}
    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">
            {{-- Memanggil file view di views/dashboard/layouts/sidebar.blade.php --}}
            @include('dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                {{-- Akan berisi apapun yg ada di halaman-halaman child-nya yg memiliki section container--}}
                @yield('container')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>

    <script>
        feather.replace()
    </script>
  </body>
</html>
