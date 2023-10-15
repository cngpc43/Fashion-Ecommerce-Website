<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Product;
use App\Models\Cart;
class ProductDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'productDetailId';
    public $incrementing = false;
    protected $fillable=[
        'productId',
        'img',
        'size',
        'color',
        'stock',
        'collection'
    ];
    public function cart(): BelongsToMany
    {
        return $this->BelongsToMany(Cart::class,'id','productDetailId');
    }
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class,'productId','productId');
    }
}
