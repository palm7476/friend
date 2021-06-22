<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class,'id' , 'brand_id');
    }

}
