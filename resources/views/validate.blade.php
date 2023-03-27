<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action={{route('validate.form')}} method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Name.." />
        </div>
        <div>
            <input type="email" name="email" placeholder="Email.." />
        
        </div>
        <div>
            <input type="text" name="company" placeholder="Company.." />
    
        </div>
        <div>
            <button type="submit">submit</button>
        </div>
    </form>
</body>
</html>