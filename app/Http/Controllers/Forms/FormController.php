<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\LoginValidation;
use Auth;
use App\Library;

class FormController extends Controller
{
    public function loginPage(){
        return view('forms.login-page');
    }

    public function registerPage(){
        return view('forms.register-page');
    }

    public function registerData(RegisterValidation $request){
        $register = new Library;
        $register->Name = $request->name;    
        $register->Email = $request->email;         
        $register->Password =bcrypt($request->Password);        //bcrypt method encode the data for security purpose while saving paasword to db table
        if($request->hasfile('image')){
    
            $file = $request->file('image');

            $extension=$file->getClientOriginalExtension();

            $filename = time(). '.'.$extension;

            $file->move('uploads/Pics/',$filename);

            $register->Image=$filename;

        }
                $register ->save(); 
        return redirect('/login-page')->with('success','Registered Successfully Login Here');
   }



   //this method login to redirect to next page when the credential will correct
   //these credentials should be according to InsertValidation form request
   public function loginData(LoginValidation $request){
       if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
           return 'login';
       }
       return 'Not Login';
   }


}
