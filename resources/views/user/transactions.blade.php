@extends('layouts.user.main')

@section('user-content')
    <div class="row justify-content-center">
        @include('errors.error')
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
        </div>
        <div class="webinar-content">
            <h1 class="header">{{ __('پرداخت های من') }}</h1>
            <div class="webinars">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>شناسه</td>
                        <td>مقدار</td>
                        <td>توضیحات</td>
                        <td>تاریخ ثبت</td>
                        <td>نوع</td>
                        <td>وضعیت</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        @if($transaction->status == 'success')
                            <tr class="table-success">
                                <td>{{$transaction->id}}</td>
                                <td><a href="">{{$transaction->amount}}</a></td>
                                <td><a href="">{{$transaction->description}}</a></td>
                                <td>{{\Core\Traits\JalaliDate::changeToJalali($transaction->register_date)}}</td>
                                <td>{{$transaction->type}}</td>
                                <td>{{'موفق'}}</td>
                            </tr>
                        @elseif($transaction->status == 'failed')
                            <tr class="table-danger">
                                <td>{{$transaction->id}}</td>
                                <td><a href="">{{$transaction->amount}}</a></td>
                                <td><a href="">{{$transaction->description}}</a></td>
                                <td>{{\Core\Traits\JalaliDate::changeToJalali($transaction->register_date)}}</td>
                                <td>{{$transaction->type}}</td>
                                <td>{{'ناموفق'}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
