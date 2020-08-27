@extends('forms.form-template')

@section('content')


 <h1 class="mt-5" > Register </h1>


    <form action=" {{ route('register-data') }} " method="post" enctype="multipart/form-data">      
   {{ @csrf_field() }}

         <div class="mt-5">
               <label for=""> Name </label> <br>
               <input type="text" id="input" name="name" class="form-control" placeholder="Enter Name"><br>
         </div>

         <div >
               <label for=""> Email </label> <br>
               <input type="email" id="input" name="email" class="form-control" placeholder="Enter Email"><br>
         </div>

         <div >
               <label for=""> Password </label> <br>
               <input type="password" id="input" name="password" class="form-control" placeholder="Enter Password"><br>
         </div>

         <div >
               <label for=""> Confirm Password </label> <br>
               <input type="password" id="input" name="password_confirmation" class="form-control" placeholder="Confirm Password"><br>
         </div>

         <div >
               <label for=""> Upload Image </label> <br>
               <input type="file" name="image"><br>
         </div>
         <button type="submit" class="btn btn-primary btn-sm btn-block mt-3"> Submit  </button>
         <p class="mt-1">Already Registered ? <a href="login-page">Login Here</a> </p>



    </form>     

   


@endsection