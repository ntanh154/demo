@extends('section')
<form class="form-login" action={{route('user.edit')}} method="POST" enctype="multipart/form-data">
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

    @if(Session::has('error_email'))
        <p>{{Session::get('error_email')}}</p>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="..." class="rounded me-2" alt="...">
              <strong class="me-auto">Bootstrap</strong>
              <small>11 mins ago</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Hello, world! This is a toast message.
            </div>
        </div>
    @endif
    <div class="header-form">
        <h1 class="text-center">Update User</h1>
    </div>

    @if(!empty($user))
        <div class="form-floating my-3">
            <input type="email" class="form-control" readonly name="email" id="floatingInput" placeholder="name@example.com" value={{$user['email']}}>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" >
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating my-3">
            <input type="password" class="form-control" name="password_confirmation" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Re-Password</label>
        </div>
        <div class="form-floating">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
    @endif
    
    <button type="submit" name="submit" class="btn btn-primary btn-lg mt-3">Update User</button>
</form>