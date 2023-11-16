<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class ProductDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'productDetailId',
        'productId',
        'img',
        'size',
        'color',
        'stock',
    ];

    protected function size(): Attribute
    {

        return Attribute::make(

            get: fn($value) => json_decode($value, true),

            set: fn($value) => json_encode($value),

        );

    }
    protected function color(): Attribute
    {

        return Attribute::make(

            get: fn($value) => json_decode($value, true),

            set: fn($value) => json_encode($value),

        );

    }
    protected function spec(): Attribute
    {

        return Attribute::make(

            get: fn($value) => json_decode($value, true),

            set: fn($value) => json_encode($value),

        );

    }
    public static function GetProductDetailByCollection($collection)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('collections', 'products.collectionId', '=', 'collections.id')
            ->select('product_details.color', 'products.productId', 'product_details.img', 'product_details.size', 'product_details.stock', 'products.name', 'products.price', 'products.description', 'collections.name as collectionName')
            ->distinct()->where('collections.name', $collection)
            ->get();
        return $response;
    }
    public function customer(): BelongsToMany
    {
        return $this->BelongsToMany(Cart::class, 'id', 'id');
    }
}
