@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('failed'))
    <div class="alert alert-danger">{{ session('failed') }}</div>
@endif
