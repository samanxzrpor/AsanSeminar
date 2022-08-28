

    <div class="container">
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.webinars.index') active @endif" href="{{route('admin.webinars.index')}}">Webinars</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.users.index') active @endif" href="{{route('admin.users.index')}}" >Users</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.discount_codes.index') active @endif" href="{{route('admin.discount_codes.index')}}" >Discount Code</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.orders.index') active @endif" href="{{route('admin.orders.index')}}" >Orders</a>
            <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'admin.payments.index') active @endif" href="{{route('admin.payments.index')}}" >Payments</a>
        </nav>
