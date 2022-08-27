@extends('layouts.user.main')

@section('user-content')
    <div class="wallet-amount btn btn-warning">
        مقدار کیف پول :
        <span>{{auth()->user()->wallet_amount}}</span>
    </div>
    <br>
    <span>کیف پول خود را شارژ کنید</span>
    <div class="charge-wallet-amount">
        <form class="wallet-form" action="{{route('shaparak' , ['type' => 'deposit'])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm">
                    <input type="number" class="form-control" name="charge_amount" placeholder="مقدار شارژ" aria-label="Number">
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
@endsection
