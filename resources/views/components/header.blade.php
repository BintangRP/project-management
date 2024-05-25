<div class="container-lg">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
        <a href="/"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4"><img src="{{ asset('img/logo.png') }}" alt="" height="70"></span>
        </a>

        <ul class="nav nav-pills">

            @guest
                <li class="nav-item"><a href="/" class="btn btn-outline-primary active" aria-current="page">Home</a>
                </li>
                <li class="nav-item"><a href="{{ route('auth') }}" class="btn btn-secondary mx-2 "
                        aria-current="page">Login</a></li>
            @endguest
            @auth
                <li class="nav-item"><a href="{{ route('admin') }}" class="btn btn-outline-primary active"
                        aria-current="page">Dashboard</a>
                </li>
                <li class="nav-item mx-2">
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </header>
</div>
