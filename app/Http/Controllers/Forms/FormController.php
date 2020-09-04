<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\LoginValidation;
use Auth;
use DB;
use Hash;
use App\Jobs\DoJob;
use App\User;
use App\Like;


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
        $like = new Like;
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
            $last = User::latest()->first();
            $like->user_id = $last->id;
            $like->email = $last->email;
            $like->save();
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
        //    $data = DB::select('select * from users where email = ?',[$request->email]);
        //    $variable = DB::table('likes')
        //    ->select('*')
        //    ->where('user_id','=',Auth::User()->id)
        //    ->get();
        //    return view('pages.dashboard',compact('data','variable'));
        return redirect(url('/uall'));
       }
       else{
           return redirect('/')->with('wrong', "Please Enter Valid Data");
       }
   }

// public function loginData1(Request $request){
// $data = DB::table('users')
//             ->select('*')
//             ->where('email','=',$request->email)
//             ->get();

//              $password = $data[0]->password;
//              if (Hash::check($request->password, $password)) {
//                 return view('pages.dashboard',compact('data'));
//             }
//             else{
//                 return 'false';
//             }
// }

   public function loginPg(Request $request){
    $request->session()->put('data',$request->input());
    if($request->session()->get('data')){
        return view('session.after-login');
    }
    return 'insert valid data';
   }

    public function logoutPg(){
        session()->forget('data');
        return redirect('/form');
    }

    public function likeData($product){
        $data = DB::table('likes')
        ->where('user_id','=',Auth::User()->id)
        ->update(['product'=>$product,'thumbups'=>1]);
        return redirect('/uall');
    }


    public function dislikeData($product){
        $data = DB::table('likes')
        ->where('user_id','=',Auth::User()->id)
        ->update(['product'=>$product,'thumbups'=>0]);
        return redirect('/uall');
    }

    public function uall()
    {
        $data = DB::table('users')
                ->select('*')
                ->where('email','=',Auth::User()->email)
                ->get();
        $variable = DB::table('likes')
                   ->select('*')
                   ->where('user_id','=',Auth::User()->id)
                   ->get();
        return view('pages.dashboard',compact('data','variable'));
    }
}
