<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Product;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'img',
        'type'
    ];


    protected function banner(): Attribute
    {

        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }
    public static function getByType($type)
    {
        return self::where('type', $type)->get();
    }

}
