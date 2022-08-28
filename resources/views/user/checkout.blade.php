@extends('layouts.user.main')

@section('user-content')
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
                    <span class="text-muted">{{$webinar->price - ($webinar->price * ($webinar->percentage_discount/100))}}</span>
                </li>
            </ul>
            <div id="total-amount">

            </div>
            @if($webinar->can_use_discount == 'on')
                <form class="card p-2"  id="discount-form" >
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="code" placeholder="Discount code">
                        <div class="input-group-append">
                            <button type="button" onclick="applyDiscount()" class="btn btn-secondary">اعمال کد تخفیف</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" >
                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" value="{{$user->name}}" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="credit">پرداخت مستقیم</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="debit">پرداخت از کیف پول</label>
                    </div>
                </div>
                <div class="row">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
            </form>
        </div>
    </div>
@endsection
