@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <a href="{{ route('admin.webinars.create')}}"><button type="button" class="btn btn-success">وبینار جدید</button></a>
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
                        <td>امکان استفاده از کد تخفیف</td>
                        <td>نمایش به همه</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($webinars as $webinar)
                        <tr class="table-primary">
                            <td>{{$webinar->id}}</td>
                            <td><a href="">{{$webinar->title}}</a></td>
                            <td><a href="">{{$webinar->description}}</a></td>
                            <td>{{$webinar->price}}</td>
                            <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                            <td>{{$webinar->staus}}</td>
                            <td>{{$webinar->max_capacity}}</td>
                            <td>{{$webinar->can_use_discount}}</td>
                            <td>{{$webinar->show_all}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
