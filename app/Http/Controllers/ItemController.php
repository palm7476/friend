<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Type;

class ItemController extends Controller
{
    public function index(){
        //SELECT * FROM `items`
        //SELECT * FROM `brands` WHERE `id` IN (1,2)
        //SELECT * FROM `types` WHERE `id` IN (1,2)
        $item = Item::with('brand','type')->get();
        

        // //SELECT * FROM `items`
        // $item = Item::get();
        // foreach ($item as $key => $value) { //X3
        //     //SELECT * FROM `brands` WHERE `id` = 1
        //     $brand = Brand::where('id',$value->brand_id)->first();
        //     $value->brand = $brand;
            
        //     //SELECT * FROM `types` WHERE `id` = 1
        //     $type = Type::where('id',$value->type_id)->first();
        //     $value->type = $type;
        // }

        // dd('------END------');
        // dd($item);
        return $item;
    }
    public function createbrand(){
        // dd('5555');
        $Brand = Brand::create([
            'name' => request('names')
        ]);
        // dd($Brand);
        return [
            'status' => 'success',
            'data' => $Brand
        ];
    }


    public function showbrand(){
        $Brand = Brand::get();
        // dd($Brand);
        return $Brand;
    }

    public function showtype(){
        $Type = Type::get();
        // dd($Type);
        return $Type;
    }
}
