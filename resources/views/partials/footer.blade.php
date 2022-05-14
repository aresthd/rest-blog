<div class="container" style=".b-example-divider {
		height: 3rem;
		background-color: rgba(0, 0, 0, .1);
		border: solid rgba(0, 0, 0, .15);
		border-width: 1px 0;
		box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
	}
	
	.bi {
		vertical-align: -.125em;
		fill: currentColor;
	}">

	{{-- Apabila sudah melakukan login / authentication --}}
	@auth
	@else
		<div class="container">
			{{-- write ur own blog --}}
			<div class="row py-5 my-5 border-top border-3">
				<div class="col text-center mt-4">
					<span class="my-4" style="font-family: 'Montserrat';
					font-style: normal;
					font-weight: 600;
					font-size: 3em;
					line-height: 59px;
					letter-spacing: -0.015em;
					text-transform: uppercase;
					text-shadow: 2px 2px 2px rgba(0,0,0,0.2);
					color: #202020;
					">
						write your own blog
					</span>
					<div class="d-grid gap-1 col-1 mx-auto mt-4">
						<a class="btn btn-dark" href="#" role="button">Login</a>
					</div>
				</div>
			</div>
		</div>
	@endauth

	<div class="container">
		<footer class="row row-cols-8 py-5 my-5 border-top border-3 mx-auto">
			<div class="col me-auto">
				<a class="navbar-brand" href="/" style="font-family: 'Seaweed Script', cursive;; 
				font-style: normal; 
				font-weight: 400;
				font-size: 4.5em;
				line-height: 98px; 
				color: #303030; 
				text-shadow: 0px 2px 3px rgba(0, 0, 0, 0.15);">
					Rest Blog
				</a>
			</div>
				
			<div class="col-md-2 ms-auto">
				<ul class="nav flex-column d-flex justify-content-center">
					<li class="nav-item my-2"><a href="#" class="nav-link p-0 link-secondary">Blog</a></li>
					<li class="nav-item my-2"><a href="#" class="nav-link p-0 link-secondary">Home</a></li>
					<li class="nav-item my-2"><a href="#" class="nav-link p-0 link-secondary">About</a></li>
				</ul>
			</div>
		
			<div class="col-md-1 me-0">
				<ul class="nav flex-column d-flex justify-content-center">
					<li class="nav-item my-2"><a href="#" class="nav-link p-0 text-muted"><span data-feather="instagram"></span></a></li>
					<li class="nav-item my-2"><a href="#" class="nav-link p-0 text-muted"><span data-feather="facebook"></span></a></li>
					<li class="nav-item my-2"><a href="#" class="nav-link p-0 text-muted"><span data-feather="twitter"></span></a></li>
				</ul>
			</div>
	
			  <span class="text-secondary text-center mt-5" style="font-family: 'Montserrat';
				font-style: normal;
				font-weight: 600;
				font-size: .9em;
				line-height: 1.125em;
				letter-spacing: -0.015em;
				text-transform: uppercase;
				color: #303030;">
					all right reserved
			</span>
		</footer>
	</div>
</div>