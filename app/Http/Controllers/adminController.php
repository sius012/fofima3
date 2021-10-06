<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{
    // 
   /* public function index(){
        $data = DB::table('users')->get();
        return view('test',['data' => $data]);
    }*/

   public function index(){
      $data = DB::table('users')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->get();
      return view('admin.kelolaadmin',['data' => $data]);
   }

   public function update(request $request,$id){
     $aksi = $request->aksi;

     switch($aksi){
        case "edit":
           DB::table('model_has_roles')->where('model_id',$id)->update(['role_id' => $request->role]);
           return redirect()->route('dashboard');
        break;
        case "hapus":
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            DB::table('users')->where('id',$id)->delete();
            return redirect()->route('dashboard');
        break;
     }


   }
}