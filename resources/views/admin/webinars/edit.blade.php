@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <div class="webinar-content webinar-form">
                <h1 class="header">{{ __('بروزرسانی وبینار ') }}</h1>
                <div class="form-content">
                    @include('errors.error')
                    <form class="webinar-form" action="{{route('admin.webinars.update' , $webinar)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row g-3">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{old('title') ?? $webinar->title}}" name="title" placeholder="عنوان وبینار" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('price') ??$webinar->price}}" name="price" placeholder="قیمت وبینار" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control event-date"  aria-label="Event Date">
                                <input class="alt-field-event" name="event_date" id="event-date"  type="hidden">
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="" class="form-label">توضیحات وبینار</label>
                            <textarea class="form-control" id=""  name="description" rows="3">{{old('description') ?? $webinar->description}}</textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm">
                                <select class="form-control" name="master_id">
                                    @foreach($masters as $master)
                                        <option value="{{$master->id}}" {{$master->id == $webinar->master->id}}>{{$master->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('percentage_discount') ??$webinar->percentage_discount}}" name="percentage_discount" placeholder="درصد تخفیف وبینار" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('max_capacity') ??$webinar->max_capacity}}" name="max_capacity" placeholder="ظرفیت وبینار" aria-label="Number">
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="can_use_discount" {{$webinar->can_use_discount == 'on' ? 'checked' : ''}} type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        امکان استفاده از کد تخفیف
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" {{$webinar->show_all ? 'checked' : ''}}  name="show_all" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        نمایش به عموم
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
{{--            <script>--}}
{{--                var pd = $('#event-date').persianDatepicker();--}}
{{--                pd.setDate({{\Carbon\Carbon::parse($webinar->event_date)->getTimestamp()}})--}}
{{--            </script>--}}
    @endpush
@endsection
