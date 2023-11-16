<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Cart;
class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productId';
    protected $fillable=[
        'name',
        'categoryId',
        'collectionId',
        'img',
        'price',
        'description',
        'spec',
        'salePercent',
    ];


     protected function spec(): Attribute
        {

            return Attribute::make(

                get: fn ($value) => json_decode($value, true),

                set: fn ($value) => json_encode($value),

            );

        } 
    
    public function productDetail(): HasMany
    {
        return $this->HasMany(ProductDetail::class,'productId','productId');
    }
    public function category(): HasOne
    {
        return $this->HasOne(Category::class,'id','categoryId');
    }
    public function collection(): HasOne
    {
        return $this->HasOne(Collection::class,'id','collectionId');
    }
}
