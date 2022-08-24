@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <div class="webinar-content webinar-form">
                <h1 class="header">{{ __('وبینار جدید') }}</h1>
                <div class="form-content">
                    @include('errors.error')
                    <form class="webinar-form" action="{{route('admin.discount_codes.store')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="title" placeholder="عنوان کد" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="discount_code" placeholder="کد" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" name="amount" placeholder="مقدار تخفیف درصدی - عددی" aria-label="Event Date">
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-sm">
                                <select class="form-control" name="discount_type">
                                    <option value="percentage">درصدی</option>
                                    <option value="amount">عددی</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-control" name="webinar_id">
                                    @foreach($webinars as $webinar)
                                        <option value="{{ $webinar->id}}">{{$webinar->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm">شروع :
                                <input type="text" class="form-control event-date"  placeholder="1400-03-20" aria-label="Event Date">
                                <input class="alt-field-event"  name="start_date"  type="hidden">
                            </div>
                            <div class="col-sm">اتمام :
                                <input type="text" class="form-control event-date"  placeholder="1400-03-20" aria-label="Event Date">
                                <input class="alt-field-event"  name="expire_date"  type="hidden">
                            </div>
                            <div class="col-sm">
                                <br>
                                <input type="number" class="form-control" name="discount_code_count" placeholder="تعداد کد " aria-label="title">
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
@endsection

