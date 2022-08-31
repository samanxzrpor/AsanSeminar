<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="/css/main.css">
    <title>Online Education</title>
</head>
<body>
    <div class="container">
        <form action="{{route('transaction.store')}}"  method="post">
            @csrf
            <input type="hidden" name="type" value="{{$type}}">
            <div class="row">
                <div class="col">
                    <input type="text" name="amount" class="form-control" value="{{$amount}}" aria-label="First name">
                </div>
            </div>
            <div class="row g-3">
                <div class="col">
                    <input type="submit" class="form-control btn btn-success" name="success" value="پرداخت" aria-label="First name">
                </div>
                <div class="col">
                    <input type="submit" class="form-control btn btn-danger" name="failed" value="انصراف" aria-label="Last name">
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
