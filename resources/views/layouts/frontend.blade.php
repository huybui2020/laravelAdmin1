<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> --}}



<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .logo{
        position: relative;
        left: -20px;
    }
    .navbar-light .navbar-nav .nav-link {
        color: #360a63 !important;
        text-transform: uppercase;
        font-weight: 600;
        font-family: 'Nunito', sans-serif;
    }
    .cate_heading{
        color: cornsilk !important;
        text-transform: uppercase;
        font-weight: 600; font-size: 22px;
        font-family: 'Nunito', sans-serif;
        background-image: linear-gradient(to right, #360a63, rgba(255,0,0,0));
        padding-left: 10px;
        padding-right: 50px;
        padding-top: 10px; padding-bottom: 10px;
        max-width: 90%;
    }

    .title_detail {
        font: 700 16px/20px "Times New Roman", Times, serif !important;
        color: #004175;
    }

    .title_detail:hover {
        color: #4f82ac;
    }

    a:link {
        text-decoration: none;
    }

    .img_cate {
        width: 100%;
        padding: 2px;
        float: left;
        margin-right: 5px;
        padding-top: 1em;
    }

    .cate_teaser {
        font: 400 16px/20px "Times New Roman", Times, serif !important;
        color: #004175;
    }

    .post_title {
        font: 700 24px/23px "Times New Roman";
        color: #004175;
    }

    .post_teaser {
        font: 700 16px/18px "Times New Roman";
        color: #5f5f5f;
        margin-top: 10px !important;
    }

    .post_content,
    p, .post_content p {
        margin-bottom: 2%;
        padding: auto !important;
        line-height: 20px !important;
        font-family: Times New Roman;
        font-size: 12pt;
        text-align: justify;
    }

    img {
        object-fit: contain;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        display: block;
        margin: 0 auto
    }
    figure.image figcaption p, figure.video figcaption p, .img_desc {
    margin-bottom: 0;
    font-family: tahoma;
    font-size: 13px;max-width: 80%; display: block; margin: 0 auto;
}
.carousel-inner{max-height: 280px !important}
@media only screen and (max-width: 768px)
{
    #leftside {display: none}
    .carousel-inner{max-height: 280px !important}
}

</style>

</head>
<body>
    <div id="app">
        <div class="container">
            <!-- navbar -->
            @include('layouts.nav_frontend')
            <!-- carousel -->
            @include('layouts.carousel')

        <main class="py-4" style="margin-top: 10px">
            <div class="row">

                <div class="col-sm-4 col-sm-pull-8" id="leftside">
                    @include('layouts.leftside')
                </div>
                <div class="col-sm-8 col-sm-push-4" style="min-height: 800px">@yield('content')</div>
            </div>
        </main>

        <hr/>

        <div class="container">
            <p style="text-align: center">&copy; {{ date('Y') }}. Created by <a href="mailto:trungnhvn@gmail.com">TrungNH</a></p>
            <br/>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            // Navigation active
            $('ul.navbar-nav a[href="{{ "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}"]').closest('li').addClass('active');
        });
    </script>

    @yield('scripts')
</body>
</html>
