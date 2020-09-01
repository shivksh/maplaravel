<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuerryController extends Controller
{
   public function selectSpecific($id){
       if($id > 4){
           return "This data does not exist";
       }
       $user = DB::select('CALL getUsersData(?)',array($id));
       return view('procedure.user-data',['user'=>$user]);
       
   }

   public function selectAll(){
    $user = DB::select('CALL getAllusers()');
    return view('procedure.user-all',['user'=>$user]);
    
}



}
