<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=from, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('login.user')}}" method="post">
        @csrf
        <h1>Sign In</h1>
        <div class="input-group">
        <label for="">Email:</label>
        <input type="email" name="email" placeholder="Name..." />
        </div>
        <div class="input-group">
            <label for="">Password: </label>
        <input type="password" name="password" placeholder="Password..." />
        </div>
        <div>
            <button type="submit" name="submit" class="btn">Sign in</button>
        </div>
    </form>
</body>
</html>