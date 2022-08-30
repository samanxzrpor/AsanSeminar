@extends('layouts.user.main')

@section('user-content')
    <table class="table table-striped">
        <tr>
            <td>نام</td>
            <td>نام خانوادگی</td>
            <td>شماره همراه</td>
            <td>ایمیل</td>
        </tr>
        <tr>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
        </tr>
    </table>
@endsection
