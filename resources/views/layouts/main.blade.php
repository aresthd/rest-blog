<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/css/bootstrap.css" rel="stylesheet">

		{{-- Bootstrap Icons --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		
		{{-- My Style --}}
		<link rel="stylesheet" href="/css/style.css">

		{{-- Font --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Seaweed+Script&family=Vollkorn:wght@500&display=swap" rel="stylesheet">

		
		<title>Rest Blog | {{ $title }}</title>
	</head>
	<body>
	
		{{-- Memanggil file navbar.blade.php di folder partials --}}
		@include('partials.navbar')
		
		<div class="container my-5">
			@yield('container')                {{-- Akan berisi apapun yg ada di halaman-halaman child-nya yg memiliki section container--}}
		</div>



		{{-- Bootstrap Js --}}
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		
		{{-- Feather Icon --}}
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
		<script>
			feather.replace()

			// Load More
			$(function() {
				var $posts = $("#posts");
				var $ul = $("ul.pagination");
				$ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...

				$(".load-more").click(function() {
					$.get($ul.find("a[rel='next']").attr("href"), function(response) {
						$posts.append(
							$(response).find("#posts").html()
						);
					});
				});
			});
		</script>
	</body>
</html>