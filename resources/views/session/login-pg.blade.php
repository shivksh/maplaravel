<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('log') }}" method ="post">
    @csrf
    <input type="text" placeholder="Enter Name" name="name">
    <input type="email" placeholder="Enter email" name="email">
    <input type="submit">

    
    </form>
</body>
</html>