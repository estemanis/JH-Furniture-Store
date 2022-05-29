<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    protected $fillable = [
        'account_id',
        'method',
        'cardnumber',
    ];

}
