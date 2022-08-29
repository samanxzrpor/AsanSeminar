@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <a href="{{url()->previous()}}"><button type="button" class="btn btn-outline-dark">برگشت</button></a>
            <div class="webinar-content webinar-form">
                <h1 class="header">{{ __('وبینار جدید') }}</h1>
                <div class="form-content">
                    @include('errors.error')
                    <form class="webinar-form" action="{{route('admin.meetings.store' , $webinar)}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="عنوان جلسه" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" value="{{old('meeting_duration')}}" name="meeting_duration" placeholder="مدت زمان جلسه" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('max_capacity')}}" name="max_capacity" placeholder="ظرفیت جلسه" aria-label="Number">
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="" class="form-label">توضیحات جلسه</label>
                            <textarea class="form-control" id="" name="description" rows="3">{{old('description')}}</textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm">
                                <input type="text" class="form-control event-date"  aria-label="Event Date">
                                <input class="alt-field-event"  name="event_date"  type="hidden">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="has_record" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    ضبط جلسه
                                </label>
                            </div>
                        </div>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
@endsection
