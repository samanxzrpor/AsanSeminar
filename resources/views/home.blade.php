@extends('layouts.main')

@section('content')
        <div class="row justify-content-center">
            <div class="header">
                <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
                @hasrole('Admin')
                   <a href="{{ route('admin.webinars')}}"> <button type="button" class="btn btn-primary">پنل ادمین</button></a>
                @else
                    <a> <button type="button" class="btn btn-primary">پنل کاربری</button></a>
                @endhasrole
            </div>
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
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($webinars as $webinar)
                            <tr class="table-primary">
                                <td>{{$webinar->id}}</td>
                                <td><a href="">{{$webinar->title}}</a></td>
                                <td><a href="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus facere quaerat quam doloribus maxime quo ipsa, quisquam amet rem, placeat quos totam delectus distinctio, animi asperiores sunt. Quas, consequuntur iure.</a></td>
                                <td>5000</td>
                                <td>1401.02.25</td>
                                <td>در حال اجرا</td>
                                <td>250</td>
                            </tr>
                        @endforeach

                            <tr class="table-success">
                            <td>1</td>
                                <td>asan semianr</td>
                                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus facere quaerat quam doloribus maxime quo ipsa, quisquam amet rem, placeat quos totam delectus distinctio, animi asperiores sunt. Quas, consequuntur iure.</td>
                                <td>5000</td>
                                <td>1401.02.25</td>
                                <td>در حال اجرا</td>
                                <td>250</
                            </tr>
                            <tr class="table-danger">
                            <td>1</td>
                                <td>asan semianr</td>
                                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus facere quaerat quam doloribus maxime quo ipsa, quisquam amet rem, placeat quos totam delectus distinctio, animi asperiores sunt. Quas, consequuntur iure.</td>
                                <td>5000</td>
                                <td>1401.02.25</td>
                                <td>در حال اجرا</td>
                                <td>250</
                            </tr>
                            <tr class="table-warning">
                            <td>1</td>
                                <td>asan semianr</td>
                                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus facere quaerat quam doloribus maxime quo ipsa, quisquam amet rem, placeat quos totam delectus distinctio, animi asperiores sunt. Quas, consequuntur iure.</td>
                                <td>5000</td>
                                <td>1401.02.25</td>
                                <td>در حال اجرا</td>
                                <td>250</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
