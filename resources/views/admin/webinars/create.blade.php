@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <div class="webinar-content webinar-form">
                <h1 class="header">{{ __('وبینار جدید') }}</h1>
                <div class="form-content">
                    @include('errors.error')
                    <form class="webinar-form" action="{{route('admin.webinars.store')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="عنوان وبینار" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('price')}}" name="price" placeholder="قیمت وبینار" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control event-date"  aria-label="Event Date">
                                <input class="alt-field-event"  value="{{old('event_date')}}"  name="event_date"  type="hidden">
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="" class="form-label">توضیحات وبینار</label>
                            <textarea class="form-control" id="" name="description" rows="3">{{old('description')}}</textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm">
                                <select class="form-control" name="master_id">
                                    @foreach($masters as $master)
                                    <option value="{{ $master->id }}">{{ $master->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('percentage_discount')}}" name="percentage_discount" placeholder="درصد تخفیف وبینار" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('max_capacity')}}" name="max_capacity" placeholder="ظرفیت وبینار" aria-label="Number">
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="can_use_discount"  {{ old('can_use_discount') == 'on' ? 'checked' : '' }} type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        امکان استفاده ار کد تخفیف
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input"  {{ old('show_all') == 'on' ? 'checked' : '' }} name="show_all" type="checkbox" id="gridCheck1">
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
            <script>
                let pd = $(".event-date").persianDatepicker({
                    altField: '.alt-field-event',
                    timePicker: {
                        enabled: true,
                    },
                });
                pd.setDate({{old('event_date')}})
            </script>
    @endpush
@endsection
