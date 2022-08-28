@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
        </div>
        <div class="webinar-content">
            @include('errors.error')
            <h1 class="header">{{ __('کاربران') }}</h1>
            <div class="webinars">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>شناسه</td>
                        <td>نام کاربر</td>
                        <td>ایمیل</td>
                        <td>شماره همراه</td>
                        <td>نقش کاربر</td>
                        <td>مقدار کیف پول</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="table-primary">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->roles[0]->name}}</td>
                            <td>{{$user->wallet_amount}}</td>
                            <td>
                                <a  href="{{ route('admin.users.edit' , $user)}}"><button type="button" class="btn btn-warning">بروزرسانی</button></a>
                                <form action="{{ route('admin.users.destroy' , $user) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
