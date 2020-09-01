
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<title>Document</title>
</head>
<body> 

<div class="container-fluid">
<div class="row">
<div class="col-lg-2">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('uploads/Pics/' . $user[0]->Image) }}" alt="Card image cap">
</div>
</div>
<div class="col-lg-10">
<h1 class="mb-3">Users Data</h1>
    <table  class="table table-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Longitude</th>
      <th scope="col">Lattitude</th>
      <th scope="col">Created On</th>

    </tr>
@foreach($user as $a)
		<tr>
         <td>{{ $a->id }}</td>
        <td>{{ $a->name }}</td>
        <td>{{ $a->email }}</td>
        <td>{{ $a->phone }}</td>
        <td>{{ $a->Longitude }}</td>
        <td>{{ $a->Lattitude }}</td>
        <td>{{ $a->created_at }}</td>
        </tr>
        @endforeach
    </table>
    </div>
    </div>
    </div>
