<nav class="navbar navbar-expand-md sticky-top addShadow no-radius">
    <div class="container headnav">
        <a class="navbar-brand" href="#">
            <img class="header-logo" src="{{ asset('/images/logo.svg') }}" alt="bumaas">
        </a>
        <form class="form-group">
            <div class="input-group">
                <input type="text" class="form-control head-search-box"
                    placeholder="Enter Product, part Number (English Only)">
                <div class="input-group-btn header-search-wrap">
                    <button class="btn btn-primary rounded-end" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav d-flex align-items-center justify-content-end">
            <li class="nav-item">
                <div class="d-flex align-items-center">
                    <div>
                        <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-phone"
                                aria-hidden="true"></i></button>
                    </div>
                    <div class="header-phone-wrapper">
                        <div class="head-phone-title">Call Us Now:</div>
                        <div class="head-phone-number">
                            0(800) 123-456
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                @auth
                <form method="POST" action="{{ route('authlogout') }}">
                    @csrf
                    {{ auth()->user()->email }}
                    <button type="submit">Logout</button>
                  </form>
                @endauth
                @guest
                <a href="{{ route('login') }}">Login</a>
                @endguest


            </li>

            @auth
            <li class="nav-item">
               <a href="{{ route('website.profile')}}">
                <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-user-o"
                    aria-hidden="true"></i></button>
            </a>
            </li>
            @endauth

            <li class="nav-item">
                <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-heart-o"
                        aria-hidden="true"></i></button>
            </li>
            <li class="nav-item">

            <span class="clearfix">
                <a href="{{ route('cartdata')}}">
                    <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-shopping-basket"
                        aria-hidden="true"></i></button>
                    <span class="basket-item-count">
                        <span class="badge badge-pill red"> 0 </span>
                    </span>
                </a>

            </span>

            </li>
        </ul>
    </div>
</nav>
<!-- <nav style="--bs-breadcrumb-divider: '>';" class="breadcrumb-wrapper" aria-label="breadcrumb"> -->
<!-- <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
        <li class="breadcrumb-item active">New customer registration</li>
    </ol>
</nav> -->
