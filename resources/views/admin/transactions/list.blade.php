@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
        </div>
        <div class="webinar-content">
            @include('errors.error')
            <h1 class="header">{{ __('پرداختی ها') }}</h1>
            <div class="webinars">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>شناسه</td>
                        <td>مقدار</td>
                        <td>توضیحات</td>
                        <td>تاریخ ثبت</td>
                        <td>وضعیت</td>
                        <td>نوع</td>
                        <td>کاربر</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr class="table-primary">
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->register_date}}</td>
                            <td>{{$transaction->status}}</td>
                            <td>{{$transaction->type}}</td>
                            <td>{{$transaction->user->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
