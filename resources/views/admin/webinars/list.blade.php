@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            @hasrole('Admin')
            <a href="{{ route('admin.webinars.create')}}"><button type="button" class="btn btn-success">وبینار جدید</button></a>
            @endhasrole
        </div>
            <div class="webinar-content">
            @include('errors.error')
            <h1 class="header">{{ __('وبینار ها') }}</h1>
            <div class="webinars">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>شناسه</td>
                        <td>عنوان</td>
                        <td>توضیخات</td>
                        <td>قیمت</td>
                        <td>درصد تخفیف</td>
                        <td>تاریخ اجرا</td>
                        <td>وضعیت</td>
                        <td>ظرفیت</td>
                        <td>امکان استفاده از کد تخفیف</td>
                        <td>نمایش به همه</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($webinars as $webinar)
                        @if($webinar->status == 'pending')
                        <tr class="table-primary">
                            <td>{{$webinar->id}}</td>
                            <td><a href="{{route('admin.meetings.index' , $webinar)}}">{{$webinar->title}}</a></td>
                            <td><a href="">{{$webinar->description}}</a></td>
                            <td>{{$webinar->price}}</td>
                            <td>{{$webinar->percentage_discount}}</td>
                            <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                            <td>{{$webinar->status}}</td>
                            <td>{{$webinar->max_capacity}}</td>
                            <td>{{$webinar->can_use_discount}}</td>
                            <td>{{$webinar->show_all}}</td>
                            @hasrole('Admin')
                            <td>
                                <a  href="{{ route('admin.webinars.edit' , $webinar)}}"><button type="button" class="btn btn-warning">بروزرسانی</button></a>
                                <form action="{{ route('admin.webinars.destroy' , $webinar) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                            @endhasrole
                        </tr>
                        @elseif($webinar->status == 'performing')
                            <tr class="table-warning">
                                <td>{{$webinar->id}}</td>
                                <td><a href="">{{$webinar->title}}</a></td>
                                <td><a href="">{{$webinar->description}}</a></td>
                                <td>{{$webinar->price}}</td>
                                <td>{{$webinar->percentage_discount}}</td>
                                <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                <td>{{$webinar->status}}</td>
                                <td>{{$webinar->max_capacity}}</td>
                                <td>{{$webinar->can_use_discount}}</td>
                                <td>{{$webinar->show_all}}</td>
                                @hasrole('Admin')
                                <td>
                                    <a  href="{{ route('admin.webinars.edit' , $webinar)}}"><button type="button" class="btn btn-warning">بروزرسانی</button></a>
                                    <form action="{{ route('admin.webinars.destroy' , $webinar) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                @endhasrole
                            </tr>
                        @elseif($webinar->status == 'cancelled')
                            <tr class="table-danger">
                                <td>{{$webinar->id}}</td>
                                <td><a href="">{{$webinar->title}}</a></td>
                                <td><a href="">{{$webinar->description}}</a></td>
                                <td>{{$webinar->price}}</td>
                                <td>{{$webinar->percentage_discount}}</td>
                                <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                <td>{{$webinar->status}}</td>
                                <td>{{$webinar->max_capacity}}</td>
                                <td>{{$webinar->can_use_discount}}</td>
                                <td>{{$webinar->show_all}}</td>
                                @hasrole('Admin')
                                <td>
                                    <a  href="{{ route('admin.webinars.edit' , $webinar)}}"><button type="button" class="btn btn-warning">بروزرسانی</button></a>
                                    <form action="{{ route('admin.webinars.destroy' , $webinar) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                @endhasrole
                            </tr>
                        @elseif($webinar->status == 'finished')
                            <tr class="table-light">
                                <td>{{$webinar->id}}</td>
                                <td><a href="">{{$webinar->title}}</a></td>
                                <td><a href="">{{$webinar->description}}</a></td>
                                <td>{{$webinar->price}}</td>
                                <td>{{$webinar->percentage_discount}}</td>
                                <td>{{\Core\Traits\JalaliDate::changeToJalali($webinar->event_date)}}</td>
                                <td>{{$webinar->status}}</td>
                                <td>{{$webinar->max_capacity}}</td>
                                <td>{{$webinar->can_use_discount}}</td>
                                <td>{{$webinar->show_all}}</td>
                                @hasrole('Admin')
                                <td>
                                    <a  href="{{ route('admin.webinars.edit' , $webinar)}}"><button type="button" class="btn btn-warning">بروزرسانی</button></a>
                                    <form action="{{ route('admin.webinars.destroy' , $webinar) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                @endhasrole
                            </tr>
                            @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
