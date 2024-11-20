<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Lien vers Bootstrap CSS -->
    <link rel="icon" href="{{ asset('imagesP/javaScript-removebg-preview.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Bootstrap5/vendor/fonts/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Bootstrap5/sweetalert.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
{{--
    <script src="{{ asset('Bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Bootstrap5/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Bootstrap5/dataTables.bootstrap5.min.css')}}"></script>
    <script src="{{ asset('Bootstrap5/vendor/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('Bootstrap5/vendor/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('Js/appli.js')  }}"></script> --}}

</head>
<body>
    <style>

    </style>

<nav class="navbar navbar-expand-lg bg-body-tertiary py-2"style="position:relative; background-color:#A9E4EE !important">
  <div class="container-fluid">
    <img src="{{ asset('imagesP/javaScript-removebg-preview.png')}}" class=" rounded-circle mx-3" style="width:3rem; height:2rem;" title="Logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item listT">
                <a class="nav-link text-dark" href="{{ route('home') }}">
                    <i class="fas fa-home fs-5"></i><b>&nbsp;Home</b>
                </a>
            </li>

            <li class="nav-item   listT" >
                <a class="nav-link text-dark " aria-current="page" href="#">
                    <i class="fas fa-bullhorn text-warning iconeJ fs-5"></i><b>&nbsp;Event</b>
                </a>
            </li>



            @auth
                <li class="nav-item listT">
                    <a class="nav-link text-dark" href="#">
                        <i class="fas fa-user-graduate fs-5"></i><b>&nbsp;Teacher's</b>
                    </a>
                </li>
                <li class="nav-item dropdown listT">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fab fa-buffer fs-5"></i><b>&nbsp;Dashbord</b>
                    </a>
                    <ul class="dropdown-menu p-1 ">
                        <li class="">
                            <a class="dropdown-item" href="{{ route ('Student.home')}}">
                                <i class="fas fa-users  text-info"></i><b>&nbsp;Student</b>
                            </a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-book fs-5"></i><b> &nbsp;Subjects </b>
                            </a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('Classes.home') }}">
                                <i class="fab fa-microsoft fs-5 text-primary"></i><b> &nbsp;Classes </b>
                            </a>
                        </li>
                        {{-- <li><hr class="dropdown-divider"></li> --}}
                        <li class="">
                            <a class="dropdown-item" href="#">
                                <i class="fas  fa-money-check-alt text-danger"></i><b>&nbsp;Finances</b>
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth

        </ul>

        <form class="d-flex my-2 " role="search" style="width:25rem ">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


      <div class="col-md-1"></div>
        @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown listT">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <b class="text-center"> {{ $admin->prenom}}</b> &nbsp;<img src="{{ asset('storage/'.$admin->photo ?? 'default-image.png') }}" class="img-fluid rounded-circle "
                            alt="Admin Photo" style="width:3rem; height:3rem">
                </a>
                    <ul class="dropdown-menu p-1 ">
                        <li >

                            <a class="dropdown-item my-1" href="{{ route('Admin.shwAc', ['admin' => Auth::user()->id]) }}">

                               <i class="fas fa-user-edit text-info"></i><b>&nbsp;Account</b>
                            </a>
                        </li>

                        {{-- <li><hr class="dropdown-divider"></li> --}}
                        <li class=""><a class="dropdown-item  py-0" href="{{ route('Admin.logOutA') }}"><i class="fas fa-sign-out-alt text-danger"></i>&nbsp;<b>Log Out</b> </a></li>
                    </ul>
                </li>
            </ul>

            @else
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item  listT">

                    <a class="nav-link" href="{{route ('inscriptionAd') }}">
                        <i class="fas fa-sign-in-alt mx-2 text-success"></i><b>Login / Register</b>
                    </a>
                </li>
            </ul>

        @endauth

    </div>
  </div>
</nav>



    {{-- cette partie indiqque les partie ou section fille qu'on pourra voir par la mere --}}

    <div>
        @yield('pageFck')
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Si vous utilisez jQuery --> --}}
    <script src="{{ asset('Bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Bootstrap5/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Js/appli.js') }}"></script>
</body>
</html>
