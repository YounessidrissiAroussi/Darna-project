<div class="container position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="/" class="navbar-brand" id="brand">
                <h1 class="m-0 text-primary"><span class="text-dark">Dar</span>na</h1>
            </a>
            @guest
                <div class="navbar-nav ml-auto py-0">
                    <div class="nav-item">
                        <a href="{{route('login.check')}}" class=" btn btn-outline-success rounded" >Login</a>
                    </div>
                </div>
            @endguest
            @auth
            <div class="navbar-nav ml-auto py-0">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-success dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <div class="dropdown-menu rounded w-100">
                      <a class="dropdown-item" href="/Profile">My Profile</a>
                      <a class="dropdown-item" href="/Setting">Setting</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/logout">logout</a>
                    </div>
                  </div>
            </div>
        @endauth
        </nav>
    </div>
</div>