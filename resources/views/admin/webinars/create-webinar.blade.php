@extends('layouts.admin.main')

@section('admin-content')
    <div class="row justify-content-center">
        <div class="header">
            <a href="{{ route('logout')}}"><button type="button" class="btn btn-danger">خروج</button></a>
            <div class="webinar-content">
                <h1 class="header">{{ __('وبینار جدید') }}</h1>
                <div class="form-content">
                    @include('errors.error')
                    <form class="webinar-form" action="{{route('admin.webinars.store')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="عنوان وبینار" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" placeholder="قیمت وبینار" aria-label="Number">
                            </div>
                            <div class="col-sm">
                                <input type="date" class="form-control" placeholder="Zip" aria-label="Event Date">
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="" class="form-label">توضیحات وبینار</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="row g-2">
                            <div class="col-sm">
                                <input type="text" class="form-control" placeholder="درصد تخفیف وبینار" aria-label="title">
                            </div>
                            <div class="col-sm">
                                <input type="number" class="form-control" placeholder="ظرفیت وبینار" aria-label="Number">
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        امکان استفاده ار کد تخفیف
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
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
@endsection
