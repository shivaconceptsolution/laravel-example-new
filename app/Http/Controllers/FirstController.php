<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Postmodel;
class FirstController extends Controller
{
  public function reg()
  {
        return view("reg");
  }
  public function regcode(Request $request)
  {
    $uname=$request->txtuser;
    $upass=$request->txtpass;
    $email=$request->txtemail;
    $mobile=$request->txtmobile;
    Postmodel::regData($uname,$upass,$email,$mobile);
  //  DB::insert('insert into reg (uname,upass,email,mobile) values (?, ?,?,?)', array($uname, $upass,$email,$mobile));

    return view("reg",["res"=>"Reg Successfully"]);
  }
  public function login()
  {
      return view("login");

  }
  public function logincode(Request $request)
  {
    $uname=$request->txtuser;
    $upass=$request->txtpass;
    
    $data = Postmodel::getLogin($uname,$upass);
    if(count($data)>0)
    {
      $request->session()->put('uid',$uname);
      echo "<script>window.location='post';</script>";
    }
    else
    {
      echo "login failed";
    }
    //return view("reg",["res"=>"Reg Successfully"]);
  }
    public function index()
    {
     // DB::insert('insert into stu (rno, sname) values (?, ?)', array(1003, 'Dayle'));
     //DB::update('update stu set sname=? where rno=?', array('Jay',1003));
     DB::update('delete from stu where rno=?', array(1003));
     
     echo "Insert Success";
     /* $users = DB::select('select * from stu');
      foreach ($users as $user) {
        echo $user->rno. " ".$user->sname."<br>";
       }*/
     // return view('hello');

      
    }
    public function second(Request $request)
    {
     // $a = $_REQUEST['txtnum1'];
     // $b = $_REQUEST['txtnum2'];
     $a = $request->txtnum1;
     $b = $request->txtnum2;
      $c = $a+$b;
      return "Result is ".$c;
      
    }
    public function display($a,$b)
    {
       
     // return view('admin.details',["res"=>($a+$b)]);
    // return view('admin.details')->with("res",($a+$b));
    return view('admin.details',compact('a'));
    }

    public function siload()
    {
      return view('si');
    }
    public function si(Request $req)
    {
      $type = $req->input("type");
      $chk = $req->input("chk");
      $chk1 = $req->input("chk1");
      $p = $req->input("txtp");
      $r = $req->input("txtr");
      $t = $req->input("txtt");
      $d = "";
      $d1 = "";
      $d2 = "";
      if($chk == "Qt")
      {
           $d1 = "Qt";
      }
      else
      {
        $d1 ="";
      }

      if($chk1 == "Hy")
      {
          $d2 = "Hy";
      }
      else
      {
        $d2 = "";
      }

      /*foreach($mode as $m)
      {
        $d = $d.$m."";
      }*/

   //   $si = ($req->txtp*$req->txtr->$req->txtt)/100;
      $si = ($p*$r*$t)/100;
      return view('si',["res"=>$si,"type"=>$type, "mode"=>$d1.$d2]);
    }
}
