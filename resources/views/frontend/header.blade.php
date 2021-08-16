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
     <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/change-password.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/request-catalogs.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/') }}/owl-slider/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/owl-slider/owl.theme.default.min.css">


</head>
<body>

@include('frontend.navbar')

