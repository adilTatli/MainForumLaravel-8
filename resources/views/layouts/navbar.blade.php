<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="/assets/front/images/version/market-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <div class="d-flex align-items-center ml-auto">
                            @auth
                                @if (auth()->user()->is_admin)
                                    <a class="nav-link" href="{{ route('admin.index') }}">Personal account</a>
                                @else
                                    <a class="nav-link" href="{{ route('user.index') }}">Personal account</a>
                                @endif
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            @else
                                <a class="nav-link" href="{{ route('login.create') }}">Login</a>
                                <a class="nav-link" href="{{ route('register.create') }}">Register</a>
                            @endauth
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="marketingDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="marketingDropdown">
                            @foreach ($sections as $section)
                                <a class="dropdown-item" href="{{ route('categories.single', $section->slug) }}">{{ $section->title }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                    </li>
                </ul>
                <form class="form-inline" method="GET" action="{{ route('search') }}">
                    <input name="search" class="form-control mr-sm-2 @error('search') is-invalid @enderror" type="text" placeholder="How may I help?" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
