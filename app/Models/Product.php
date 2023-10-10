<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Cart;
class Product extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'size',
        'type',
        'color',
        'price',
        'description',
        'spec',
        'salePercent',
        'stock'
    ];


    protected function size(): Attribute
        {

            return Attribute::make(

                get: fn ($value) => json_decode($value, true),

                set: fn ($value) => json_encode($value),

            );

        } 
     protected function color(): Attribute
        {

            return Attribute::make(

                get: fn ($value) => json_decode($value, true),

                set: fn ($value) => json_encode($value),

            );

        } 
     protected function spec(): Attribute
        {

            return Attribute::make(

                get: fn ($value) => json_decode($value, true),

                set: fn ($value) => json_encode($value),

            );

        } 
    public function customer(): BelongsToMany
    {
        return $this->BelongsToMany(Cart::class,'id','id');
    }
}
