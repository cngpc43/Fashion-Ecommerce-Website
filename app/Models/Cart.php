<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Product;
class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'customerId',
        'productId',
        'quantity'
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
    public function product(): HasMany
    {
        return $this->HasMany(Product::class,'id','productId');
    }
}
