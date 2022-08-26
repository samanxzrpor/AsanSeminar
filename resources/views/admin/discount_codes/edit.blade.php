@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <div class="webinar-content webinar-form">
                <h1 class="header">{{ __('وبینار جدید') }}</h1>
                <div class="form-content">
                    @include('errors.error')
                    <form class="webinar-form" action="{{route('admin.discount_codes.update' , $discountCode)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row g-3">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="title" value="{{$discountCode->title}}" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="discount_code" value="{{$discountCode->discount_code}}" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" name="amount" value="{{$discountCode->amount}}" aria-label="Event Date">
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-sm">
                                <select class="form-control" name="discount_type">
                                    <option value="percentage" {{$discountCode->discount_type == 'percentage' ? 'selected' : ''}} {{$discountCode}}>درصدی</option>
                                    <option value="amount"  {{$discountCode->discount_type == 'amount' ? 'selected' : ''}} >عددی</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-control" name="webinar_id">
                                    @foreach($webinars as $webinar)
                                        <option value="{{ $webinar->id}}"  {{$discountCode->webinar_id == $webinar->id ? 'selected' : '' }}>{{$webinar->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm">شروع :
                                <input type="text" class="form-control event-date" aria-label="Event Date">
                                <input class="alt-field-event" value="{{$discountCode->start_date}}"  name="start_date"  type="hidden">
                            </div>
                            <div class="col-sm">اتمام :
                                <input type="text" class="form-control event-date"  placeholder="1400-03-20" aria-label="Event Date">
                                <input class="alt-field-event" value="{{$discountCode->expire_date}}"  name="expire_date"  type="hidden">
                            </div>
                            <div class="col-sm">
                                <br>
                                <input type="number" class="form-control" name="discount_code_count" value="{{ $discountCode->discount_code_count}}" aria-label="title">
                            </div>
                        </div>
                        <div class="row mb">
                            <div class="col-sm">فعال :
                                <label>
                                    <input type="checkbox" name="is_active"  class="form-check-input" {{$discountCode->is_active ? 'checked' : ''}}>
                                </label>
                            </div>
                            <b>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
@endsection

