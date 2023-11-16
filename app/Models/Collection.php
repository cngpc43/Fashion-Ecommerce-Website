<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'img',
        'intro',
        'name',
        'description',
        'button-label',
        'type'
    ];


    protected function Collection(): Attribute
    {

        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }

    public static function getByName($name)
    {
        return self::where('name', $name)->first();
    }
    public static function getCollectionByType($type)
    {
        return self::where('type', $type)->get();
    }
    public static function getFirstBannerName()
    {
        $response = DB::table('collections')->orderBy('updated_at', 'desc')->first();
        return $response->name;
    }
    public static function getSecondBannerName()
    {
        $response = DB::table('collections')->orderBy('updated_at', 'desc')->skip(1)->first();
        return $response->name;
    }
    public static function getFeaturedCollection()
    {
        $response = DB::table('collections')->orderBy('updated_at', 'desc')->take(2)->get();
        return $response;
    }
    // public function product(): HasMany
    // {
    //     return $this->HasMany(Product::class, 'id', 'productId');
    // }
}
