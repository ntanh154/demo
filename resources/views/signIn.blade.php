@extends('section')
@yield('title')
@section('content')
    <form class="form-login" action={{route('validate.form')}} method="POST">
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="header-form">
            <h1 class="text-center">Sign In</h1>
        </div>
        <div class="form-floating my-3">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary btn-lg mt-3">Sign in</button>
    </form>
@endsection