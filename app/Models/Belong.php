<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belong extends Model
{
    use HasFactory;
    protected $fillable = [
        'cartID',
        'detailID',
        'quantity',
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartID');
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'detailID');
    }
}
