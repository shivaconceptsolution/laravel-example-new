<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Postmodel;
class PostController extends Controller
{
    public function index(Request $req)
    {
      //  return "Welcome in Controller ".$id;
      $uid = $req->session()->get('uid');
      if(!isset($uid))
      {
        return redirect('login');
      }
    //  $users = DB::select('select * from reg');
      $users = Postmodel::getPostData();
      return view('index',["res"=>$uid,"res1"=>$users]);
    }
    public function edituser(Request $req)
    {
      $uname = $_REQUEST['q'];
      $data=DB::select('select * from reg where uname=?', array($uname));
      //$uname= $data[0]->uname;
     // $upass = $data[0]->upass;
      //$email=$data[0]->email;
     // $mobile=$data[0]->mobile;
     // return view('edituser',["res"=>$uname,"res1"=>$upass,"res2"=>$email,"res3"=>$mobile]);
     return view('edituser',["res"=>$data]);
    }
    public function updateuser(Request $request)
  {
    $uname=$request->txtuname;
    $upass=$request->txtupass;
    $email=$request->txtemail;
    $mobile=$request->txtmobile;
    DB::update('update reg set upass=?,email=?,mobile=? where uname=?', array($upass,$email,$mobile,$uname));
    return redirect('post');
  }
    public function deleteuser(Request $req)
    {
     
      $uname=$req->q;
      $users = DB::delete('delete from reg where uname=?',array($uname));
      return redirect('post');
    }
    public function logout(Request $req)
    {
      $req->session()->flush(); 
      return redirect('login');
    }
}
