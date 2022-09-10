@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
        </div>
        <div class="webinar-content">
            @include('errors.error')
            <h1 class="header">{{ __('سفارشات') }}</h1>
            <div class="webinars">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>شناسه</td>
                        <td>وضعیت</td>
                        <td>کد تخفیف</td>
                        <td>کاربر</td>
                        <td>وبینار</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="table-primary">
                            <td>{{$order->id}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->discount_code?->title}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->webinar->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
