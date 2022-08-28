<nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'accountant.webinars.index')
    active @endif" href="{{route('accountant.webinars.index' , auth()->user())}}">Webinars</a>
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'accountant.users.index')
     active @endif" href="{{route('accountant.users.index', auth()->user())}}" >Users</a>
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'accountant.orders.index')
     active @endif" href="{{route('accountant.orders.index', auth()->user())}}" >Orders</a>
</nav>
