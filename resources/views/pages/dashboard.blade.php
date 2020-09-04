<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style>

     #input{
         width:100%;
     }
   .cds{
    margin: 0 auto; width:50%;

   }

</style>

</head>
<body>
    
<div class='container cds mt-3' >

<h1> Welcome {{ $data[0] -> name }}, Good To See You  </h1> 
<div class="row">
<div class="col-lg-6">
<table class="table table-striped table-dark mt-3">

  <tbody>
    <tr>
      <td scope="row">Name</td>
      <td>{{ $data[0] -> name }}</td>
    </tr>
    <tr>
      <td scope="row">Email</td>
      <td>{{ $data[0] -> email }}</td>
    </tr>    
    <tr>
      <td scope="row">Phone</td>
      <td>{{ $data[0] -> phone }}</td>
    </tr>  
  </tbody>
</table>
</div>
<div class="col-lg-6">
<div class="card" style="width: 18rem;">
<img class="card-img-top" src="{{ asset('uploads/Pics/' . $data[0]->Image) }}"  class="card-img-top"> 
  <div class="card-body">
  </div>
</div>
</div>
</div>
@if($variable[0]->thumbups == 1 )
<a href="{{ route('dislike',$data[0]->email) }}"><button type="button" class="btn btn-primary">Dislike</button></a><br>
@else
<a href="{{ route('like',$data[0]->email) }}"><button type="button" class="btn btn-primary">Like</button></a><br>
@endif
</div>
</body>
</html>