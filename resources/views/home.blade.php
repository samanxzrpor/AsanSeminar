@extends('layouts.main')

@section('content')
        <div class="row justify-content-center">
            <div class="header">
                <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
                @hasrole('Admin')
                   <a href="{{ route('admin.webinars.index')}}"> <button type="button" class="btn btn-primary">پنل ادمین</button></a>
                @else
                    <a> <button type="button" class="btn btn-primary">پنل کاربری</button></a>
                @endhasrole
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
                                            <span class="discount-price">{{(new \Domain\Webinar\Actions\WebinarCalculateDiscountPrice())($webinar->price , $webinar->percentage_discount)}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{$webinar->status}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        <a><button class="btn btn-warning">خرید</button></a>
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
                                            <span class="discount-price">{{(new \Domain\Webinar\Actions\WebinarCalculateDiscountPrice())($webinar->price , $webinar->percentage_discount)}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{$webinar->status}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        <a><button class="btn btn-warning">خرید</button></a>
                                    </td>
                                </tr>
                            @elseif($webinar->status == 'cancelled')
                                <tr class="table-danger">
                                    <td>{{$webinar->id}}</td>
                                    <td><a href="">{{$webinar->title}}</a></td>
                                    <td><a href="">{{$webinar->description}}</a></td>
                                    <td>
                                        @if ($webinar->percentage_discount)
                                            <span class="price">{{$webinar->price}}</span>
                                            <span class="discount-price">{{(new \Domain\Webinar\Actions\WebinarCalculateDiscountPrice())($webinar->price , $webinar->percentage_discount)}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{$webinar->status}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
                                    <td>
                                        <a><button class="btn btn-warning">خرید</button></a>
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
                                            <span class="discount-price">{{(new \Domain\Webinar\Actions\WebinarCalculateDiscountPrice())($webinar->price , $webinar->percentage_discount)}}</span>
                                        @else
                                            <span>{{$webinar->price}}</span>
                                        @endif
                                    </td>                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                    <td>{{$webinar->status}}</td>
                                    <td>{{$webinar->max_capacity}}</td> <td>
                                        <a><button class="btn btn-warning">خرید</button></a>
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
