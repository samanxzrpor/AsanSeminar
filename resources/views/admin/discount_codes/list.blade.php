@extends('layouts.admin.main')

@section('admin-content')
        <div class="row justify-content-center">
            <div class="header">
                <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            </div>
            <div class="webinar-content">
                <h1 class="header">{{ __('کد های تخفیف') }}</h1>
                <div class="webinars">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>شناسه</td>
                                <td>عنوان</td>
                                <td>کد</td>
                                <td>نوع</td>
                                <td>قیمت</td>
                                <td>وضعیت</td>
                                <td>تاریخ شروع</td>
                                <td>تاریخ اتمام</td>
                                <td>تعداد</td>
                                <td>وبینار</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($discount_codes as $code)
                                <tr class="table">
                                    <td>{{$code->id}}</td>
                                    <td><a href="">{{$code->title}}</a></td>
                                    <td><a href="">{{$code->discount_code}}</a></td>
                                    <td>{{$code->discount_type}}</td>
                                    <td>{{$code->discount_type == 'percentage' ? $code->amount . '%' : $code->amount. 'تومان' }}</td>
                                    <td>{{$code->is_active ? 'فعال' : 'غیرفعال'}}</td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($code->start_date)}}</td>
                                    <td>{{\Core\Traits\JalaliDate::changeToJalali($code->expires_date)}}</td>
                                    <td>{{$code->discount_code_count}}</td>
                                    <td>{{$code->webinar->title}}</td>
                                    <td></td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
