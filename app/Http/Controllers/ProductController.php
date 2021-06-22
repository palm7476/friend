<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(){
        // dd(request()->all());
        $Product = Product::create([
            'product_name' => request('productnames'),
            'price' => request('prices'),
            'type' => request('types'),
            'detail' => request('details')
        ]);

        return [
            'status' => 'success',
            'data' => $Product
        ];
    }

    public function show(){
        // dd('5555');
        $Data = Product::get();
        // dd($Data);
        return $Data;
    }

    public function search(){
        // dd(request()->all());
        $id = request('id');
        $Data = Product::where('id',$id)->first();

        return $Data;
    }

    public function update(){
        $id = request('id');
        $productname = request('productnames');
        $price = request('prices');
        $type = request('types');
        $detail = request('details');

        $Data = Product::where('id',$id)->first();

        $Data->product_name = $productname;
        $Data->price = $price;
        $Data->type = $type;
        $Data->detail = $detail;
        $Data->save();

        // dd(request()->all());

        return [
            'status' => 'success',
            'data' => $Data
        ];
    }

    public function delete(){

        $id = request('id');
        $Data = Product::where('id',$id)->first();
        // dd($Data);
        $Data->delete();

        $Del = Product::where('id',$id)->first();
        if(!$Del){
            return 'success';
        }
    }

    public function save(){
        $id = request('id');
        $productname = request('productnames');
        $price = request('prices');

        $Data = Product::where('id',$id)->first();
        // dd(request()->all());
        $Data->product_name = $productname;
        $Data->price = $price;
        $Data->save();

        // dd(request()->all());
        return [
            'status' => 'success',
            'data' => $Data
        ];
    }
}
