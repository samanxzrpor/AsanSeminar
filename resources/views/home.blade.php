@extends('layouts.main')

@section('content')
        <div class="row justify-content-center">
            <div class="header">
                @if(auth()->check())
                    <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
                    @hasrole('Admin')
                    <a href="{{ route('admin.webinars.index')}}"> <button type="button" class="btn btn-primary">پنل ادمین</button></a>
                    @endhasrole
                    @hasrole('Accountant')
                    <a href="{{ route('accountant.webinars.index' ,auth()->user())}}"> <button type="button" class="btn btn-primary">پنل حسابدار</button></a>
                    @endhasrole
                    @hasanyrole('User|Master')
                    <a href="{{ route('user.webinars.index' , auth()->user())}}" > <button type="button" class="btn btn-primary">پنل کاربری</button></a>
                    @endhasrole
                @endif
            </div>
            <div class="webinar-content">
                <h1 class="header">{{ __('وبینار') }}</h1>
                <div class="webinars">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>شناسه</td>
                                <td>عنوان</td>
                                <td>توضیخات</td>
                                <td>قیمت</td>
                                <td>تاریخ اجرا</td>
                                <td>وضعیت</td>
                                <td>ظرفیت</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($webinars as $webinar)
                            @if($webinar->status == 'pending')
                                <tr class="table-primary">
                                    <td>{{$webinar->id}}</td>
                                    <td><a href="">{{$webinar->title}}</a></td>
                                    <td><a href="">{{$webinar->description}}</a></td>
                                    <td>
                                        @if ($webinar->percentage_discount)
                                            <span class="price">{{$webinar->price}}</span>
                                            <span class="discount-price">{{$webinar->price - ($webinar->price * ($webinar->percentage_discount/100))}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{'در انتظار'}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        @if(!auth()->check() || !$user->hasRole('Admin') || $user->id != $webinar->master_id)
                                            <a href="{{route('checkout' , ['webinar' => $webinar , 'user' => $user])}}"><button class="btn btn-warning">خرید</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @elseif($webinar->status == 'performing')
                                <tr class="table-warning">
                                    <td>{{$webinar->id}}</td>
                                    <td><a href="">{{$webinar->title}}</a></td>
                                    <td><a href="">{{$webinar->description}}</a></td>
                                    <td>
                                        @if ($webinar->percentage_discount)
                                            <span class="price">{{$webinar->price}}</span>
                                            <span class="discount-price">{{$webinar->price - ($webinar->price * ($webinar->percentage_discount/100))}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{'در حال اجرا'}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        @if(!auth()->check() || !$user->hasRole('Admin') || $user->id != $webinar->master_id)
                                            <a href="{{route('checkout' , ['webinar' => $webinar , 'user' => $user])}}"><button class="btn btn-warning">خرید</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @elseif($webinar->status == 'cancelled')
                                <tr class="table-danger">
                                    <td>{{$webinar->id}}</td>
                                    <td><a href="">{{$webinar->title}}</a></td>
                                    <td><a href="">{{$webinar->description}}</a></td>
                                    <td>
                                        @if ($webinar->percentage_discount > 0)
                                            <span class="price">{{$webinar->price}}</span>
                                            <span class="discount-price">{{$webinar->price - ($webinar->price * ($webinar->percentage_discount/100))}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{'کنسل شده'}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        @if(!auth()->check() || !$user->hasRole('Admin') || $user->id != $webinar->master_id)
                                            <a href="{{route('checkout' , ['webinar' => $webinar , 'user' => $user])}}"><button class="btn btn-warning">خرید</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @elseif($webinar->status == 'finished')
                                <tr class="table-light">
                                    <td>{{$webinar->id}}</td>
                                    <td><a href="">{{$webinar->title}}</a></td>
                                    <td><a href="">{{$webinar->description}}</a></td>
                                    <td>
                                        @if ($webinar->percentage_discount)
                                            <span class="price">{{$webinar->price}}</span>
                                            <span class="discount-price">{{$webinar->price - ($webinar->price * ($webinar->percentage_discount/100))}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{'به اتمام رسیده'}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        @if(!auth()->check() || !$user->hasRole('Admin') || $user->id != $webinar->master_id)
                                        <a href="{{route('checkout' , ['webinar' => $webinar , 'user' => $user])}}"><button class="btn btn-warning">خرید</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
