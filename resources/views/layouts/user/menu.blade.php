
<nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link " href="{{route('webinars.list')}}">خانه</a>
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'user.profile.index') active @endif"
       href="{{route('user.profile.index' , auth()->user())}}">پروفایل</a>
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'user.webinars.index') active @endif"
       href="{{route('user.webinars.index' , auth()->user())}}">وبینار های خریداری شده</a>
    @hasrole('Master')
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'master.webinars.index') active @endif"
       href="{{route('user.my-webinars.index' , auth()->user())}}">وبینار های من</a>
    @endhasrole
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'user.payments.index') active @endif"
       href="{{route('user.payments.index' ,auth()->user())}}" >پرداخت ها</a>
    <a class="flex-sm-fill text-sm-center nav-link @if(Route::currentRouteName() === 'wallet.index') active @endif"
       href="{{route('wallet.index' ,auth()->user())}}" >کیف پول</a>
</nav>

