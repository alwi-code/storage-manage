<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            height: 100%;
            position: fixed;
            left: 0;
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            padding-top: 20px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            overflow-y: auto;
        }

        .container-items-sidebar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            margin-left: 10px;
        }

        .container-logout {
            margin-bottom: 30%;
        }

        #navbarSupportedContent {
            gap: 10px;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="container-items-sidebar">
            <div class="container-user">
                <div class="sidebar-heading px-3">{{ Auth::user()->username }}</div>
                <div class="sidebar-heading px-3">{{ Auth::user()->user_id }}</div>
            </div>
            <div class="contianer-menu">
                <div class="list-group list-group-flush">
                    <a href="/baranglist" class="list-group-item list-group-item-action">List barang</a>
                    <a href="#" class="list-group-item list-group-item-action">Manage users</a>
                    <a href="#" class="list-group-item list-group-item-action">Log activity</a>
                </div>
            </div>

            <div class="container-logout">
                <a class="dropdown-item px-3" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        {{-- <div class="dropdown mt-auto px-3">

            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="userMenu"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->username }}
            </a>

            <ul class="dropdown-menu" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div> --}}

    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <img src="#" alt="logo" style="height: 32px;">
                <p>PT TEAM2</p>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    </script>
</body>

</html>
