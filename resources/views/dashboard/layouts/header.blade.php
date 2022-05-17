<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow mb-3">
    {{-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Rest Blog</a> --}}
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-dark" href="/" style="font-family: 'Seaweed Script', cursive;
        font-style: normal;
        font-weight: 400;
        font-size: 2.25em;
        line-height: 43px;">
            Rest Blog
    </a>
    
    <button class="navbar-toggler position-absolute d-md-none collapsed mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <input class="form-control form-control-dark " type="text" placeholder="Search" aria-label="Search"> --}}

    <div class="w-100 bg-dark"></div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap me-md-4">
          {{-- Form untuk logout yg datanya akan dikirim ke route logout dengan metode post --}}
          <form action="/logout" method="POST">
              {{-- Mengirimkan token csrf agar tidak dibajak --}}
              @csrf
              
              <button type="submit" class="nav-link px-3 bg-dark border-0">
                    Logout  <span data-feather="log-out"></span> 
              </button>
          </form>
      </div>
    </div>
</header>