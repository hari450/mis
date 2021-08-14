<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bestindiakart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="./image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./../resources/css/app.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    @include('frontend.navbar')
    <span class="clearfix">
        <a href="{{ route('cartdata') }}">Cart</a>
        <span class="basket-item-count">
            <span class="badge badge-pill red"> 0 </span>
        </span>
    </span>
    <div class="container-fluid">
        @yield('content')
    </div>

    <script>
    $(document).ready(function() {
        cartload();
    });

    function cartload() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('load-cart-data') }}",
            method: "GET",
            success: function(response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge badge-pill red">' + value[
                    'totalcart'] + '</span>'));
            }
        });
    }
    </script>

    <!-- <footer class="container-fluid">
        <p>Footer Text</p>
    </footer> -->

</body>

</html>