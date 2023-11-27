<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductDetail;
class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'customerId',
        'productDetailId',
        'quantity'
    ];


    public function customer(): BelongsTo
    {
        return $this->BelongsTo(User::class,'id','customerId');
    }
    public function productDetail(): HasMany
    {
        return $this->HasMany(ProductDetail::class,'productDetailId','productDetailId');
    }
}
