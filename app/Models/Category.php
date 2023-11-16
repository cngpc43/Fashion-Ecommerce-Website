<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [

        'id',
        'img',
        'name',
    ];


    protected function category(): Attribute
    {

        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }
    // public function product(): BelongsTo
    // {
    //     return $this->BelongsTo(User::class, 'id', 'customerId');
    // }
    public static function getByName($name)
    {
        return self::where('name', $name)->first();
    }
    public function product(): HasMany
    {
        return $this->HasMany(Product::class, 'id', 'productId');

    }
}
