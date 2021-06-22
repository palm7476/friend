<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;


class MainController extends Controller
{
    public function create(request $request){
        // request('name')
        // dd($request);
        $vaidate = $this->vaidate(request()->all());
        if($vaidate['status'] != 'success'){
            return $vaidate;
        }
        $Friend = Friend::create([
            'name' => $request->names,
            // 'name' => request('name'),
            'surname' => $request->surnames,
            'email' => $request->emails,
            'phone' => $request->phones
        ]);
        return [
            'status' => 'success',
            'data' => $Friend
        ];     
    }

    public function vaidate(){
        if(!request('names')){
            return[
                'status' => 'error',
                'data' =>[],
                'message' => 'ไม่มีชื่อ '
            ];
        }
        if(!request('surnames')){
            return[
                'status' => 'error',
                'data' =>[],
                'message' => 'ไม่มีนามสกุล'
            ];
        }
        if(!request('emails')){
            return[
                'status' => 'error',
                'data' =>[],
                'message' => 'ไม่มีอีเมล'
            ];
        }
        if(!request('phones')){
            return[
                'status' => 'error',
                'data' => [],
                'message' => 'ไม่มีเบอร์โทรศัพท์'
            ];
        }

        return [
            'status' => 'success',
        ];
    }

    // public function show() {
    //     $Data = Friend::get();
    //     // dd($Data);
    //     return $Data;
    // }

    public function search() {
        // dd(request()->all());
        $id = request('id');
        $Data = Friend::where('id',$id)->first();

        return $Data;
    }

    public function update() {
        $id = request('id');
        $name = request('names');
        $surname = request('surnames'); //ประกาศรับค่า
        $email = request('emails');
        $phone = request('phones');
        $vaidate = $this->vaidate();
        if($vaidate['status'] != 'success'){
            return $vaidate;
        }
        $Data = Friend::where('id',$id)->first();

        $Data->name = $name;
        $Data->surname = $surname; //เอาค่าที่ประกาศไปยัดในฐานข้อมูล
        $Data->email = $email;
        $Data->phone = $phone;
        $Data->save();

        return [
            'status' => 'success',
            'data' => $Data
        ];


    }

    public function searchdata(){
        // dd(request()->all());
        $Name = request('search');
        if($Name){
            $Name = Friend::where('name',$Name)->get();
        }else{
            $Name = Friend::get();
        }
        return $Name;

    }

}
