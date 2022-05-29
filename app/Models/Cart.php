<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'transaction_id',
        'furniture_id',
        'quantity',
    ];

    public function furniture(){
        return $this->belongsTo(Furniture::class);
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
