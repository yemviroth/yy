<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    
    <title>Dashboard</title>
    <link href="{{asset('css/styles4.css')}}" rel="stylesheet" />

    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
    <script src="https://cdn.tiny.cloud/1/1815afeqsrhosjhzfw26a8bl2ck5rvgo2qjh0jv9rvrdgmh1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        .col-form-label{
            font-weight:bold;
        }
    </style>
</head>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="">The Yeon Cambodia</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form> -->
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark shadow" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="{{route('home.index')}}" target="_blank">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                            <img class="mx-auto my-0 rounded-circle" style="width:110px" src="{{asset('images/logo-sm.jpg')}}" alt="">
                        </a>
                        <div class="sb-sidenav-menu-heading">ផលិតផល</div>

                        <div class="" id="collapseProduct" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('category.list')}}">បញ្ជីរប្រភេទផលិតផល</a>                            
                            </nav>
                        </div>

                        <div class="" id="collapseProduct" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                
                                <a class="nav-link" href="{{route('productdetail.list')}}">បញ្ចីរផលិតផល</a>

                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">អ្នកប្រើប្រាស់</div>
                       

                        <div class="" id="collapseUser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                              
                                <a class="nav-link" href="{{route('user.index')}}">បញ្ជីរអ្នកប្រើប្រាស់</a>

                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">ដំណាងចែកចាយ</div>
                        

                        <div class="" id="collapseDis" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('brand.list')}}">បញ្ជីរដំណាងចែកចាយ</a>

                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">ក្រុមហ៊ុន</div>
                        <a class="nav-link" href="{{route('company.edit','1')}}"> <i class="fas fa-building"></i> <span
                                class="pl-2">ពត៌មានក្រុមហ៊ុន</span></a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: {{ Auth::user()->name}}</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                   
                    @yield('content')

                    @if ($message = Session::get('success'))

                    <div class="alert alert-success fade show" role="alert"
                        style="position:fixed;z-index:10000; width: 96%; left:2%;bottom:2px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <center><strong>{{ $message }}</strong></center>
                    </div>

                    @endif


                    @if ($message = Session::get('error'))

                    <div class="alert alert-error fade show" role="alert"
                        style="position:fixed;z-index:10000; width: 96%; left:2%;bottom:2px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <center><strong>{{ $message }}</strong></center>
                    </div>

                    @endif


                    @if ($message = Session::get('warning'))

                    <div class="alert alert-warning fade show" role="alert"
                        style="position:fixed;z-index:10000; width: 96%; left:2%;bottom:2px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <center><strong>{{ $message }}</strong></center>
                    </div>

                    @endif


                    @if ($message = Session::get('info'))

                    <div class="alert alert-info fade show" role="alert"
                        style="position:fixed;z-index:10000; width: 96%; left:2%;bottom:2px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <center><strong>{{ $message }}</strong></center>
                    </div>

                    @endif


                    @if ($errors->any())

                    <div class="alert alert-danger fade show" role="alert"
                        style="position:fixed;z-index:10000; width: 96%; left:2%;bottom:2px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <center><strong>{{ $message }}</strong></center>
                    </div>

                    @endif


                    @component('layouts.dash.app-footer')
                    @endcomponent