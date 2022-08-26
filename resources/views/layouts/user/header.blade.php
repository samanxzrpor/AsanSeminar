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
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'user.webinars.index') active @endif"
               href="{{route('user.webinars.index' , auth()->user())}}">وبینار های خریداری شده</a>
            @hasrole('Master')
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'master.webinars.index') active @endif"
               href="{{route('master.webinars.index' , auth()->user())}}">وبینار های من</a>
            @endhasrole
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'user.orders.index') active @endif"
               href="{{route('user.orders.index' ,auth()->user())}}" >سفاراشات</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'user.payments.index') active @endif"
               href="{{route('user.payments.index' ,auth()->user())}}" >پرداخت ها</a>
        </nav>

