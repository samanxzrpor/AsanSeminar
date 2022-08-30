@extends('layouts.user.main')

@section('user-content')
    @push('csrf-protection')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endpush
    @include('errors.error')
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$webinar->title}}</h6>
                        <small class="text-muted">{{$webinar->description}}</small>
                    </div>
                    <span class="price">{{$webinar->price}}<span class="discount-price">{{$discount_price}}</span></span>
                </li>
            </ul>
            <div id="total-amount">

            </div>
            @if($webinar->can_use_discount == 'on')
                <form class="card p-2"  id="discount-form" >
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" id="code" placeholder="Discount code">
                        <div class="input-group-append">
                            <button type="button" onclick="applyDiscount()" class="btn btn-secondary">اعمال کد تخفیف</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>

        <div class="col-md-8 order-md-1">
            <form class="needs-validation" action="{{route('checkout.buyWebinar' ,$webinar )}}" method="post">
                @csrf
                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="direct-deposit" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="credit">پرداخت مستقیم</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="wallet" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="debit">پرداخت از کیف پول</label>
                    </div>
                </div>
                <div class="mb">
                    <div class="custom-control">
                        <input id="discount-input" name="discount-code" type="text" class="form-control">
                        <label class="custom-control-label" for="credit">کد تخفیف</label>
                    </div>
                </div>
                <div class="row">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            function applyDiscount() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('checkout.apply-code' , $webinar)}}",
                    type: "POST",
                    datatype: "json",
                    data: {code:$("#code").val()},
                    success: function (data) {
                        $("#total-amount").html(data);
                        if(data > 0)
                            $("#discount-input").val($("#code").val());
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        console.log(jqXHR);
                    }
                })
            }
        </script>
    @endpush
@endsection
