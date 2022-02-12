<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Postmodel extends Model
{
    public static function getPostData()
    {
      //  $users = DB::select('select * from reg');
       $users = DB::table('reg')->get();
        return $users;
    }
    public static function getLogin($u,$p)
    {
        $data=DB::select('select * from reg where uname=? and upass=?', array($u, $p));
        return $data;
    }
    public static function regData($uname,$upass,$email,$mobile)
    {
        DB::table('reg')->insert([
            'uname' =>$uname,
            'upass' =>$upass,
            'email'=>$email,
            'mobile'=>$mobile    
        ]);
    }

}
