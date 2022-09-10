@extends('layouts.user.main')

@section('user-content')
    @include('errors.error')
    <div class="wallet-amount btn btn-warning">
        مقدار کیف پول :
        <span>{{$walletAmount}}</span>
    </div>
    <br>
    <span>کیف پول خود را شارژ کنید</span>
    <div class="charge-wallet-amount">
        <form class="wallet-form" action="{{route('wallet.process' , auth()->user())}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm">
                    <input type="number" class="form-control" name="amount" placeholder="مقدار شارژ" aria-label="Number">
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" name="deposit" value="شارژ">
            <input class="btn btn-danger" type="submit" name="withdraw" value="برداشت">
        </form>
    </div>
@endsection
