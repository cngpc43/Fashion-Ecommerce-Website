<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Cart extends Model
{
    use HasFactory;
    protected $fillabel=[
        'customerId',
        'products'
    ];


    protected function products(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(User::class,'id','customerId');
    }
}
