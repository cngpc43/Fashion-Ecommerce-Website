<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'productId',
        'name',
        'categoryId',
        'collectionId',
        'price',
        'description',
        'salePercent',
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
    public function customer(): BelongsToMany
    {
        return $this->BelongsToMany(Cart::class, 'id', 'id');
    }
    public static function getByCollection($collection)
    {
        $detail = DB::table('product_details')->join('products', 'product_details.productId', '=', 'products.productId')->join('collections', 'collections.id', '=', 'products.collectionId')->where('collectionId', $collection)->get();
        return $detail;
    }
}
