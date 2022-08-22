<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="/css/main.css">
    <title>Online Education</title>
</head>
<body>
    <div class="container">
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.webinars') active @endif" href="{{route('admin.webinars')}}">Webinars</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.users') active @endif" href="{{route('admin.users')}}" href="#">Users</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.discount-codes') active @endif" href="{{route('admin.discount-codes')}}" href="#">Discount Code</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.orders') active @endif" href="{{route('admin.orders')}}" href="#">Orders</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.payments') active @endif" href="{{route('admin.payments')}}" href="#">Payments</a>
        </nav>
