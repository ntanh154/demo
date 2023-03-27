@extends('section')
@yield('content')
<form class="form-login" action={{route('user.register')}} method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="header-form">
        <h1 class="text-center">Register</h1>
    </div>
        <div class="form-floating ">
            <input type="text" class="form-control" name="name"  placeholder="Name...">
            <label for="">Name</label>
        </div>
        <div class="form-floating my-3">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" >
            <label for="floatingPassword">Password</label>
        </div>
        
        <div class="form-floating my-3">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        {{-- <img src="./build/assets/image/user-1.png" alt=""> --}}
    <button type="submit" name="submit" class="btn btn-primary btn-lg mt-3">Register</button>
</form>