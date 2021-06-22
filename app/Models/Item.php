<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'name',
        'price',
        'type_id'
    ];


    public function brand()
    {
        // return $this->hasOne(Brand::class);
        // return $this->hasMany(Brand::class, 'brand_id', 'id');
        // return $this->hasOne(Brand::class, 'brand_id', 'id');
        return $this->hasOne(Brand::class,'id' , 'brand_id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }

    public function type()
    {
        // return $this->hasOne(Type::class);
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
