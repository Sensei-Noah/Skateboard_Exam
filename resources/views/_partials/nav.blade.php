<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Administration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/product/create">Add product</a>
          </li>
        </ul>

              @if (Route::has('login'))
                  <div class="hidden fixed top-0 right-0">
                      @auth
                          <a href="/logout" class="btn btn-secondary text-light underline">Logout</a>
                      @else
                          <a href="{{ route('login') }}" class="btn btn-secondary text-light underline">Log in</a>

                          @if (Route::has('register'))
                              <a href="{{ route('register') }}" class="btn btn-secondary text-light underline">Register</a>
                          @endif
                      @endauth
                  </div>
              @endif
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>
<hr>
