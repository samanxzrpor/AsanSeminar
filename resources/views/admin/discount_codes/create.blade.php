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
                                <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="عنوان کد" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" value="{{old('discount_code')}}" name="discount_code" placeholder="کد" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" value="{{old('amount')}}" name="amount" placeholder="مقدار تخفیف درصدی - عددی" aria-label="Event Date">
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-sm">
                                <select class="form-control" value="{{old('discount_type')}}" name="discount_type">
                                    <option value="percentage">درصدی</option>
                                    <option value="amount">عددی</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-control" value="{{old('webinar_id')}}" name="webinar_id">
                                    @foreach($webinars as $webinar)
                                        <option value="{{ $webinar->id}}">{{$webinar->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm">شروع :
                                <input type="text" class="form-control start-date" aria-label="Start Date">
                                <input class="alt-field-start"  name="start_date"  type="hidden">
                            </div>
                            <div class="col-sm">اتمام :
                                <input type="text" class="form-control expire-date" aria-label="Expire Date">
                                <input class="alt-field-expire"  name="expire_date"  type="hidden">
                            </div>
                            <div class="col-sm">
                                <br>
                                <input type="number" class="form-control" value="{{old('discount_code_count')}}" name="discount_code_count" placeholder="تعداد کد " aria-label="title">
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
@push('scripts')
        <script>
            var pd1 = $(".start-date").persianDatepicker({
                altField: '.alt-field-start',
                timePicker: {
                    enabled: true,
                },
            });
            pd1.setDate({{old('start_date')}})

            var pd2 = $(".expire-date").persianDatepicker({
                altField: '.alt-field-expire',
                timePicker: {
                    enabled: true,
                },
            });
            pd2.setDate({{old('expire_date')}})
        </script>
@endpush
@endsection

