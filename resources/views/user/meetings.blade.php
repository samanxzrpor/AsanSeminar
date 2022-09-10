@extends('layouts.admin.main')

@section('admin-content')
<div class="row justify-content-center">
    <div class="header">
        <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
    </div>
    <div class="webinar-content">
        @include('errors.error')
        <h1 class="header">{{ __('جلسات') }}</h1>
        <div class="webinars">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td>شناسه</td>
                    <td>عنوان</td>
                    <td>توضیحات</td>
                    <td>مدت جلسه</td>
                    <td>امکان ضبط</td>
                    <td>تاریخ اجرا</td>
                    <td>زمان شروع</td>
                    <td>وضعیت</td>
                    <td>ظرفیت</td>
                    <td>وبینار</td>
                </tr>
                </thead>
                <tbody>
                @foreach($meetings as $meeting)
                @if($meeting->status == 'pending')
                <tr class="table-primary">
                    <td>{{$meeting->id}}</td>
                    <td><a href="">{{$meeting->title}}</a></td>
                    <td><a href="">{{$meeting->description}}</a></td>
                    <td>{{$meeting->meeting_duration}}</td>
                    <td>{{$meeting->has_record}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->event_date)}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->start_date)}}</td>
                    <td>{{$meeting->status}}</td>
                    <td>{{$meeting->max_capacity}}</td>
                    <td>{{$meeting->webinar->title}}</td>
                </tr>
                @elseif($meeting->status == 'performing')
                <tr class="table-warning">
                    <td>{{$meeting->id}}</td>
                    <td><a href="">{{$meeting->title}}</a></td>
                    <td><a href="">{{$meeting->description}}</a></td>
                    <td>{{$meeting->meeting_duration}}</td>
                    <td>{{$meeting->has_record}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->event_date)}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->start_date)}}</td>
                    <td>{{$meeting->status}}</td>
                    <td>{{$meeting->max_capacity}}</td>
                    <td>{{$meeting->webinar->title}}</td>
                </tr>
                @elseif($meeting->status == 'cancelled')
                <tr class="table-danger">
                    <td>{{$meeting->id}}</td>
                    <td><a href="">{{$meeting->title}}</a></td>
                    <td><a href="">{{$meeting->description}}</a></td>
                    <td>{{$meeting->meeting_duration}}</td>
                    <td>{{$meeting->has_record}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->event_date)}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->start_date)}}</td>
                    <td>{{$meeting->status}}</td>
                    <td>{{$meeting->max_capacity}}</td>
                    <td>{{$meeting->webinar->title}}</td>
                </tr>
                @elseif($meeting->status == 'finished')
                <tr class="table-light">
                    <td>{{$meeting->id}}</td>
                    <td><a href="">{{$meeting->title}}</a></td>
                    <td><a href="">{{$meeting->description}}</a></td>
                    <td>{{$meeting->meeting_duration}}</td>
                    <td>{{$meeting->has_record}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->event_date)}}</td>
                    <td>{{\Core\Traits\JalaliDate::changeToJalali($meeting->start_date)}}</td>
                    <td>{{$meeting->status}}</td>
                    <td>{{$meeting->max_capacity}}</td>
                    <td>{{$meeting->webinar->title}}</td>
                </tr>
                @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
