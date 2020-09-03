<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\LoginValidation;
use Auth;
use DB;
use App\Jobs\DoJob;
use App\User;

class FormController extends Controller
{
    public function loginPage(){
        return view('forms.login-page');
    }

    public function registerPage(){
        return view('forms.register-page');
    }

    public function registerData(RegisterValidation $request){
        $register = new User;
        $register->name = $request->name;    
        $register->email = $request->email;         
        $register->phone = $request->phone;         
        $register->password =bcrypt($request->password);    //bcrypt method encode the data for security purpose while saving paasword to db table
        $register->Longitude = $request->long;         
        $register->Lattitude = $request->lat;                 
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/Pics/',$filename);
            $register->Image=$filename;
        }
            $register ->save(); 
            $this->dispatch(new DoJob($register));
            // DoJob::dispatch($register);

        //     $detail['Email'] = $request->email;
        //     $detail['Name'] = $request->name;
        //     $detail['image'] = $filename; 
        //     $detail['subject'] = "Checking Mail";
            
        //     //This will send mail to the latest registered user
        //     Mail::send('mail.mail-page',$detail,function($message) use ($detail){
        //        $message ->to($detail['Email'],$detail['Name'] )
        //        ->subject($detail['subject']);
        //    });
        return redirect('/')->with('success','Registered Successfully Login Here');
   }


   //this method login to redirect to next page when the credential will correct
   //these credentials should be according to InsertValidation form request
   public function loginData(LoginValidation $request){
       if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
           $data = DB::select('select * from users where email = ?',[$request->email]);
           return view('pages.dashboard',compact('data'));
       }
       else{
           return redirect('/')->with('wrong', "Please Enter Valid Data");
       }
   }
   public function loginPg(Request $request){
       $request->session()->put('data',$request->input());
    if($request->session()->get('data')){
        return view('session.after-login');
    }
    return 'insert valid data';
   }
   
    public function logoutPg(){
        session()->forget('data');
        return redirect('/');
    }
}
