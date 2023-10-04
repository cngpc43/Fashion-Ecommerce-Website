<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;



    protected $fillabel = [
        'name',
        'size',
        'type',
        'color',
        'price',
        'description',
        'spec',
        'salePercent'
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
}
