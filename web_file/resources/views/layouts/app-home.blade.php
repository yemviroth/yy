<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=yes">

    @yield('meta')

    <!-- <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> -->
    <link href='https://fonts.googleapis.com/css?family=Bayon|Francois+One' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.12.0-web/css/all.min.css')}}  ">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}} ">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('js/simple-lightbox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <!-- <link rel="stylesheet" href="{{ asset('css/sidebarNavigation.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">


    <!-- test side nav -->
    <link rel="stylesheet" href="{{ asset('style3.css')}}">

    <!-- nav -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- <script src="{{asset('js/sidebarNavigation.js')}}"></script> -->

    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/crawler.js')}}"></script>





    <title>TheYeon Cambodia</title>

</head>

<body style="font-size: 0.9rem">

    @php
    // echo \Request::route()->getName();
    // echo "<br>";
    @endphp




@component('layouts.app-nav')

@endcomponent

    <!-- end of navbar -->

    <div class="overlay"></div>
    <div class=""></div>


    @yield('content')

    <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-kh" id="exampleModalCenterTitle">ស្វែងរក</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('search')}}" method="GET" class="form-group">
                    @csrf
                    <div class="container-fluid">
                        <div class="row pt-2">

                            <div class="col-10">

                                <input name="search" class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-outline-success d-inline" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                </form>

            </div>

        </div>
        </form>

        <div class="modal-footer text-kh text-light">

            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">បិទ</button>

        </div>
    </div>



    </div>
    </div>



    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-kh" id="exampleModalCenterTitle">ស្វែងរក</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                </div>

            </div>
        </div>
    </div>

    <!-- footer -->
    @component('layouts.app-footer')
@endcomponent



        @yield('script')

        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>

        <script>
            // When the user scrolls down 50px from the top of the document, resize the header's font size
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 20) {
                    document.getElementById("header").style.opacity = "80%";
                } else {
                    document.getElementById("header").style.opacity = "100%";
                }
            }
        </script>



        <script type="text/javascript">
            $(document).ready(function() {
                // $("#sidebar").mCustomScrollbar({
                //     theme: ""
                // });

                $('#dismiss, .overlay').on('click', function() {
                    $('#sidebar').removeClass('active');
                    $('.overlay').removeClass('active');
                });

                $('.wrapper').on('click', function() {
                    $('#sidebar').removeClass('active');
                    $('.overlay').removeClass('active');
                });

                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').addClass('active');
                    $('.overlay').addClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>



</body>

</html>