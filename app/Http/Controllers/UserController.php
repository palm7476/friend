<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(request $request){
        // dd(request()->all());

        $message = '';
        $message = $this->vaidate(request()->all());
        if($message != ''){
            // return $vaidate;
            return redirect('/register')->with('status', $message);
        }

        $User = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'password' => request('password')
        ]);
        
        // $message = null;
        if($User){
            $message = 'เพิ่มข้อมูลสำเร็จ';
        }else{
            $message = 'เพิ่มข้อมูลไม่สำเร็จ';
        }
        // dd($User);
        // return redirect('/login') ;
        return redirect('/login')->with('status', $message);
    }

    public function vaidate(){
        if(!request('name')){
            return 'ไม่มีชื่อ';
        }
        if(!request('username')){
            return'ไม่มี username';
        }
        if(!request('password')){
            return 'ไม่มี password';
        }

        return '';
    }

    public function show(){
        $Data = auth()->user();
        // dd($Data);
        return $Data;
    }

    public function showuser(){

        $Data = User::get();
        return $Data;
    }
}
