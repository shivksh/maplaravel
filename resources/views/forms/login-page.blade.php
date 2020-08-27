@extends('forms.form-template')
@section('content')




 <h1 class="mt-5" > Login </h1>


    <form action=" {{ route('login-data') }} " method="post" enctype="multipart/form-data">      
   {{ @csrf_field() }}


   <div class="mt-5">
               <label for=""> Email </label> <br>
               <input type="email" id="input" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email"><br>
         </div>

         <div >
               <label for=""> Password </label> <br>
               <input type="password" id="input" name="password" class="form-control" placeholder="Enter Password"><br>
         </div>

         

         <button type="submit" class="btn btn-primary btn-sm btn-block mt-3"> Submit  </button>
         <p class="mt-2">Not Registered Yet ? <a href="/register-page">Register Here </p><a>

    </form>     



@endsection