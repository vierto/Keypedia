<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keypedia</title>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <style>

        *{
            text-decoration: none;
            color: black;
        }

        body{
            margin: 0;
            background-color: #12c9c3;
            padding-bottom: 50px;
        }
        .header{
            background-color: whitesmoke;
            display: flex;
            justify-content: space-evenly;
        }
        .header .header-container{
            display: flex;
            width: 50%;
            justify-content: space-evenly;
        }
        .header h1{
            margin-top: 10px;
        }
        .footer{
            background-color: whitesmoke;
            bottom: 0;
            position: fixed;
            height: 25px;
            width: 100%;
        }
        .footer h3{
            margin: 0;
            color: grey;
            background-color: white;
            text-align: center;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Keypedia</a>

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars text-light"></i>
            </button>

            @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="/category/{{$category->category_name}}">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            
            @if(Auth::user()->role_id == 1)
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    MANAGER
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/addKeyboard">Add Keyboard</a></li>
                        <li><a class="dropdown-item" href="/">Manage Category</a></li>
                        <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>          
            @elseif(Auth::user()->role_id == 2)
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    USER
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/myCart">My Cart</a></li>
                        <li><a class="dropdown-item" href="/transactionHistory">Transaction History</a></li>
                        <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            @endauth
            @elseif(Auth::id() == null)
                <div class="header-container">
                    <a href="/login">
                        <h3>Login Press Here!!!</h3>
                    </a>
                    <a href="/register">
                        <h3>Register Press Here!!!</h3>
                    </a>
                </div>
            @endif

            <div>
                <?php
                    date_default_timezone_set("Etc/GMT-7");
                    echo date("l,d-m-y");
                ?>
            </div>
        </div>
    </nav>

    {{-- <div class="header">
        <div class="title">
            <a href="/">
                <h1>Keypedia</h1>
            </a>
        </div>

        @auth
        <div>
            ID : {{Auth::id()}}
        </div>
        <div>
            Email : {{Auth::user()->email_address}}
        </div>

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            CATEGORIES
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="/category/{{$category->category_name}}">{{$category->category_name}}</a></li>
                @endforeach
            </ul>
        </div>
        @if(Auth::user()->role_id == 1)
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                MANAGER
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/addKeyboard">Add Keyboard</a></li>
                    <li><a class="dropdown-item" href="/">Manage Category</a></li>
                    <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </div>          
        @elseif(Auth::user()->role_id == 2)
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                USER
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/myCart">My Cart</a></li>
                    <li><a class="dropdown-item" href="/transactionHistory">Transaction History</a></li>
                    <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </div> 
        @endauth 
        @elseif(Auth::id() == null)
        <div class="header-container">
            <a href="/login">
                <h3>Login Press Here!!!</h3>
            </a>
            <a href="/register">
                <h3>Register Press Here!!!</h3>
            </a>
        </div>
        @endif

        <div>
            <?php
                date_default_timezone_set("Etc/GMT-7");
                echo date("l,d-m-y");
            ?>
        </div>
    </div> --}}
    @yield('container')

    <footer class="text-center text-white" style="background-color: #0dd4c4;">
        <div class="text-center p-3" style="background-color: rgba(255, 255, 255, 0.2);">
            <h5>Made by Keypedia CEO-ES - 2021</h5>
        </div>
      </footer>

    {{-- <div class="footer">
        <h3>Made by Keypedia CEO-ES - 2021</h3>
    </div> --}}

    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>