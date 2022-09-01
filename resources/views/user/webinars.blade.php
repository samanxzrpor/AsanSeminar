@extends('layouts.user.main')

@section('user-content')
        <div class="row justify-content-center">
            @include('errors.error')
            <div class="header">
                <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            </div>
            <div class="webinar-content">
                <h1 class="header">{{ __('وبینار های خریداری شده') }}</h1>
                <div class="webinars">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>شناسه</td>
                                <td>عنوان</td>
                                <td>توضیحات</td>
                                <td>قیمت</td>
                                <td>تاریخ اجرا</td>
                                <td>وضعیت</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($webinars as $webinar)
                            @if($webinar->status == 'open')
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
                                    <td>{{'باز'}}</td>
                                    <td>{{$webinar->max_capacity}}</td>
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
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
