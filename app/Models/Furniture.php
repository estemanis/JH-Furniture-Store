<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Furniture extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = "furnitures";
    protected $fillable = [
        'name',
        'price',
        'type',
        'color',
        'image',
    ];

    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
