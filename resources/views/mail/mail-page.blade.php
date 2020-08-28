<?php

use App\User;
$details = User::latest() ->first();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Welcome {{ $details -> name }} Good To See You  </h1>
    <img class="card-img-top" src="{{ asset('uploads/Pics/' . $details->Image) }}"  class="card-img-top"> 
    <p> Name - {{ $details -> name }} </p>
    <p> Email - {{ $details -> email }} </p>
    <p> Email - {{ $details -> phone }} </p>
    <p> Register From Location - ( {{ $details -> Longitude }}, {{ $details -> Longitude }} ) </p>

</body>
</html>
